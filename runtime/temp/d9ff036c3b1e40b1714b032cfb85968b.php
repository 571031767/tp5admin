<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:82:"E:\phpStudy\WWW\tp5\public/../application/admin\view\my_auth_user_group\index.html";i:1526521956;s:59:"E:\phpStudy\WWW\tp5\application\admin\view\public\head.html";i:1526972461;s:61:"E:\phpStudy\WWW\tp5\application\admin\view\public\footer.html";i:1526521956;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>后台通用版软件by 沙坪坝韩宇 QQ571031767</title>
<script src="/static/loading.js"></script>
<!--本文件只包含一些相应的js  css 等文件-->
<script src="/static/js/jquery.js"></script>
<!--后台改版为layui-->
<link rel="stylesheet" href="/static/layui/css/layui.css">
<script src="/static/layui/layui.js"></script>
<script src="/static/js/functions.js"></script>



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
<body style="padding-top: 15px;">

<a  class="layui-btn layui-btn-primary" onclick="open_add_html()" href="javascript:;"><i class="layui-icon">&#xe608;</i> 添加用户组</a>


<table class="layui-table">
    <colgroup>
        <col width="150">
        <col width="200">
        <col>
    </colgroup>
    <thead>
    <tr>
        <th>组名</th>
        <th>option</th>
    </tr>
    </thead>
    <tbody>
    <?php if(is_array($group) || $group instanceof \think\Collection || $group instanceof \think\Paginator): $i = 0; $__LIST__ = $group;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
    <tr>
        <td><?php echo $v['title']; ?></td>
        <td>
            <a class="layui-btn layui-btn-primary" href="javascript:;" onclick="accredit('<?php echo url('accredit',array('id'=>$v['id'])); ?>')"><i class="layui-icon">&#xe620;</i>  授权</a>
            <a class="layui-btn layui-btn-primary" href="javascript:;" onclick="del_group(<?php echo $v['id']; ?>);"><i class="layui-icon">&#xe640;</i>  删除</a>
            <!--<a href="javascript:;" onclick="open_add_ahth_group(<?php echo $v['id']; ?>);">编辑</a>-->
            <!--<a href="<?php echo url('add_user_to_group_access'); ?>?gid=<?php echo $v['id']; ?>">添加用户</a>-->
            <!--<a href="javascript:;" onclick="open_group_userlist(<?php echo $v['id']; ?>);">用户列表</a>-->
        </td>
    </tr>
    <?php endforeach; endif; else: echo "" ;endif; ?>
    </tbody>
</table>



<script>
    function open_group_userlist(id,gname){
        var url = "<?php echo url('open_group_userlist'); ?>?id="+id;
        layer.open({
            type: 2,
            area: ['700px', '450px'],
            fixed: false, //不固定
            maxmin: true,
            content: url
        });
    }
    /**
     * 打开授权页面
     * @param url
     */
    function accredit(url){
        layer.open({
            title:"授权",
            type: 2,
            area: ['700px', '98%'],
            fixed: false, //不固定
            maxmin: true,
            content: url
        });
    }
    function del_group(id){
        if(confirm('您确定要删除？')){
            var url = "<?php echo url('del_group'); ?>";
            $.post(url,{id:id},function(e){
                if(e == 1){
                    success("成功");
                    reload();
                }else {
                    error("失败");
                }
            },'json');
        }else {
            error("已取消");
        }
    }

    function open_add_html() {
        var url="<?php echo Url('MyAuthUserGroup/add'); ?>";
        layer.open({
            title:"添加用户组",
            type: 2,
            area: ['700px', '450px'],
            fixed: false, //不固定
            maxmin: true,
            content: url
        });
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