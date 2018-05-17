<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:69:"E:\phpStudy\WWW\tp5\public/../application/admin\view\index\index.html";i:1526521956;s:59:"E:\phpStudy\WWW\tp5\application\admin\view\public\base.html";i:1526521956;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>micuer网后台</title>
    <link rel="stylesheet" href="/static/layui/css/layui.css">
    <link rel="icon" href="/static/frame/static/image/code.png">
    <link rel="stylesheet" href="/static/animate.min.css">
    <link rel="stylesheet" href="/static/frame/static/css/style.css">
    <style>
        /*.layui-nav .layui-nav-more{ background: url("http://micuer.com/data/upload/pics/5af2826262b17.png") no-repeat center !important;background-size:12px 12px; }*/
        .selected{background:#4e5465 }
        .unselect{background: #393D49}
    </style>

</head>
<body>

<!-- layout admin -->
<div class="layui-layout layui-layout-admin"> <!-- 添加skin-1类可手动修改主题为纯白，添加skin-2类可手动修改主题为蓝白 -->
    <!-- header -->
    <div class="layui-header my-header">
        <a href="<?php echo url("","",true,false);?>">
            <img class="my-header-logo" src="/static/images/logo.png" alt="logo">
        </a>
        <div class="my-header-btn">
            <button title="切换侧边栏导航" class="layui-btn layui-btn-small btn-nav" style="padding: 0 5px;" id="cebianlan"  onmouseover="layer.tips('切换侧边栏', '#qinglihuancun',{
  tips: [1, '#cebianlan'],
  time: 1000
});"><i class="layui-icon" >&#xe603;</i></button>
        </div>

        <!-- 顶部左侧添加选项卡监听 -->
        <ul class="layui-nav" lay-filter="side-top-left">
            <!--<li class="layui-nav-item"><a href="javascript:;" href-url="demo/btn.html"><i class="layui-icon">&#xe621;</i>按钮</a></li>-->
            <li class="layui-nav-item">
                <a href="javascript:;"><i class="layui-icon">&#xe631;</i>工具</a>
                <dl class="layui-nav-child">
                    <dd><a href="javascript:;" href-url="<?php echo url('my_auth/index'); ?>"><i class="layui-icon">卐</i>菜单管理</a></dd>
                    <dd><a href="javascript:;" href-url="<?php echo url('conf/index'); ?>"><i class="layui-icon">&#xe614;</i>基础配置</a></dd>
                    <dd><a href="javascript:;" title="执行sql语句" onclick="open_html('<?php echo url('database/sql'); ?>')"><i class="layui-icon layui-icon-code-circle"></i>执行sql语句</a></dd>
                </dl>
            </li>
        </ul>

        <!-- 顶部右侧添加选项卡监听 -->
        <ul class="layui-nav my-header-user-nav" lay-filter="side-top-right">
            <li class="layui-nav-item">
                <a class="name" id="wangzhanqiantai" href="<?php echo url('index/index/index'); ?>" title="网站前台" onmouseover="layer.tips('网站前台', '#wangzhanqiantai',{
  tips: [4, '#3595CC'],
  time: 1000
});" target="_blank"><i class="layui-icon">&#xe68e;</i></a>
            </li>
            <li class="layui-nav-item">
                <a class="name" href="javascript:;" id="qinglihuancun" title="清理缓存" onclick="clear_cache()" ><i class="layui-icon">&#xe640;</i></a>
            </li>

            <li class="layui-nav-item">
                <a class="name" href="javascript:;"><i class="layui-icon">&#xe629;</i>主题</a>
                <dl class="layui-nav-child">
                    <dd data-skin="0"><a href="javascript:;">默认</a></dd>
                    <dd data-skin="1"><a href="javascript:;">纯白</a></dd>
                    <dd data-skin="2"><a href="javascript:;">蓝白</a></dd>
                </dl>
            </li>
            <li class="layui-nav-item">
                <a class="name" href="javascript:;"><img src="/<?php echo \think\Session::get('headimgurl'); ?>" alt="logo"> <?php echo session('username'); ?> </a>
                <dl class="layui-nav-child">
                    <dd><a href="javascript:;" onclick="changepassword()"><i class="layui-icon">&#xe621;</i>修改密码</a></dd>
                    <dd><a href="javascript:;" onclick="upload_headimg()"><i class="layui-icon">&#xe664;</i>上传头像</a></dd>
                    <dd><a href="<?php echo url('User/logout'); ?>"><i class="layui-icon">&#x1006;</i>退出</a></dd>
                </dl>
            </li>
        </ul>

    </div>
    <!-- side -->
    <div class="layui-side my-side">
        <div class="layui-side-scroll">
            <!-- 左侧主菜单添加选项卡监听 -->
            <ul class="layui-nav layui-nav-tree" lay-filter="side-main">
                <?php if(is_array($nav_list) || $nav_list instanceof \think\Collection || $nav_list instanceof \think\Paginator): $i = 0; $__LIST__ = $nav_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$nav): $mod = ($i % 2 );++$i;?>
                <li class="layui-nav-item" onclick="change_back(this)">
                    <a href="javascript:;">  <i class="layui-icon"><?php echo $nav['icon']; ?></i><?php echo $nav['name']; ?></a>
                    <?php if(!(empty($nav['child']) || (($nav['child'] instanceof \think\Collection || $nav['child'] instanceof \think\Paginator ) && $nav['child']->isEmpty()))): ?>
                    <dl class="layui-nav-child">
                        <?php if(is_array($nav['child']) || $nav['child'] instanceof \think\Collection || $nav['child'] instanceof \think\Paginator): $i = 0; $__LIST__ = $nav['child'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$navv): $mod = ($i % 2 );++$i;?>
                        <dd onclick="parent_back(this)"><a href="javascript:;" href-url='<?php echo $navv['url']; ?>'><i class="layui-icon" ><?php echo $navv['icon']; ?></i><?php echo $navv['name']; ?></a></dd>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </dl>
                    <?php endif; ?>
                </li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>

        </div>
    </div>
    <!-- body -->
    <div class="layui-body my-body">
        <div class="layui-tab layui-tab-card my-tab" lay-filter="card" lay-allowClose="true">
            <ul class="layui-tab-title">
                <li class="layui-this" lay-id="1"><span><i class="layui-icon">&#xe638;</i>欢迎页</span></li>
            </ul>
            <div class="layui-tab-content">
                <div class="layui-tab-item layui-show">
                    <iframe id="iframe" style="height: 100%;padding: 15px;" src="<?php echo url('Index/welcome'); ?>" frameborder="0"></iframe>
                </div>
            </div>
        </div>
    </div>
    <!-- footer -->
    <div class="layui-footer my-footer">
        <p><a href="http://micuer.com" target="_blank">micuer.com</a>&nbsp;&nbsp;&&nbsp;&nbsp;<a href="http://micuer.com" target="_blank">米醋儿网分享</a></p>
    </div>
