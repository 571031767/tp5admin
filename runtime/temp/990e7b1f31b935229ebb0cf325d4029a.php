<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:73:"E:\phpStudy\WWW\tp5\public/../application/index\view\phpmailer\index.html";i:1526536741;}*/ ?>
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

    <script  src="/static/js/jquery.js"> </script>
</head>
<body>

<h1>请输入一个邮件来接受本封测试邮件</h1>
<form action="<?php echo url('index/phpmailer/index'); ?>" method="post">
<div class="am-input-group">
    <span class="am-input-group-label"><i class="am-icon-user am-icon-fw"></i></span>
    <input type="text" class="am-form-field" placeholder="邮件" name="mail">
</div>
    <button type="submit" class="am-btn am-btn-primary">测试发送</button>
</form>
</body>
</html>