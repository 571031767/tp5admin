<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:71:"E:\phpStudy\WWW\tp5\public/../application/admin\view\my_auth\index.html";i:1525919441;s:69:"E:\phpStudy\WWW\tp5\public/../application/admin\view\public\head.html";i:1526439758;s:71:"E:\phpStudy\WWW\tp5\public/../application/admin\view\public\footer.html";i:1525850960;}*/ ?>
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
    <style>
    th{font-weight: 500;font-size: 18px;}
    </style>
</head>
<body>


<a  class="layui-btn layui-btn-danger" href="javascript:;" onclick="add_new_menu();"><i class="layui-icon">&#xe608;</i> 添加顶级新菜单</a>


<div>
    <table class="layui-table">
        <thead style="font-weight: 500">
        <tr style="font-weight: 500">
            <th width="20">id</th>
            <th width="480">菜单名</th>
            <th width="100">模块名</th>
            <th width="100">action</th>
            <th width="50">图标</th>
            <th width="100">排序</th>
            <th width="400">操作</th>
        </tr>
        </thead>
        <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
        <tr>
           <td> <?php echo $v['id']; ?></td>
            <?php if($v['level'] == 1): ?>
            <td><?php echo $v['html']; ?><?php echo $v['name']; ?></td>
            <?php else: ?>
            <td style="height: 1cm; line-height: 1cm;"><span style="margin-left: <?php echo $v['level']-1; ?>cm; float: left">┝━━<?php echo $v['name']; ?></span></td>
            <?php endif; ?>


            <td><?php echo $v['model_name']; ?></td>
            <td><?php echo $v['action_name']; ?></td>
            <td><i class="layui-icon"><?php echo $v['icon']; ?></i></td>
            <td>
                <input class="o<?php echo $v['id']; ?>" type="text" style="width: 50px;" name="o" value="<?php echo $v['o']; ?>">
                <input type="button" onclick="menu_sort_save(<?php echo $v['id']; ?>);" value="保存">
            </td>
            <td>
                <a class="layui-btn layui-btn-primary" href="javascript:;" onclick="add_new_menu(<?php echo $v['id']; ?>);"><i class="layui-icon">&#xe608;</i>  添加子菜单</a>
                &nbsp;&nbsp;&nbsp;

                <a class="layui-btn layui-btn-primary" href="javascript:;" onclick="del_conf_item(<?php echo $v['id']; ?>);"><i class="layui-icon">&#xe640;</i> 删除</a>
                &nbsp;&nbsp;&nbsp;

                <a class="layui-btn layui-btn-primary" href="<?php echo url('edit',['id'=>$v['id']]); ?>"> <i class="layui-icon">&#xe642;</i>  修改</a>
            </td>
        </tr>
        <?php endforeach; endif; else: echo "" ;endif; ?>
        <tr>
            <td colspan="7" style="color: red">
                共<?=count($list)?>条数据
            </td>
        </tr>
    </table>


</div>




<script>
    $('#set_conf_items').mouseover(function(){
        layer.tips('所有配置项都会重新生成！如果新增了配置项，请务必重新生成一遍！防止不必要的错误', '#set_conf_items');
    });
    function  del_conf_item(id){
        layer.confirm('您确定要删除此项？', {
            btn: ['确定','取消'] //按钮
        }, function(){
            var url = "<?php echo url('del_item'); ?>";
            $.post(url,{id:id },function(data){
                if(data.status == 1){
                    success(data.msg);
                    reload(3);
                }else {
                    error(data.msg);
                }
            },'json');

        }, function(){
            layer.msg('已取消');
        });
    }
    function add_new_menu(pid){
        if(!pid){
            var url = "<?php echo URL('MyAuth/add_new_menu'); ?>";
        }else {
            var url = "<?php echo URL('MyAuth/add_new_menu'); ?>?pid="+pid;
        }

        //iframe层-父子操作
        layer.open({
            type: 2,
            area: ['50%', '70%'],
            fixed: false, //不固定
            maxmin: true,
            content: url
        });



    }
    function menu_sort_save(id) {
        var o=$('.o'+id).val();
        var url="<?php echo url('menu_sort_save'); ?>";
        $.post(url,{id:id,o:o},function(e){
            if(e.status ==1 ){
                layer.msg(e.msg, {icon: 1});
            }else {
                layer.msg(e.msg, {icon: 0});
            }
            window.location.reload();
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