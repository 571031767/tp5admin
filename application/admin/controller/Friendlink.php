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

class Friendlink extends Common
{

    public function index()
    {

        $pagesize = config('conf.ht_page_size');
        $links = Db::name('link')->paginate($pagesize);
        $this->assign('links',$links);
        return $this->fetch();
    }

    public function add()
    {
        $post = Request::instance()->post();
        if(!$post){
            return $this->fetch();
        }else{
            unset($post['file']);
            if(Db::name('link')->data($post)->insert()){
                $this->success("添加成功",url('Friendlink/index'));
            }else{
                $this->error("添加失败~");
            }
        }
    }

    public function dalete_link()
    {
        $id = Request::instance()->param('id');
        if(Db::name('link')->delete($id)){
            $data['status'] = 1;
        }else{
            $data['status'] = 1;
        }
        echo json_encode($data);die;
    }

    public function edit()
    {
        $post = Request::instance()->post();
        if($post){
            unset($post['file']);
            $res = Db::name('link')->where(['id'=>$post['id']])->data($post)->update();
            if($res){
                $this->success("修改成功！",url('Friendlink/index'));
            }else{
                $this->error("修改失败！");
            }
        }else{
            $id = Request::instance()->param('id');
            $link = Db::name('link')->find($id);
            $this->assign('link',$link);
            return $this->fetch();
        }

    }

}