<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:70:"E:\phpStudy\WWW\tp5\public/../application/admin\view\database\sql.html";i:1526449347;s:69:"E:\phpStudy\WWW\tp5\public/../application/admin\view\public\head.html";i:1526439758;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
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
<blockquote class="layui-elem-quote">
    执行原生sql语句
</blockquote>

<div>
    <form class="layui-form" action="<?php echo url('Database/sql'); ?>" method="post">
    <div class="layui-form-item layui-form-text">
        <label class="layui-form-label">文本域</label>
        <div class="layui-input-block">
            <textarea style="height: 600px;" name="sql" placeholder="请输入sql语句(此高级功能只针对框架开发人员使用)" class="layui-textarea"></textarea>
        </div>
    </div>
    <div class="layui-form-item">
        <div class="layui-input-block">
            <button class="layui-btn" lay-submit lay-filter="formDemo">立即提交</button>
            <button type="reset" class="layui-btn layui-btn-primary">重置</button>
        </div>
    </div>
    </form>
</div>





<script>
    //Demo
    layui.use('form', function(){
        var form = layui.form;
        //监听提交
        form.on('submit(formDemo)', function(data){
            //layer.msg(JSON.stringify(data.field));
            if(data.sql == ""){
                return false;
            }else {
                return true;
            }
        });
    });
</script>


</body>
</html>