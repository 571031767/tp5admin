<?php
/**
 * Created by PhpStorm.
 * User: 微博@沙坪坝韩宇，qq571031767
 * Date: 2017/6/20
 * Time: 14:27
 */
namespace app\admin\controller;

use think\Controller;

class Index extends Common
{

    public function index()
    {
        $this->assign('domain',$this->request->url(true));
        return $this->fetch('index');
    }

}