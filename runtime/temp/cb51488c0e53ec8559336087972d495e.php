<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:67:"E:\phpStudy\WWW\tp5\public/../application/admin\view\nav\clist.html";i:1525856692;s:69:"E:\phpStudy\WWW\tp5\public/../application/admin\view\public\head.html";i:1526439758;s:71:"E:\phpStudy\WWW\tp5\public/../application/admin\view\public\footer.html";i:1525850960;}*/ ?>
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
<blockquote class="layui-elem-quote layui-quote-nm"> <button class="layui-btn layui-btn-sm" onclick="open_add_html()">新增</button> </blockquote>


<table class="layui-table">
    <tr>
        <td>id</td>
        <td>名称</td>
        <td>链接地址</td>
        <td>显示位置</td>
        <td>是否新窗口打开</td>
        <td>是否启用</td>
        <td>操作</td>
    </tr>

    <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
    <tr >
        <td><?php echo $v['id']; ?></td>
        <td><?php echo $v['name']; ?></td>
        <td><?php echo $v['src']; ?></td>
        <td>
            <?php switch($v['istop']): case "0": ?>顶部<?php break; case "1": ?>中部<?php break; case "2": ?>底部<?php break; default: ?>暂未定义
            <?php endswitch; ?>
        </td>
        <td>
            <?php switch($v['_blank']): case "0": ?>否<?php break; case "1": ?>是<?php break; default: ?>暂未定义
            <?php endswitch; ?>
        </td>
        <td>
            <?php switch($v['status']): case "0": ?>否<?php break; case "1": ?>是<?php break; default: ?>暂未定义
            <?php endswitch; ?>

        </td>
        <td> <button class="layui-btn layui-btn-sm" onclick="change_info(<?php echo $v['id']; ?>);">修改</button>
            <button class="layui-btn layui-btn-sm" onclick="del(<?php echo $v['id']; ?>);">删除</button>
        </td>
    </tr>
    <?php endforeach; endif; else: echo "" ;endif; ?>


</table>

<?php echo $list->render(); ?>

<script>
    function change_info(id){
        var url ="<?php echo url('nav/edit'); ?>?id="+id;
        //iframe层-父子操作
        layer.open({
            type: 2,
            area: ['700px', '530px'],
            fixed: false, //不固定
            maxmin: true,
            content: url
        });
    }
    /**
     * 打开新增页面
     */
    function open_add_html() {
        var url ="<?php echo url('index'); ?>";
        //iframe层-父子操作
        layer.open({
            type: 2,
            area: ['700px', '100%'],
            fixed: false, //不固定
            maxmin: true,
            content: url
        });
    }

    function del(id) {
        var url="<?php echo url('del'); ?>";
        $.post(url,{id:id},function (e) {
            if(e.status == 1){
                success(e.msg);
                reload();
            }else {
                error(e.msg);
            }
        })
    }
</script>

<fieldset class="layui-elem-field" style="float:left;">
    <div class="layui-field-box">
        此软件由 沙坪坝韩宇个人开发 以及免费分享！使用时请保留底部相关版权说明！否则必追究其刑事责任！
        <hr>
        感谢layui、jquery、php、thinkphp等
    </div>

</fieldset>
</body>
</html>