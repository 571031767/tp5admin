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

class ArticleCategory extends Common
{
    public function index()
    {
        $list = Db::name('article_category')->where(1)->select();
        $list = unlimitforlevel($list);

        $this->assign('list', $list);
        $this->assign('domain',$this->request->url(true));
        return $this->fetch('index');
    }

    public function add()
    {
        if($d = Request::instance()->post()){
            $categoryname = Request::instance()->post('category_name');
            if(!$categoryname){
                $this->error('分类名不能为空');
            }else{
                $d['add_time'] = time();
                $d['alter_time'] = time();
                $res = Db::name('article_category')->insert($d);
                if($res){
                    $this->success('添加成功');
                }else{
                    $this->$this->error('添加失败，请重试');
                }
            }
        }else{
            $cate = Db::name('article_category')->select();
            $cate = unlimitforlevel($cate);
            foreach ($cate as $k => $v){
                $cate[$k]['category_name']= str_repeat('　',$v['level'])."┝".$v['category_name'];
            }
            $this->assign('cate',$cate);
            return $this->fetch();

        }
    }

    public function del()
    {
        $id = Request::instance()->post('id');
        if(!$id){
            $data['status'] = 2;
            $data['msg'] = '请求出错，请重试';
            return json_encode($data);
        }

        if(Db::name('article_category')->where('id',$id)->delete()){
            $data['status'] = 1;
            $data['msg'] = '删除成功';
            return json_encode($data);
        }else{
            $data['status'] = 2;
            $data['msg'] = '删除失败';
            return json_encode($data);
        }
    }

    public function edit()
    {
        if(Request::instance()->isPost()){

            $post = Request::instance()->post();
            $post['alter_time'] = time();
            $res = Db::name('article_category')->update($post);
            if($res){
                $this->success('修改成功');
            }else{
                $this->error('修改失败');
            }
        }else{
            $id = Request::instance()->param('id');
            $res = Db::name('article_category')->where('id',$id)->find();
            $this->assign('res',$res);
            return $this->fetch();
        }


    }
}