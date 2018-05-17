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

class Admin extends Common
{
    public function index()
    {
        $list = Db::name('user')
            ->alias('u')
            ->field('u.*,ag.id as agid, ag.title')
            ->join("auth_group_access aga","u.id = aga.uid",'left')
            ->join("auth_group ag","aga.group_id = ag.id",'left')
            ->paginate(10);
        $this->assign('list',$list);
        return $this->fetch();
    }

    public function del()
    {
        $id = Request::instance()->param('id');
        $res = Db::name('user')->delete($id);
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

    public function add()
    {
        if(Request::instance()->isPost()){
            $data = Request::instance()->post();
            $data['password'] = md5($data['password']);
            if($data['group']){
                $group = $data['group'];
                if(isset($data['status']) &&($data['status'] == 'on')){
                    $data['status'] =1;
                }else{
                    $data['status'] = 0;
                }
                unset($data['group']);
                $res = Db::name('user')->insertGetId($data);
                Db::name('auth_group_access')->data(['uid'=>$res,'group_id'=>$group])->insert();
            }else{
                $res = Db::name('user')->data($data)->insert();
            }
            if($res){
                return $this->success('添加成功',url('admin/index'));
            }else{
                return $this->error('添加失败');
            }
        }else{
            $group = Db::name('auth_group')->where(['status'=>1])->select();
            $this->assign('group',$group);
            return $this->fetch();
        }
    }

    public function edit()
    {
        $id = Request::instance()->param('id');
        echo $id;
    }
}