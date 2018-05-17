<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:73:"E:\phpStudy\WWW\tp5\public/../application/admin\view\picmanage\index.html";i:1526451730;s:69:"E:\phpStudy\WWW\tp5\public/../application/admin\view\public\head.html";i:1526439758;}*/ ?>
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
<button class="layui-btn layui-btn-primary" style="margin-left: 1%" onclick="add_new_pic()"><i class="layui-icon">&#xe654;</i> 上传新图</button>
<script src="__STATIC__/js/clipboard.min.js"></script>

<style>
    ul{width: 100%; height: auto; margin-top: 20px;}
    ul .item{width: 21%;margin-left: 1%; overflow: hidden;
        float: left;}
    .item img{width: 100%; max-height: 260px;}
    
</style>
<?php
    $base_url = explode("/",$_SERVER['HTTP_REFERER']);
?>

<ul class="site-doc-icon wall">
    <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;if(is_array($v) || $v instanceof \think\Collection || $v instanceof \think\Paginator): $i = 0; $__LIST__ = $v;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$pic): $mod = ($i % 2 );++$i;?>
    <li style="float:left;" class="item">
        <a href="javascript:;" onclick="pre_view_img('//<?php echo $base_url[2]; ?>/public/uploads/picmanages/<?php echo $pic; ?>');">
        <img src="//<?php echo $base_url[2]; ?>/public/uploads/picmanages/<?php echo $pic; ?>" alt="">
        <br>
        </a>
        <table class="layui-table">
            <tr>
                <td>src:</td>
                <td><input type="text" name="title" value="//<?php echo $base_url[2]; ?>/public/uploads/picmanages/<?php echo $pic; ?>" required  lay-verify="required" placeholder="请输入标题" autocomplete="off" class="layui-input"></td>
            </tr>
            <tr>
                <td colspan="2">
                    <button class="layui-btn layui-btn-danger" onclick="clipboard(this)" data-clipboard-text="//<?php echo $base_url[2]; ?>/public/uploads/picmanages/<?php echo $pic; ?>">复制外链</button>
                    <button class="layui-btn layui-btn-danger" onclick="del_pic('/public/uploads/picmanages/<?php echo $pic; ?>')">删除</button>
                </td>
            </tr>
        </table>

    </li>
    <?php endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; ?>
</ul>
<script src="__STATIC__/js/jaliswall.js"></script>
<script>
    function add_new_pic() {
        var url = "<?php echo url('add_new_pic'); ?>";
        layer.open({
            type: 2,
            area: ['90%', '90%'],
            fixed: false, //不固定
            maxmin: true,
            content: url
        });
    }
    function del_pic(name) {
        var url="<?php echo url('del_pic'); ?>";
        $.post(url,{name:name},function(e){
            if(e.status == 1){
                success(e.msg);
                reload();
            }else {
                error(e.msg);
            }
        },'json')
    }
    $(function(){
        $('.wall').jaliswall({ item: '.item' });
    });


    function pre_view_img(url) {
        layer.open({
            area: ['90%', '90%'],
            type: 1,
            title: false,
            closeBtn: 1,
            shadeClose: true,
            content: "<img src='"+url+"' />"
        });
    }
    
    function clipboard(obj) {
        var clipboard = new ClipboardJS(obj);
        clipboard.on('success', function(e) {
            success("复制成功");
        });
        clipboard.on('error', function(e) {
            error("失败");
        });
    }


</script>



</body>
</html>