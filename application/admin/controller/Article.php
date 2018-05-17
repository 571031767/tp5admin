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

class Article extends Common
{

    public function add()
    {
        if(Request::instance()->post()){
            $post = Request::instance()->post();
            unset($post['file']);
            $post['add_time'] = time();
            $post['add_user'] = Session::get('username');

            if(!$post['name']){$this->error('文章标题不能为空');}
            if(!$post['content']){$this->error('文章内容不能为空');}


            $res = Db::name('article')->insert($post);
            if($res){
                $this->success('添加成功');
            }else{
                $this->error('添加失败');
            }
        }else{
            $cate = Db::name('article_category')->select();
            $cate = unlimitforlevel($cate);
            $this->assign('cate',$cate);
            return $this->fetch();
        }
    }

    public function index()
    {
        $list = Db::name('article')->paginate();
        $this->assign('list',$list);
        return $this->fetch();
    }

    public function del()
    {
        $id = Request::instance()->post('id');
        $data = [];
        if(Db::name('article')->where('id',$id)->delete()){
            $data['status'] =1;
            $data['msg'] = '删除成功';
            return json_encode($data);
        }else{
            $data['status'] =2;
            $data['msg'] = '删除失败，请重试';
            return json_encode($data);
        }
    }

    public function edit()
    {
        $post = Request::instance()->post();
        if($post){
            unset($post['file']);
            $post['edit_time'] =time();
            $res = Db::name('article')->update($post);
            if($res){
                $this->success("修改成功！",url('Article/index'));
            }else{
                $this->error("修改失败！");
            }
        }else{
            $id = Request::instance()->get('id');
            if(!$id){$this->error('请求出错！请联系qq571031767');}

            $cate = Db::name('article_category')->select();
            $cate = unlimitforlevel($cate);

            $res = Db::name('article')->where('id',$id)->find();
            $this->assign('res',$res);
            $this->assign('cate',$cate);
            return $this->fetch();
        }

    }

}