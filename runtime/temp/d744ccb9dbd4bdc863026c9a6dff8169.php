<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:78:"E:\phpStudy\WWW\tp5\public/../application/admin\view\my_auth\add_new_menu.html";i:1513933276;s:69:"E:\phpStudy\WWW\tp5\public/../application/admin\view\public\head.html";i:1526439758;}*/ ?>
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


<!--amazeui cdn-->
<!--<link rel="stylesheet" href="http://cdn.amazeui.org/amazeui/2.7.2/css/amazeui.css">-->
<!--<link rel="stylesheet" href="http://cdn.amazeui.org/amazeui/2.7.2/css/amazeui.min.css">-->
<!--<script src="http://cdn.amazeui.org/amazeui/2.7.2/js/amazeui.js"></script>-->
<!--<script src="http://cdn.amazeui.org/amazeui/2.7.2/js/amazeui.min.js"></script>-->
<!--<script src="http://cdn.amazeui.org/amazeui/2.7.2/js/amazeui.ie8polyfill.js"></script>-->
<!--<script src="http://cdn.amazeui.org/amazeui/2.7.2/js/amazeui.ie8polyfill.min.js"></script>-->
<!--<script src="http://cdn.amazeui.org/amazeui/2.7.2/js/amazeui.widgets.helper.js"></script>-->
<!--<script src="http://cdn.amazeui.org/amazeui/2.7.2/js/amazeui.widgets.helper.min.js"></script>-->
<!--amazeui cdn-->
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
    <?php if(empty($pid) || (($pid instanceof \think\Collection || $pid instanceof \think\Paginator ) && $pid->isEmpty())): ?>
    <div class="layui-form-item" style="width: 700px;">
        <label class="layui-form-label">父级分类</label>
        <div class="layui-input-block">
            <select name="pid" lay-verify="required">
                <option value="0">顶级</option>
                <?php if(is_array($cate) || $cate instanceof \think\Collection || $cate instanceof \think\Paginator): $i = 0; $__LIST__ = $cate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                <option value="<?php echo $v['id']; ?>"><?php echo $v['html']; ?><?php echo $v['category_name']; ?>—<?php echo $v['level']; ?>级分类</option>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </select>
        </div>
    </div>
    <?php else: ?>
    <input type="hidden" name="pid" value="<?php echo $pid; ?>">
    <?php endif; ?>


    <div class="layui-form-item" style="width: 700px;">
        <label class="layui-form-label">菜单名</label>
        <div class="layui-input-inline">
            <input type="text" name="name" required  lay-verify="required" placeholder="请输入菜单名" autocomplete="off" class="layui-input">
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">模块名</label>
        <div class="layui-input-inline">
            <input type="text" name="model_name" placeholder="请输入模块名" autocomplete="off" class="layui-input">
        </div>
        <div class="layui-form-mid layui-word-aux"><span style="color: red;">本系统限制首字母小写，后面的字母需要和控制器大小写一致！如控制器实名为MyAuth，则添加是需要写成myAuth</span></div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">方法名</label>
        <div class="layui-input-inline">
            <input type="text" name="action_name" placeholder="请输入方法名" autocomplete="off" class="layui-input">
        </div>
        <div class="layui-form-mid layui-word-aux">限英文并且没有特殊符号</div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">是否为侧边栏菜单</label>
        <div class="layui-input-block">
            <select name="is_menu" lay-verify="required">
                <option value="0">否</option>
                <option value="1">是</option>
            </select>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">图标</label>
        <div class="layui-input-inline">
            <input type="text" name="icon" placeholder="请输入图标-具体参考layui 图标" autocomplete="off" class="layui-input">
        </div>
        <div class="layui-form-mid layui-word-aux"></div>
    </div>

    <div class="layui-form-item layui-form-text" style="width: 700px;">
        <label class="layui-form-label">说明</label>
        <div class="layui-input-block">
            <textarea name="info" placeholder="" class="layui-textarea"></textarea>
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