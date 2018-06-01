<?php
/**
 * Created by PhpStorm.
 * User: 微博@沙坪坝韩宇，qq571031767
 * Date: 2017/6/20
 * Time: 14:27
 */
namespace app\admin\controller;

use think\Controller;
use think\Request;
use think\Url;

class Cache extends Common
{

    public function clear()
    {
        \think\Cache::rm("nav_list");//清空后台菜单数据缓存

        deleteAll(ROOT_PATH.'./runtime/cache');
        $data['status'] =1;
        $data['msg'] = "清理成功";
        if (Request::instance()->isAjax()){
            return json($data);
        }else{
           $this->success("清理成功","","",0);
        }

    }
    
}