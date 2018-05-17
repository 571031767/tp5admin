<?php
namespace app\admin\controller;

use think\Config;
use think\Controller;
use think\Db;

class Index extends Common
{

    public function index()
    {
        $ip = $_SERVER['REMOTE_ADDR'];
        $this->assign('ip',$ip);
        $this->assign('domain',$this->request->url(true));
        return $this->fetch('index');
    }


    public function welcome()
    {
        //会员总数
        $user_count = Db::name("user")->count("id");
        $this->assign("user_count",$user_count);

        if(function_exists("curl_init")){
            $curl = 1;
        }else{
            $curl =0;
        }
        $this->assign('curl',$curl);
        return $this->fetch();
    }

    public function json()
    {
        if(!Session::get('username')){
            $this->error('用户未登录',Url('User/index'));
        }
        $nav_list = Db::name('menu')->where('status',1)->field(true)->order('o,id')->select();
        foreach($nav_list as $k => $v){
            $t_url = $v['model_name'].'/'.$v['action_name'] ;
            $nav_list[$k]['url'] = url($t_url);
        }

        $nav_list = unlimitforlayer($nav_list);//列表项重新组合
        return json($nav_list);
    }
}
