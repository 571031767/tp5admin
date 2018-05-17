<?php
namespace app\index\controller;
use app\myclass\Curl;
use think\Controller;
use think\Cookie;
use think\Db;
use think\Request;
use think\Session;

/**
 * Created by PhpStorm.
 * 微信登录接口
 * User: 微博@沙坪坝韩宇，qq571031767
 * Date: 2017/6/20
 * Time: 14:27
 */
class Wechat extends Controller
{
    public function _initialize()
    {
        $this->appid = "wx4c25b70c4f44a067";
        $this->appkey="45c9fec54c3cd17155fd427195ab7b8f";
        $this->callbackurl = "http://hao.qudong.com/Wechatcallback";//也就是本控制器下的callback方法的具体地址，本案例采用了路由
        parent::_initialize();
    }
    public function login()
    {

        $state  = md5(uniqid(rand(), TRUE));
        $_SESSION["wx_state"]    =   $state;
        $wxurl = "https://open.weixin.qq.com/connect/qrconnect?appid=" . $this->appid . "&redirect_uri=".urlencode($this->callbackurl)."&response_type=code&scope=snsapi_login&state=".$state."#wechat_redirect";
        header("Location: $wxurl");
    }

    public function callback()
    {


        $url='https://api.weixin.qq.com/sns/oauth2/access_token?appid='. $this->appid.'&secret='.$this->appkey.'&code='.$_GET['code'].'&grant_type=authorization_code';

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_URL, $url);
        $json =  curl_exec($ch);
        curl_close($ch);
        $arr=json_decode($json,1);
        print_r($arr);
        $url='https://api.weixin.qq.com/sns/userinfo?access_token='.$arr['access_token'].'&openid='.$arr['openid'].'&lang=zh_CN';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_URL, $url);
        $json =  curl_exec($ch);
        curl_close($ch);
        $arr=json_decode($json,1);


        $User=Db::name('qudonghao_user');
        $data=Array(
            'username'=> $arr['nickname'],
            'openid' => $arr['openid'],
            'nickname' => $arr['nickname'],
            'headimgurl' => $arr['headimgurl'],
            'reg_time'=> time(),
            'userid'=>time(),
            'is_login'=>1
        );
        if($res = $User->where(array('openid'=>$arr['openid']))->find()){
            $User->where(array('openid'=>$arr['openid']))->update(['is_login'=>1]);
            session('userinfo',$data);
            session('username',$data['nickname']);
            session('nickname',$data['nickname']);
            session('uid',$res['id']);
            setcookie("username",$data['nickname'],time()+3600*12,'/','.qudong.com');
            setcookie("nickname",$data['nickname'],time()+3600*12,'/','.qudong.com');
            setcookie("uid",$res['id'],time()+3600*12,'/','.qudong.com');
            setcookie("password","",time()+3600*12,'/','.qudong.com');


//            header("Location: ".$_SERVER['HTTP_REFERER']);
            header("Location:http://www.qudong.com ");
            return ;
        }
        session('userinfo',$data);

        $userss=$User->insertGetId($data);
        if($userss){
            session('username',$data['nickname']);
            session('nickname',$data['nickname']);


            setcookie("username",$data['nickname'],time()+3600*12,'/','.qudong.com');
            setcookie("nickname",$data['nickname'],time()+3600*12,'/','.qudong.com');
            setcookie("uid",$userss,time()+3600*12,'/','.qudong.com');
            setcookie("password","",time()+3600*12,'/','.qudong.com');

            header("Location:http://www.qudong.com ");
        }
    }
}
