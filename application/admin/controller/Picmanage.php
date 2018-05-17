<?php
namespace app\admin\controller;

use think\Config;
use think\Controller;
use think\Request;

class Picmanage extends Common
{

    public function index()
    {
        $list = scandir(APP_PATH."../public/uploads/picmanages/");
        unset($list[0]);unset($list[1]);
        foreach ( $list as $k =>$v){
            if(is_dir(APP_PATH."../public/uploads/picmanages/".$v)){
                $temp= scandir(APP_PATH."../public/uploads/picmanages/".$v);
                unset($temp[0]);
                unset($temp[1]);
                foreach ($temp as $kk => $vv){
                    $temp[$kk] = $v.'/'.$vv;
                }
                unset($list[$k]);
                array_push($list,$temp);
            }
        }
        $this->assign('list',$list);

        return $this->fetch('index');
    }

    public function add_new_pic()
    {

        return $this->fetch();

    }

    public function del_pic()
    {
        $name = Request::instance()->param('name');
        if(is_file(APP_PATH."../".$name)){
            unlink(APP_PATH."../".$name);
            $data['status'] = 1;
            $data['msg'] = "删除成功";
        }else{
            $data['status'] = 0;
            $data['msg'] = "失败";
        }
        return json($data);
    }
}
