<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:70:"E:\phpStudy\WWW\tp5\public/../application/admin\view\my_auth\edit.html";i:1526021678;s:69:"E:\phpStudy\WWW\tp5\public/../application/admin\view\public\head.html";i:1526010156;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>后台通用版软件by 沙坪坝韩宇 QQ571031767</title>
<!--本文件只包含一些相应的js  css 等文件-->
<script src="__STATIC__/js/jquery.js"></script>
<!--后台改版为layui-->
<link rel="stylesheet" href="__STATIC__/layui/css/layui.css">
<script src="__STATIC__/layui/layui.js"></script>
<script src="__STATIC__/js/functions.js"></script>


<style>
    body{background-color: #FFF}
    /*分页样式 bootstrap*/
    .pagination {
        height: 40px;
        margin: 20px 0;
    }
    .pagination ul {
        border-radius: 3px 3px 3px 3px;
        box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
        display: inline-block;
        margin-bottom: 0;
        margin-left: 0;
    }
    .pagination li {
        display: inline;
    }
    .pagination a, .pagination span {
        -moz-border-bottom-colors: none;
        -moz-border-left-colors: none;
        -moz-border-right-colors: none;
        -moz-border-top-colors: none;
        background-color: #FFFFFF;
        border-color: #DDDDDD;
        border-image: none;
        border-style: solid;
        border-width: 1px 1px 1px 0;
        float: left;
        line-height: 38px;
        padding: 0 14px;
        text-decoration: none;
    }
    .pagination a:hover, .pagination .active a, .pagination .active span {
        background-color: #F5F5F5;
    }
    .pagination .active a, .pagination .active span {
        color: #999999;
        cursor: default;
    }
    .pagination .disabled span, .pagination .disabled a, .pagination .disabled a:hover {
        background-color: transparent;
        color: #999999;
        cursor: default;
    }
    .pagination li:first-child a, .pagination li:first-child span {
        border-left-width: 1px;
        border-radius: 3px 0 0 3px;
    }
    .pagination li:last-child a, .pagination li:last-child span {
        border-radius: 0 3px 3px 0;
    }
    .pagination-centered {
        text-align: center;
    }
    .pagination-right {
        text-align: right;
    }
    body{padding: 15px;}


    .needs_handle{width: 49%; float:left; margin-bottom: 20px; min-height: 230px;}

    .layadmin-backlog-body {
        display: block;
        padding: 10px 15px;
        background-color: #f8f8f8;
        color: #999;
        border-radius: 2px;
        transition: all .3s;
        -webkit-transition: all .3s;
    }

    .layadmin-backlog-body h3 {
        padding-bottom: 10px;
        font-size: 12px;
    }
    .layadmin-backlog-body p cite {
        font-style: normal;
        font-size: 30px;
        font-weight: 300;
        color: #009688;
    }
</style>
</head>
<body>
<div style="height: 20px;"></div>
<form action="<?php echo url('MyAuth/add_new_menu'); ?>" method="post" class="layui-form">


    <input type="hidden" name="id" value="<?php echo $res['id']; ?>">
    <div class="layui-form-item" style="width: 700px;">
        <label class="layui-form-label">菜单名</label>
        <div class="layui-input-inline">
            <input type="text" name="name" value="<?php echo $res['name']; ?>" required  lay-verify="required" placeholder="请输入菜单名" autocomplete="off" class="layui-input">
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">模块名</label>
        <div class="layui-input-inline">
            <input type="text" name="model_name" value="<?php echo $res['model_name']; ?>" placeholder="请输入模块名" autocomplete="off" class="layui-input">
        </div>
        <div class="layui-form-mid layui-word-aux">限英文并且没有特殊符号</div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">方法名</label>
        <div class="layui-input-inline">
            <input type="text" name="action_name" value="<?php echo $res['action_name']; ?>" placeholder="请输入方法名" autocomplete="off" class="layui-input">
        </div>
        <div class="layui-form-mid layui-word-aux">限英文并且没有特殊符号</div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">图标</label>
        <div class="layui-input-inline">
            <input type="text" name="icon" value="<?php echo $res['icon']; ?>" placeholder="请输入图标-具体参考layui 图标" autocomplete="off" class="layui-input">
        </div>
        <div class="layui-form-mid layui-word-aux"></div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">是否显示</label>
        <div class="layui-input-inline">
            <input type="radio" name="is_menu" value="1" title="是" <?php if($res['is_menu'] == 1): ?>checked<?php endif; ?>>
            <input type="radio" name="is_menu" value="0" title="否" <?php if($res['is_menu'] == 0): ?>checked<?php endif; ?>>
        </div>
        <div class="layui-form-mid layui-word-aux">是否会在左侧菜单栏显示</div>
    </div>

    <div class="layui-form-item layui-form-text" style="width: 700px;">
        <label class="layui-form-label">说明</label>
        <div class="layui-input-block">
            <textarea name="info" placeholder="" class="layui-textarea"><?php echo $res['info']; ?></textarea>
        </div>
    </div>

    <div class="layui-form-item">
        <div class="layui-input-block">
            <button class="layui-btn" lay-submit lay-filter="formDemo">立即提交</button>
            <button type="reset" class="layui-btn layui-btn-primary">重置</button>
        </div>
    </div>


</form>

<script>
    //Demo
    layui.use('form', function(){
        var form = layui.form();
    });
</script>



</body>
</html>