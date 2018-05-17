<?php
/**
 * Created by PhpStorm.
 * User: 微博@沙坪坝韩宇，qq571031767
 * Date: 2017/6/20
 * Time: 14:27
 */

/**
 * 此项配置功能其实和配置项Conf 模块功能相近！只不过此项添加的配置会被储存在数据库中，而不作为缓存文件生成配置项！
 * 避免生成的时候导致的不可避免的错误产生！
 * 在此配置项中，可以添加html元素进来！如果想要新的配置功能了，只需要在模板中填写好对应的name值和value值，数据库就会自动的添加进去
 */
namespace app\admin\controller;

use think\Controller;
use think\Db;
use think\Request;

class Webset extends Common
{
    public function index()
    {
        return $this->fetch('index');
    }

    public function add()
    {
        $mod = Db::name('conf');
        $post = Request::instance()->post();
        foreach($post as $k => $v){
            if($mod->where())
            echo $k .'---'. $v;
            echo  '<br>';
        }
    }
}