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

class Nav extends Common
{
    public function index()
    {
        return $this->fetch('index');
    }

    public function add()
    {
        $get = Request::instance()->get();
        if(!$get['name']){
            $this->error('名称不能空');
        }
        if(!$get['src']){
            $this->error('链接不能空');
        }
        if($get['blank']){
           $get['_blank'] = 1;
            unset($get['blank']);
        }else{
            $get['_blank'] = 0;
            unset($get['blank']);
        }

        if(Db::name('nav')->data($get)->insert()){
            $this->success('添加成功');
        }else{
            $this->error('添加失败');
        }
    }

    public function clist()
    {
        $list = Db::name('nav')->paginate(15);
        $this->assign('list',$list);
        return $this->fetch();
    }

    public function edit()
    {
        if(Request::instance()->has('id','get')){
            $id = Request::instance()->get('id');
            $res = Db::name('nav')->where('id',$id)->find();
            $this->assign('res',$res);
            return $this->fetch();
        }else{
            $id = Request::instance()->post('id');
            $res = Db::name('nav')->where('id',$id)->update(Request::instance()->post());
            if($res){
                $this->success('修改成功');
            }else{
                $this->error('修改失败');
            }
        }

    }

    public function del()
    {
        $id = Request::instance()->param('id');
        $res = Db::name('nav')->delete($id);

        if(Request::instance()->isAjax()){
            if($res){
                $d['status'] = 1;
                $d['msg'] = "删除成功";
            }else{
                $d['status'] = 0;
                $d['msg'] = "删除失败";
            }
            return json($d);
        }else{
            if($res){
                $this->success("成功");
            }else{
                $this->error("失败");
            }
        }
    }
}