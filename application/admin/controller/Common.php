<?php
namespace app\admin\controller;

use app\myclass\Auth;
use think\Controller;
use think\Db;
use think\Session;
use think\Url;

class Common extends Controller
{
    public function _initialize()
    {
        header("Content-type: text/html; charset=utf-8");

        if(!Session::get('username')){
            $this->error('用户未登录',Url('User/index'));
        }
        if(\think\Cache::get("nav_list")){
            $nav_list = \think\Cache::get("nav_list");
        }else{
            $nav_list = Db::name('menu')->where(['status'=>1,'is_menu'=>1])->field(true)->order('o,id')->select();
            foreach($nav_list as $k => $v){
                $t_url = $v['model_name'].'/'.$v['action_name'] ;
                $nav_list[$k]['url'] = url($t_url);
            }

            $nav_list = unlimitforlayer($nav_list);//列表项重新组合
            \think\Cache::set('nav_list',$nav_list);
        }
        $this->assign('nav_list',$nav_list);

        //auth权限认证
        $res = include './application/myclass/Auth.php';
        $auth = new Auth();
        //获取当前的模块
        $module = request()->module();
        //获取模块下的控制器
        $controller = request()->controller();
        $action = request()->action();
        $notCheck=array('Index/index','Admin/lst','Admin/logout',"Index/welcome");
        if(Session::get('username') != 'admin'){//首页都有权限
            if(!in_array($controller . '/' . $action, $notCheck)) {
                if (!$auth->check($controller . '/' . $action, Session::get('uid'))) {
                    header("Content-type: text/html; charset=utf-8");
                    $this->error("您没有权限操作","","",0);//0表示不自动跳转
                }
            }
        }
    }
}
