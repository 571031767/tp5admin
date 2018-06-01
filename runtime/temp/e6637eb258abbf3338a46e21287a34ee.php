<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:71:"E:\phpStudy\WWW\tp5\public/../application/admin\view\index\welcome.html";i:1527674170;s:59:"E:\phpStudy\WWW\tp5\application\admin\view\public\head.html";i:1526972461;}*/ ?>
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



<fieldset class="layui-elem-field needs_handle" >
    <legend>代办事项</legend>
    <div class="layui-field-box">
        <!--网站共有会员<span class="layui-badge layui-bg-gray"><?php echo $user_count; ?></span>位-->
        <ul class="layui-row layui-col-space10 layui-this">
            <li class="layui-col-xs4">
                <a lay-href="" class="layadmin-backlog-body">
                    <h3>入党申请</h3>
                    <p><cite>5</cite></p>
                </a>
            </li>
            <li class="layui-col-xs4">
                <a lay-href="" class="layadmin-backlog-body">
                    <h3>三会一课</h3>
                    <p><cite>12</cite></p>
                </a>
            </li>
            <li class="layui-col-xs4">
                <a lay-href="" class="layadmin-backlog-body">
                    <h3>待审商品</h3>
                    <p><cite>99</cite></p>
                </a>
            </li>
            <li class="layui-col-xs4">
                <a lay-href="" class="layadmin-backlog-body">
                    <h3>待发货</h3>
                    <p><cite>20</cite></p>
                </a>
            </li>
        </ul>
    </div>
</fieldset>
<fieldset class="layui-elem-field needs_handle" >
    <legend>网站会员</legend>
    <div class="layui-field-box">
        网站共有会员<span class="layui-badge layui-bg-gray"><?php echo $user_count; ?></span>位
    </div>
</fieldset>

<fieldset class="layui-elem-field needs_handle" >
    <legend>数据统计</legend>
    <div class="layui-field-box">
        <script src="/static/echarts.min.js"></script>
        <div id="main" style="width: 50%;height:400px;"></div>
    </div>
</fieldset>

<fieldset class="layui-elem-field needs_handle">
    <legend>信息</legend>
    <div class="layui-field-box">
        <blockquote class="layui-elem-quote layui-quote-nm">欢迎使用米醋儿网后台通用系统！本系统提供免费升级方案</blockquote>

        <blockquote class="layui-elem-quote layui-quote-nm">您现在使用的主机系统为：<?php echo php_uname(); ?></blockquote>

        <blockquote class="layui-elem-quote layui-quote-nm">php版本：<?php echo PHP_VERSION; ?></blockquote>

        <blockquote class="layui-elem-quote layui-quote-nm">是否支持curl：<?php if($curl): ?>支持<?php else: ?>不支持<?php endif; ?></blockquote>
    </div>
</fieldset>





<script type="text/javascript">
    // 基于准备好的dom，初始化echarts实例
    var myChart = echarts.init(document.getElementById('main'));

    // 指定图表的配置项和数据
    option = {
        title : {
            text: '测试代码',
            subtext: 'micuer.com',
            x:'center'
        },
        tooltip : {
            trigger: 'item',
            formatter: "{a} <br/>{b} : {c} ({d}%)"
        },
        legend: {
            orient: 'vertical',
            left: 'left',
            data: ['党员','积极分子','预备党员','其他']
        },
        series : [
            {
                name: '职工分布',
                type: 'pie',
                radius : '55%',
                center: ['50%', '60%'],
                data:[
                    {value:335, name:'党员'},
                    {value:310, name:'积极分子'},
                    {value:234, name:'预备党员'},
                    {value:135, name:'其他'}
                ],
                itemStyle: {
                    emphasis: {
                        shadowBlur: 10,
                        shadowOffsetX: 0,
                        shadowColor: 'rgba(0, 0, 0, 0.5)'
                    }
                }
            }
        ]
    };

    // 使用刚指定的配置项和数据显示图表。
    myChart.setOption(option);
</script>



