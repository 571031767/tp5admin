<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:69:"E:\phpStudy\WWW\tp5\public/../application/admin\view\admin\index.html";i:1525941107;s:69:"E:\phpStudy\WWW\tp5\public/../application/admin\view\public\head.html";i:1526439758;s:71:"E:\phpStudy\WWW\tp5\public/../application/admin\view\public\footer.html";i:1525850960;}*/ ?>
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
<body style="padding: 15px;">
<a href="javascript:;" onclick="tjgly()" class="layui-btn layui-btn-primary"><i class="layui-icon">&#xe654;</i>   添加管理员</a>
<table class="layui-table">
<tr>
    <td>id</td>
    <td>用户名</td>
    <td>登录时间</td>
    <td>所属分组</td>
    <td>操作</td>
    <td>重置密码</td>
</tr>

    <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
    <tr>
        <td><?php echo $v['id']; ?></td>
        <td><?php echo $v['username']; ?></td>
        <td><?php echo date( "Y-m-d H:i:s" ,$v['login_time']); ?></td>
        <td><?php echo $v['title']; ?></td>
        <td>
            <a href="javascript:;" onclick="del_cate_item(<?php echo $v['id']; ?>);"><i class="layui-icon">&#xe640;</i> 删除</a>
            <!--<a href="<?php echo url('edit',['id'=>$v['id']]); ?>"> <i class="layui-icon">&#xe642;</i>  修改</a>-->
        </td>
        <td><button class="layui-btn layui-btn-sm" onclick="reset_pass(<?php echo $v['id']; ?>)"><i class="layui-icon">&#xe9aa;</i>  重置密码</button></td>
    </tr>
    <?php endforeach; endif; else: echo "" ;endif; ?>
</table>
<?php echo $list->render(); ?>
<script>
    function  del_cate_item(id){
        layer.confirm('确定要删除么？', {
            btn: ['确定','取消'] //按钮
        }, function(){
            var url = "<?php echo url('del'); ?>";
            $.post(url,{id:id},function(data){
                if(data.status == 1){
                    success(data.msg);
                    reload(2);
                }else{
                    error(data.msg);
                }

            });
        }, function(){
            layer.msg('取消成功', {

            });
        });
    }
    function tjgly() {
        var url = "<?php echo url('add'); ?>";
        layer.open({
            type: 2,
            area: ['700px', '500px'],
            fixed: false, //不固定
            maxmin: true,
            content: url
        });
    }
    /**
     * 重置用户密码
     * @param id
     */
    function  reset_pass(id){
        layer.confirm('确定要重置改用户的密码么？', {
            btn: ['确定','取消'] //按钮
        }, function(){
            var url = "<?php echo url('User/reset_pass'); ?>";
            $.post(url,{id:id},function(data){
                if(data.status == 1){
                    success(data.msg);
                    reload(2);
                }else{
                    error(data.msg);
                }

            });
        }, function(){
            layer.msg('取消成功', {

            });
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