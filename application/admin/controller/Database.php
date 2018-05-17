<?php
/**
 * Created by PhpStorm.
 * User: 微博@沙坪坝韩宇，qq571031767
 * Date: 2017/6/20
 * Time: 14:27
 * 执行原生的sql语句
 */
namespace app\admin\controller;


use think\Controller;
use think\Db;
use think\Request;
use think\Session;

class Database extends Common
{
    public function sql()
    {
       if(Request::instance()->isPost()){
           $d = Request::instance()->post();
           if(Db::query($d['sql'])){
               $this->success("执行成功");
           }elseif(Db::execute($d['sql'])){
               $this->success("执行成功");
           }else{
               $this->error('执行失败');
           }
       }else{
           return $this->fetch();
       }

    }

}