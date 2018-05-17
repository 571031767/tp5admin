<?php
/**
 * Created by PhpStorm.
 * User: 微博@沙坪坝韩宇，qq571031767
 * Date: 2017/6/20
 * Time: 14:27
 * 用户组管理相关
 */
namespace app\admin\controller;

use think\Controller;
use think\Db;
use think\Request;

class MyAuthUserGroup extends Common
{
    public function index()
    {
//        用户组列表
        $group = Db::name('auth_group')->select();
        $this->assign('group',$group);
        $this->assign('domain',$this->request->url(true));
        return $this->fetch('index');
    }

//    用户组编辑选项
    public function open_edit_ahth_group()
    {
        $mod =  Db::name('auth_group');
        $id = Request::instance()->get('id');
        if($id){
            $res =$mod->where('id',$id)->find();
            $this->assign('res',$res);
            return $this->fetch();
        }elseif($post = Request::instance()->post()){
            $t =  $mod->where('id',$post['id'])->update($post);
            if($t){
                $this->success('修改成功');
            }else{
                $this->error('修改失败');
            }
        }
        else{
            $this->error('页面出错了，请刷新再试！或者联系qq571031767咨询技术问题');
        }
    }

    public function del_group()
    {
        $id = Request::instance()->param('id');
        if(Db::name('auth_group')->delete($id)){
            echo 1;
        }else{
            echo 2;
        }
    }
    public function add(){
        if($post = Request::instance()->post()){
            if(!$post['title']){
                $this->error('组名不能空');
            }
            if( Db::name('auth_group')->insert($post)){
                $this->success('添加成功');
            }else{
                $this->error('添加失败');
            }
        }else{
            return $this->fetch();
        }
    }

    public function accredit()
    {
        $rule = Db::name('menu');
        $auth_list = $rule->order('o')->select();
        $auth_list = unlimitforlevel($auth_list);
        $group_id = Request::instance()->param('id');
        $this->assign('group_id',$group_id);

        if($post = Request::instance()->post()){
            $ids = Request::instance()->param('ids');
            $group_id = Request::instance()->post('group_id');
            $res = Db::name('auth_group')->where('id',$group_id)->update(['rules'=>$ids]);
            if($res){
                $this->success('授权成功');
            }else{
                $this->error('授权失败');
            }
        }else{
            $auth_group_rules = Db::name("auth_group")->find($group_id);
            $rules = explode(',',$auth_group_rules['rules']);
            foreach ($auth_list as $k =>$v){
                if(in_array($v['id'],$rules)){
                    $auth_list[$k]['checked'] = "true";
                }
                $auth_list[$k]['open'] = "true";
            }
            $auth_list = forztree($auth_list);
            $auth_list = json_encode($auth_list);
            $this->assign('auth_list',$auth_list);
            return $this->fetch();
        }
    }

    function reset_auth_rule(){
        $all = Request::instance()->post('all');
        if($all != 'all'){echo 3;}
        $menu = Db::name('menu');
        $auth_list = $menu->select();
        $rule = Db::name('auth_rule');
        $sql = "TRUNCATE TABLE ta_auth_rule";
        $rule->query($sql);

        //重置系统所有规则【根据menu表组合字段】
        $all_menu = $menu->select();
        $i = 0;
        foreach ($all_menu as $k => $v) {
            $data[$i]['menu_id'] = $k;
            $data[$i]['pid'] = $v['pid'];
            $data[$i]['title'] =  $v['name'];
            $data[$i]['name'] = $v['model_name'].'/'.$v['action_name'];
            if($data[$i]['name'] == '/'){
                $data[$i]['name']  = '系统顶级选项'.$i;
            }
            //echo $auth_list[$k]['name'],$auth_list[$k]['model_name'].'/'.$auth_list[$k]['action_name'].'<br>';
            $i ++;
        }
        $res = $rule->insertAll($data);
        if($res){
            echo 1;
        }else{
            echo 2;
        }
    }

    //添加用户到相应的管理组
    public function add_user_to_group_access()
    {
        if($post = Request::instance()->post())
        {
            $uid = $post['uid'];
            $gid = $post['gid'];
            if(Db::name('auth_group_access')->where(['uid'=> $uid,'group_id'=>$gid])->find()){
                echo 3;die;
            }
            //此处为ajax提交的数据，如果不想使用ajax提交可以自行修改
            $res = Db::name('auth_group_access')->insert(['uid'=> $uid,'group_id'=>$gid]);
            if($res){
                echo 1;die;
            }else{
                echo 2;die;
            }
            die;

        }else{
            $gid = Request::instance()->get('gid');
            if(!$gid){
                $this->error('操作有误，请重试！或者联系qq571031767协助处理');
            }
            $this->assign('gid',$gid);
            $list = Db::name('user')->select();
            $this->assign('list',$list);
            return $this->fetch();
        }
    }

    //根据用户分组打开用户分组下的列表
    public function open_group_userlist()
    {
        $id = Request::instance()->get('id');
        if(!$id){$this->error('方法有误，请重试');}

        $res = Db::table('ta_auth_group_access')
            ->alias('a')
            ->join('ta_user w','a.uid = w.id')
            ->where('a.group_id',$id)
            ->select();
        $this->assign('list',$res);
        return $this->fetch();
    }
    
    
    //移除本分组下的用户
    public function remove_user()
    {
        $uid = Request::instance()->post('uid');
        $res = Db::name('auth_group_access')->where('uid',$uid)->delete();
        if($res){
            echo 1;
        }else{
            echo 2;
        }
    }

}