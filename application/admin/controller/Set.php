<?php
/**
 * Created by PhpStorm.
 * User: 微博@沙坪坝韩宇，qq571031767
 * Date: 2017/6/20
 * Time: 14:27
 */
namespace app\admin\controller;

use think\Controller;

class Set extends Common
{
    public function site()
    {
        $this->assign('domain',$this->request->url(true));
        return $this->fetch();
    }

    public function index2()
    {
        return 'adminindex2';
    }
}