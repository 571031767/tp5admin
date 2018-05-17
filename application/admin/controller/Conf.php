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

class Conf extends Common
{
    public function add()
    {
        $post = Request::instance()->post();
        if(!$post){
            return $this->fetch();
        }else{
            if(!$post['ch_name']){
                $this->error('配置项中文名不能为空');
            }

            if(!$post['en_name']){
                $this->error('配置项英文名不能为空');
            }

            if(!$post['conf_value']){
                $this->error('配置项值不能为空');
            }
            if(Db::name('conf')->where('en_name',$post['en_name'])->find()){
                $this->error('改配置项已经存在，请勿重复添加');
            }
            $res = Db::name('conf')->insert($post);
            if($res){
                $this->set_conf_items();//自动更新缓存
                $this->success('添加成功');
            }else{
                $this->error('添加失败');
            }
        }

    }


    public function index()
    {
        $list = Db::name('conf')->paginate(15);
        // 把分页数据赋值给模板变量list
        $this->assign('list', $list);
        // 渲染模板输出
        return $this->fetch();
    }

    public function set_conf_items()
    {
        $all = Request::instance()->post('all');
        if(!$all){
            return  json_encode(2);die;
        }
        //将所有配置项生成配置文件，扩展配置文件直接放入application/extra目录会自动加载。
        $res = Db::name('conf')->select();

        $str = '<?php '.PHP_EOL.'return ['.PHP_EOL;
        foreach($res as $k => $v){
            $str .= '"'.$v['en_name'].'"=>"'.$v['conf_value'].'",'.PHP_EOL;
        }
        $str .= '];';
        file_put_contents('./application/extra/conf.php',$str);
        return json_encode(1);die;
        
    }

    public function edit()
    {
        if(!Request::instance()->post()) {

            $id = Request::instance()->request('id');
            if (!$id) {
                $this->error('操作失败，请返回重试');
            }
            $res = Db::name('conf')->where('id', $id)->find();
            $this->assign('res', $res);
            return $this->fetch();
        }else{
            $res =  Db::name('conf')->where('id',Request::instance()->post('id'))->update(Request::instance()->post());
            if($res){
                $this->set_conf_items();//自动更新缓存
                $this->success('修改成功');
            }else{
                $this->error('修改失败');
            }
        }
    }

    public function del_conf_item()
    {
        if(!Request::instance()->isAjax()){
            return json_encode('error');
        }else{
            $id = Request::instance()->post('id');
            if(Db::name('conf')->where('id',$id)->delete()){
                $data['status'] = 1;
                $data['msg'] = '删除成功';
                echo json_encode($data);
            }else{
                $data['status'] = 2;
                $data['msg'] = '删除失败，请重试';
                echo  json_encode($data);
            }
        }

    }


//    接口设置  常规的接口 如登录接口  支付接口
    public function api()
    {
        return $this->fetch();
    }
}