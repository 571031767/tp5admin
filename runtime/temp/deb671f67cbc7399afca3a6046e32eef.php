<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:74:"E:\phpStudy\WWW\tp5\public/../application/admin\view\friendlink\index.html";i:1525854512;s:69:"E:\phpStudy\WWW\tp5\public/../application/admin\view\public\head.html";i:1526439758;}*/ ?>
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

<a class="layui-btn" href="javascript:;" onclick="add_fl()"><i class="layui-icon">&#xe654;</i> 新增友链</a>


<table class="layui-table">
    <colgroup>
        <col width="150">
        <col width="200">
        <col>
    </colgroup>
    <thead>
    <tr>
        <th>id</th>
        <th>名称</th>
        <th>链接</th>
        <th>排序</th>
        <th>是否启用</th>
        <th>操作</th>
    </tr>
    </thead>
    <tbody>
    <?php if(is_array($links) || $links instanceof \think\Collection || $links instanceof \think\Paginator): $i = 0; $__LIST__ = $links;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$l): $mod = ($i % 2 );++$i;?>
    <tr>
        <td><?php echo $l['id']; ?></td>
        <td><?php echo $l['name']; ?></td>
        <td><?php echo $l['url']; ?> <a style="float: right;" target="_blank" href="<?php echo $l['url']; ?> " 	class="layui-btn layui-btn-sm">预览</a> </td>
        <td><?php echo $l['status']; ?></td>
        <td><?php if($l['status'] == 1): ?><i class="layui-icon">&#xe605;</i> <?php else: ?><i class="layui-icon">&#x1006;</i> <?php endif; ?></td>
        <td>
            <div class="layui-btn-group">
                <a href="javascript:;" onclick="open_edit('<?php echo url('Friendlink/edit',['id'=>$l['id']]); ?>')" class="layui-btn layui-btn-primary layui-btn-small">
                    <i class="layui-icon">&#xe642;</i>
                </a>
                <a href="javascript:;" onclick="delete_link(<?php echo $l['id']; ?>);" class="layui-btn layui-btn-primary layui-btn-small">
                    <i class="layui-icon">&#xe640;</i>
                </a>
            </div>
        </td>
    </tr>

    <?php endforeach; endif; else: echo "" ;endif; ?>

    </tbody>
</table>

<script>
    function delete_link(id) {
        layer.confirm('您确定要删除么？', {
            btn: ['确定','取消'] //按钮
        }, function(){
            var url="<?php echo url('Friendlink/dalete_link'); ?>";
            $.post(url,{id:id},function (e) {
                if(e == 1){
                    layer.msg('删除成功');
                    window.location.reload();
                }else {
                    layer.msg('删除失败');
                }
            })
        }, function(){
            layer.msg('已取消');
        });

    }
    /**
     * 新增友情链接
     */
    function add_fl() {
        var url="<?php echo url('add'); ?>";
        layer.open({
            type: 2,
            area: ['700px', '100%'],
            fixed: false, //不固定
            maxmin: true,
            content: url
        });
    }
    /**
     * 打开修改页面
     */
    function open_edit(url) {

        layer.open({
            type: 2,
            area: ['700px', '100%'],
            fixed: false, //不固定
            maxmin: true,
            content: url
        });
    }
</script>