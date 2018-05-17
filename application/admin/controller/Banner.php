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

class Banner extends Common
{
    public function index()
    {
        $list = Db::name('banner')->order('id DESC')->paginate();
        $this->assign('list',$list);
        return $this->fetch();
    }

    public function del()
    {
        $id = Request::instance()->param('id');
        $res = Db::name('banner')->find($id);
        if(is_file(APP_PATH."/../".$res['picture'])){
            unlink(APP_PATH."/../".$res['picture']);
        }
        $res = Db::name('banner')->delete($id);

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
            unset($data['file']);
            $data['add_time'] = time();
            $data['user'] = Session::get('username');
            $res = Db::name('banner')->insert($data);
            if($res){
                return $this->success('添加成功',url('index'));
            }else{
                return $this->error('添加失败');
            }
        }else{

            return $this->fetch();
        }
    }

    public function change_status()
    {
        $id = Request::instance()->param("id");
        $banner = Db::name("banner");
        $res = $banner->find($id);
        if($res['status'] == 1){
            $res = $banner->where(['id'=>$id])->update(['status'=>0]);
            $data['status'] = 0;
            $data['msg'] = "修改成功";
            $data['readme'] = "这里返回的status代表修改后的status字段";
        }else{
            $res = $banner->where(['id'=>$id])->update(['status'=>1]);
            $data['status'] = 1;
            $data['msg'] = "修改成功";
            $data['readme'] = "这里返回的status代表修改后的status字段";
        }
        return json($data);
    }
}