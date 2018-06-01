<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:68:"E:\phpStudy\WWW\tp5\public/../application/admin\view\user\index.html";i:1527843451;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>登录</title>
    <link rel="stylesheet" href="/static/frame/layui/css/layui.css">
    <link rel="stylesheet" href="/static/frame/static/css/style.css">
    <link rel="icon" href="/static/frame/static/image/code.png">
</head>
<body>

<div class="login-main">
    <header class="layui-elip">米醋儿网后台登录</header>
    <form class="layui-form" action="<?php echo url('login'); ?>" method="post">
        <div class="layui-input-inline">
            <input id="username" type="text" name="username" required lay-verify="required" placeholder="用户名" autocomplete="off"
                   class="layui-input">
        </div>
        <div class="layui-input-inline">
            <input id="password" type="password" name="password" required lay-verify="required" placeholder="密码" autocomplete="off"
                   class="layui-input">
        </div>
        <div class="layui-input-inline login-btn">
            <button class="layui-btn" type="button" onclick="login();">登录</button>
        </div>
        <hr/>
        <!--<div class="layui-input-inline">
            <button type="button" class="layui-btn layui-btn-primary">QQ登录</button>
        </div>
        <div class="layui-input-inline">
            <button type="button" class="layui-btn layui-btn-normal">微信登录</button>
        </div>-->
        <!--<p><a href="javascript:;" class="fl">立即注册</a><a href="javascript:;" class="fr">忘记密码？</a></p>-->
    </form>
</div>


<script src="/static/frame/layui/layui.js"></script>
<script src="/static/js/jquery.js"></script>
<script src="/static/js/functions.js"></script>

<script>
    //Demo


    function  login() {
        var url="<?php echo url('login'); ?>";
        var username = document.getElementById("username").value;
        var password = document.getElementById("password").value;
        $.post(url,{username:username,password:password},function(e){
            if(e.status == 1){
                success(e.msg);
                window.location.href=e.next_url;

            }else {
                error(e.msg);
            }
        });
    }
</script>
</body>
</html>