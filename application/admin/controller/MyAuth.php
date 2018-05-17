<?php
/**
 * Created by PhpStorm.
 * User: 微博@沙坪坝韩宇，qq571031767
 * Date: 2017/6/20
 * Time: 14:27
 */
namespace app\admin\controller;

use app\myclass\Auth;
use think\Controller;
use think\Db;
use think\Request;
use think\Session;

class MyAuth extends Common
{

    public function index()
    {
        $list = Db::name('menu')->order('o,id')->select();
        $list = unlimitforlevel($list);//列表项重新组合
//        p($list);
        $this->assign('list',$list);
        return $this->fetch();
    }

    public function add_new_menu()
    {
        if(Request::instance()->post()){
            $post = Request::instance()->post();
            if(isset($post['id'])){
                  $res =  Db::name('menu')->update($post);
                  if($res){
                      $this->success('修改成功',url('MyAuth/index'));
                  }else{
                      $this->error('修改失败');
                  }
            }else{
                if(Db::name('menu')->insert($post)){
                    $this->success('添加成功');
                }else{
                    $this->error('添加失败');
                }
            }
        }else{
            if($pid = Request::instance()->get('pid')){
                $this->assign('pid',$pid);
            }
            $this->assign('cate',0);
            return $this->fetch();
        }

    }

    public function showbutton()
    {
        $res = include './application/myclass/Auth.php';
        $auth = new Auth();


        //获取当前的模块
        $module = request()->module();
        //获取模块下的控制器
        $controller = request()->controller();

        $action = request()->action();
        //echo $module , $controller,$action;
        if($controller != 'Index'){//首页都有权限
            if(!$auth->check(ucfirst($module).'/'.$controller.'/', Session::get('uid'))){
                header("Content-type: text/html; charset=utf-8");
                echo '<p style="margin:10px;text-align:center;">对不起，您没有权限操作此模块！</p>';
                exit();
            }
        }
    }

    public function edit()
    {
        $id = Request::instance()->param('id');
        $res = Db::name('menu')->find($id);
        $nav_list = Db::name('menu')->where('status',1)->field(true)->order('o,id')->select();
        foreach($nav_list as $k => $v){
            $t_url = $v['model_name'].'/'.$v['action_name'] ;
            $nav_list[$k]['url'] = url($t_url);
        }
        $cate = unlimitforlayer($nav_list);//列表项重新组合
        $this->assign('cate',$cate);
        $this->assign('res',$res);
        return $this->fetch();
    }

    public function del_item()
    {
        $id = Request::instance()->param('id');
        $res = Db::name('menu')->delete($id);
        if($res){
            $data['status'] = 1;
            $data['msg'] = '成功';
            $data['data'] = '';
        }else{
            $data['status'] = 0;
            $data['msg'] = '失败';
            $data['data'] = '';
        }
        echo json_encode($data);die;
    }

    public function menu_sort_save()
    {
        $id = Request::instance()->param('id');
        $o = Request::instance()->param('o');
        $data['id'] = $id;
        $data['o'] = $o;
        $res = Db::name("menu")->update($data);
        if($res){
            $data['status'] = 1;
            $data['msg'] = '成功';
            $data['data'] = '';
        }else{
            $data['status'] = 0;
            $data['msg'] = '失败';
            $data['data'] = '';
        }
        return json($data);
    }
    

}