</div>




<!-- 右键菜单 -->
<div class="my-dblclick-box none">
    <table class="layui-tab dblclick-tab">
        <tr class="card-refresh">
            <td><i class="layui-icon">&#x1002;</i>刷新当前标签</td>
        </tr>
        <tr class="card-close">
            <td><i class="layui-icon">&#x1006;</i>关闭当前标签</td>
        </tr>
        <tr class="card-close-all">
            <td><i class="layui-icon">&#x1006;</i>关闭所有标签</td>
        </tr>
    </table>
</div>

<script type="text/javascript" src="/static/js/jquery.js"></script>
<script type="text/javascript" src="/static/frame/layui/layui.js"></script>
<script type="text/javascript" src="/static/js/functions.js"></script>
<script type="text/javascript" src="/static/frame/static/js/vip_comm.js"></script>
<script type="text/javascript">
    layui.use(['layer','vip_nav'], function () {

        // 操作对象
        var layer       = layui.layer
                ,vipNav     = layui.vip_nav
                ,$          = layui.jquery;

        // 顶部左侧菜单生成 [请求地址,过滤ID,是否展开,携带参数]
        //vipNav.top_left('./json/nav_top_left.json','side-top-left',false);

        // 主体菜单生成 [请求地址,过滤ID,是否展开,携带参数]

        //vipNav.main('./json/nav_main.json','side-main',true);

        // you code ...


    });
    
    
    function clear_cache() {
        var url = "<?php echo Url('cache/clear'); ?>";
        $.post(url,{1:1},function(e){
            if(e.status == 1){
                success(e.msg);
            }else {
                error(e.msg);
            }
        },'json');
    }
    
    function changepassword() {
        var url ="<?php echo url('User/change_password'); ?>";
        layer.open({
            type: 2,
            title:"修改密码",
            area: ['500px', '300px'],
            fixed: false, //不固定
            maxmin: true,
            content: url
        });
    }

    function open_html(url) {
        layer.open({
            type: 2,
            area: ['50%', '90%'],
            fixed: false, //不固定
            maxmin: true,
            content: url
        });
    }


    function upload_headimg() {
        var url ="<?php echo url('User/upload_headimg'); ?>";
        layer.open({
            type: 2,
            title:"上传头像",
            area: ['500px', '70%'],
            fixed: false, //不固定
            maxmin: true,
            content: url
        });
    }

    /**
     * 改变左侧导航选中时候的背景
     * @param obj
     */
    function change_back(obj) {
        if($(obj).find("a").eq(0).hasClass("selected")){
            $(obj).find("a").eq(0).removeClass("selected");
            $(obj).find("a").eq(0).addClass("unselect");
        }else {
            $(obj).find("a").eq(0).removeClass("unselect");
            $(obj).find("a").eq(0).addClass("selected");
        }
    }
</script>
</body>
</html>