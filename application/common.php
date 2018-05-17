<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件

function deleteAll($path) {
    $op = dir($path);
    while(false != ($item = $op->read())) {
        if($item == '.' || $item == '..') {
            continue;
        }
        if(is_dir($op->path.'/'.$item)) {
            deleteAll($op->path.'/'.$item);
            rmdir($op->path.'/'.$item);
        } else {
            unlink($op->path.'/'.$item);
        }

    }
}


function p($res){
    echo '<pre>';
    print_r($res);
    echo '</pre>';
}


//将分类组合1维数组
function unlimitforlevel($cate,$html='▁', $pid=0,$level=0){
    $arr = array();
    foreach($cate as $v){
        if($v['pid'] == $pid){
            $v['level']=$level + 1;
            $v['html'] =str_repeat($html,$level);
            $arr[] = $v;
            $arr = array_merge($arr,unlimitforlevel($cate , $html ,$v['id'] , $level+1));
        }

    }
    return $arr;
}
//组合多维数组
function unlimitforlayer($cate,$name = 'child', $pid=0){
    $arr = array();
    foreach($cate as $v){
        if($v['pid'] == $pid){
            $v[$name]=unlimitforlayer($cate ,$name, $v['id']);
            $arr[] = $v;
        }
    }
    return $arr;
}

//组合多维数组
function forztree($cate,$name = 'children', $pid=0){
    $arr = array();
    foreach($cate as $v){
        if($v['pid'] == $pid){
            $v[$name]=unlimitforlayer($cate ,$name, $v['id']);
            $arr[] = $v;
        }
    }
    return $arr;
}