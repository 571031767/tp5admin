<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:69:"E:\phpStudy\WWW\tp5\public/../application/index\view\index\index.html";i:1526536485;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <title>后台模板演示+phpmailer整合+微信登录</title>
    <!--amazeui cdn-->
    <link rel="stylesheet" href="http://cdn.amazeui.org/amazeui/2.7.2/css/amazeui.css">
    <link rel="stylesheet" href="http://cdn.amazeui.org/amazeui/2.7.2/css/amazeui.min.css">
    <script src="http://cdn.amazeui.org/amazeui/2.7.2/js/amazeui.js"></script>
    <script src="http://cdn.amazeui.org/amazeui/2.7.2/js/amazeui.min.js"></script>
    <script src="http://cdn.amazeui.org/amazeui/2.7.2/js/amazeui.ie8polyfill.js"></script>
    <script src="http://cdn.amazeui.org/amazeui/2.7.2/js/amazeui.ie8polyfill.min.js"></script>
    <script src="http://cdn.amazeui.org/amazeui/2.7.2/js/amazeui.widgets.helper.js"></script>
    <script src="http://cdn.amazeui.org/amazeui/2.7.2/js/amazeui.widgets.helper.min.js"></script>
    <!--amazeui cdn-->

    <script  src="__JS__/jquery.js"> </script>
</head>
<body>

<a class="am-btn am-btn-default am-round" href="<?php echo Url('admin/index/index'); ?>" role="button">后台演示</a>


<a class="am-btn am-btn-default am-round" href="<?php echo Url('index/Wechat/login'); ?>" role="button">微信登录演示</a>


<a class="am-btn am-btn-default am-round" href="<?php echo Url('index/Phpmailer/index'); ?>" role="button">邮件发送演示</a>

</body>
</html>