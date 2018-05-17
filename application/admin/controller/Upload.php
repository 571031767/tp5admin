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

class Upload extends Controller
{

    public function upload()
    {
        $file = request()->file('file');
        // 移动到框架应用根目录/public/uploads/ 目录下
        if($file){
            if($file->getInfo()['size'] > 1*1024*1024){
                $path = "";
                $data['code'] = 0;
                $data['msg'] = "文件大小超出限制(请小于1M)";
                $data['data'] = $path;
                echo json_encode($data);die;
            }
            $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
            if($info){
                // 成功上传后 获取上传信息
                // 输出 jpg
                //echo $info->getExtension();
                // 输出 20160820/42a79759f284b767dfcb2a0197904287.jpg
//                echo $info->getSaveName();
                $path = 'public/uploads/'.$info->getSaveName();
                $data['code'] = 1;
                $data['msg'] = "上传成功";
                $data['data'] = $path;
                echo json_encode($data);die;
                // 输出 42a79759f284b767dfcb2a0197904287.jpg
                //echo $info->getFilename();
            }else{
                // 上传失败获取错误信息
                echo $file->getError();
            }
        }
    }
    //富文本编辑框的 上传插件
    public function edit_upload()
    {
        $file = request()->file('file');
        // 移动到框架应用根目录/public/uploads/ 目录下
        if($file){
            $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
            if($info){
                // 成功上传后 获取上传信息
                // 输出 jpg
                //echo $info->getExtension();
                // 输出 20160820/42a79759f284b767dfcb2a0197904287.jpg
//                echo $info->getSaveName();

//                {  leyui富文本编辑框需要返回的格式
//                    "code": 0 //0表示成功，其它失败
//                      ,"msg": "" //提示信息 //一般上传失败后返回
//                      ,"data": {
//                                        "src": "图片路径"
//                        ,"title": "图片名称" //可选
//                      }
//                    }
                $path = config('my_conf.web_url').'/public/uploads/'.$info->getSaveName();
                $data['code'] = 0;
                $data['msg'] = "上传成功";
                $in['src'] =$path;
                $in['title'] = $info->getFilename();
                $data['data'] = $in;
                echo json_encode($data);die;
                // 输出 42a79759f284b767dfcb2a0197904287.jpg
                //echo $info->getFilename();
            }else{
                // 上传失败获取错误信息
                echo $file->getError();
            }
        }
    }

    /**
     * 后台图片管理模块的多图上传方法
     */
    public function picmanage_upload()
    {
        $file = request()->file('file');
        // 移动到框架应用根目录/public/uploads/ 目录下
        if($file){
            $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads/picmanages');
            if($info){
                // 成功上传后 获取上传信息
                // 输出 jpg
                //echo $info->getExtension();
                // 输出 20160820/42a79759f284b767dfcb2a0197904287.jpg
//                echo $info->getSaveName();
                $path = 'public/uploads/'.$info->getSaveName();
                $data['code'] = 1;
                $data['msg'] = "上传成功";
                $data['data'] = $path;
                echo json_encode($data);die;
                // 输出 42a79759f284b767dfcb2a0197904287.jpg
                //echo $info->getFilename();
            }else{
                // 上传失败获取错误信息
                echo $file->getError();
            }
        }
    }

}