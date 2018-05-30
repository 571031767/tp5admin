<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:68:"E:\phpStudy\WWW\tp5\public/../application/admin\view\conf\index.html";i:1526521956;s:59:"E:\phpStudy\WWW\tp5\application\admin\view\public\head.html";i:1526972461;s:61:"E:\phpStudy\WWW\tp5\application\admin\view\public\footer.html";i:1526521956;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
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
<body>
<blockquote class="layui-elem-quote">
    配置项列表
</blockquote>
<button onclick="add_conf()"  href="<?php echo url('add'); ?>" class="layui-btn layui-btn-primary"><i class="layui-icon layui-icon-add-1"></i> 新增配置项</button>
<div>
    <table class="layui-table">
        <tr>
            <td width="10">id</td>
            <td width="200">名称</td>
            <td width="200">英文名</td>
            <td width="400">值(value)</td>
            <td width="600">说明</td>
            <td width="200">前台调用</td>
            <td width="200">后台调用</td>
            <td width="250">删除|修改</td>
        </tr>
        <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
        <tr>
           <td> <?php echo $v['id']; ?></td>
            <td> <?php echo $v['ch_name']; ?></td>
            <td> <?php echo $v['en_name']; ?></td>
            <td> <?php echo $v['conf_value']; ?></td>
            <td> <?php echo $v['info']; ?></td>
            <td>{:config('conf.<?php echo $v['en_name']; ?>')}</td>
            <td>config('conf.<?php echo $v['en_name']; ?>')</td>
            <td>
                <a href="javascript:;" onclick="del_conf_item(<?php echo $v['id']; ?>);" class="layui-btn layui-btn-xs layui-btn-disabled"><i class="layui-icon">&#xe640;</i> 删除</a>
                &nbsp;&nbsp;&nbsp;

                <a href="<?php echo url('edit',['id'=>$v['id']]); ?>" onclick="edit()" class="layui-btn layui-btn-xs layui-btn-primary"> <i class="layui-icon">&#xe642;</i>  修改</a>
            </td>
        </tr>
        <?php endforeach; endif; else: echo "" ;endif; ?>
    </table>
</div>
<?php echo $list->render(); ?>

<button id="set_conf_items" class="layui-btn layui-btn-danger">生成配置项</button>
<br>
<br>


<script>
    $('#set_conf_items').mouseover(function(){
        layer.tips('所有配置项都会重新生成！如果新增了配置项，请务必重新生成一遍！防止不必要的错误', '#set_conf_items');
    })
    $('#set_conf_items').click(function(){
        var  url="<?php echo url('conf/set_conf_items'); ?>";
        $.post(url,{all:'all'},function(data){
                if(data == 1){
                    layer.msg('更新成功');
                }else{
                    layer.msg('更新失败');
                }
        })
    })

    function  del_conf_item(id){
        layer.confirm('您确定要删除此项？', {
            btn: ['确定','取消'] //按钮
        }, function(){
            var url = "<?php echo url('conf/del_conf_item'); ?>";
            $.post(url,{id:id },function(data){
                var msg = data['msg'];
                layer.msg('删除成功');
                setTimeout(ref(),3000);

            });

        }, function(){
            layer.msg('已取消');
        });
    }
    function  ref(){
        window.location.reload();
    }
    
    function add_conf() {
        var url = "<?php echo url('add'); ?>";
        layer.open({
            type: 2,
            area: ['700px', '100%'],
            scrollbar: false,
            fixed: false, //不固定
            maxmin: true,
            content: url
        });
    }
    
    function edit(url) {
        alert(11);
//        layer.open({
//            type: 2,
//            area: ['700px', '100%'],
//            fixed: false, //不固定
//            maxmin: true,
//            content: url
//        });
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