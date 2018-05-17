<?php
/**
 * Created by PhpStorm.
 * User: 微博@沙坪坝韩宇，qq571031767
 * Date: 2017/6/20
 * Time: 14:27
 */
namespace app\admin\controller;

use think\Controller;
use think\Db;
use think\Request;
use think\Session;
use think\Url;

class User extends Controller
{
    public function index()
    {
        $this->assign('domain',$this->request->url(true));
        return $this->fetch('index');
    }

    public function login()
    {
        $username = Request::instance()->post('username');
        $password = Request::instance()->post('password');

        if($username && $password){
            $res =  Db::name('user')->where('username',$username)->find();
            //echo  Db::name('user')->getLastSql();
            if(!$res){
                $this->error('用户名不存在');
            }
            if($res['password'] != md5($password)){
                $this->error('用户密码错误');
            }
            Session::set('username',$username);
            Session::set('uid',$res['id']);
            if(!$res['headimgurl']){
                $res['headimgurl'] = "http://micuer.com/data/upload/pics/5af55457613ce.JPG";
            }
            Session::set('headimgurl',$res['headimgurl']);
            $this->success('成功',Url('index/index'));
        }else{
            return $this->redirect(Url('user/index'));
        }

    }

    public function change_password()
    {
        $user = Db::name('user')->where(['username'=>Session::get('username')])->find();
        $post = Request::instance()->post();
        if(!$post){
            $this->assign('user',$user);
            return $this->fetch();
        }else{
            if(md5($post['old_password']) != $user['password']){
                $this->error("原密码错误");
            }
            if($post['new_password'] != $post['repeat_new_password']){
                $this->error("两次输入的密码不一样，请检查后提交！");
            }
            $res = Db::name('user')->where(['username'=>Session::get('username')])->update(['password'=>md5($post['new_password'])]);
            if($res){
                $this->success("修改成功,即将退出系统重新登录",url("User/logout"));
            }else{
                $this->error("修改失败！");
            }
        }
    }

    public function logout()
    {
        Session::clear();
        $url = url("User/index");
        $this->redirect($url);
    }

    public function reset_pass()
    {
        if(Session::get("username") =="admin"){
            $id = Request::instance()->param('id');
            $res  = Db::name('user')->where(['id'=>$id])->update(['password'=>"21232f297a57a5a743894a0e4a801fc3"]);
            if($res){
                $d['status'] = 1;
                $d['msg'] = "重置成功";
                $d['data']="";
            }else{
                $d['status'] = 0;
                $d['msg'] = "失败，请稍后再试";
                $d['data']="";
            }
        }else{
            $d['status'] = 0;
            $d['msg'] = "只限于超级管理员可以操作";
            $d['data']="";
        }
        return json($d);
    }

    public function upload_headimg()
    {
        if(Request::instance()->isPost()){
            $d = Request::instance()->post();
            unset($d['file']);
            $uid = Session::get('uid');
            $res = Db::name('user')->update(['id'=>$uid,'headimgurl'=>$d['headimgurl']]);
            if($res){
                Session::set("headimgurl",$d[headimgurl]);
                $this->success("修改成功","","",0);
            }else{
                $this->error("修改失败");
            }
        }else{
            return $this->fetch();
        }

    }
}