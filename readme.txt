注意事项：本系统如果在Linux服务器下部分后台功能报错的话请给 application\extra 下的所有文件赋 777的权限


更新日志：
    2018.1.26  新增文章模块预览图限制宽高 【后台】


添加的表有
    cmstop_qudonghao_phone_code  //短信验证码
    cmstop_qudonghao_user       //必须用手机号注册
    cmstop_qudonghao_info       //用户认证信息



    content表新增字段有qudonghao_userid  int        10
                       qudonghao_img     varchar    800

    专栏页修改
    用户发布成功 文章数+1

功能新增
微信模块
    wechat 模块下 $this->access_token 可以获取到access_token

        layer.confirm('您确定要封禁此用户？', {
            btn: ['确定','取消'] //按钮
        }, function(){
            //layer.msg('的确很重要', {icon: 1});
            var url = "{:url('User/bind_user')}";
            $.post(url,{id:id},function(e){
                if(e.status ==1 ){
                    layer.msg(e.msg, {icon: 1});
                }else {
                    layer.msg(e.msg, {icon: 0});
                }
            },'json')
        }, function(){
            layer.msg('取消成功', {icon: 1});
        });


    $data['status'] = 1;
    $data['msg'] = '成功';
    $data['data'] = '';
    echo json_encode($data);die;

    function detail(id) {
        var url = "{:url('detail')}?id="+id;
        layer.open({
            type: 2,
            title: '信息详情',
            shadeClose: true,
            shade: 0.8,
            area: ['80%', '90%'],
            content: url //iframe的url
        });
    }


function index() {
        var url ="http://qudonghao.com/getindex";
        var uid = "index";
        $.ajax({
            url:url,
            data:{uid:uid},
            type:"post",
            dataType:"json",
            beforeSend: function(){
                $('.loading').css('display','block');
            },
            success:function (data) {
                $('.loading').css('display','none');
                $('.count').html(data.count);
                $('.pv').html(data.pv);
            }
        })
    }
powered by qq 571031767 微博：沙坪坝韩宇  网站：micuer.com



-----------------------------------------------------------------
php 多条件搜索的a连接的url怎么解决  解决方案
demo 仅展示在thinkphp目录下的效果
<a  href="{:geturi('&cid='.$vo['id'])}"> {$vo.name} </a>
<li><a href="{:geturi('&type=1')}">单件悬赏</a></li>

实例中显示的效果

<td>
                    <div class="filt">
                        <ul class="clearfix">
                            <div class="name">大分类：</div>
                            <li <?php if(!$_GET['cid']){ echo 'class="cur"';} else{ echo '';} ?> ><a href="{:U('index')}">全部</a></li>
<volist name="level1" id="vo">
  <li <if condition="($vo['id'] eq $_GET['cid']) OR ( $current['pid'] eq $vo['id'] )"> class="cur"</if>   ><a  href="?cid={$vo['id']}"> {$vo.name} </a></li>
    <li <if condition="($vo['id'] eq $_GET['cid']) OR ( $current['pid'] eq $vo['id'] )"> class="cur"</if>   >
    <a  href="{:geturi('&cid='.$vo['id'])}"> {$vo.name} </a>
    </li>
</volist>

</ul>

<if condition="$level2">
    <ul class="clearfix">
        <div class="name">小分类：</div>

        <volist name="level2" id="vo">
           <li <if condition="($vo['id'] eq $_GET['cid']) OR ( $current['pid'] eq $vo['id'] )"> class="cur"</if>><a  href="?cid={$vo['id']}">{$vo.name}</a></li>
            <li <if condition="($vo['id'] eq $_GET['cid']) OR ( $current['pid'] eq $vo['id'] )"> class="cur"</if>>
            <a  href="{:geturi('&cid='.$vo['id'])}">{$vo.name}</a>
            </li>
        </volist>
    </ul>

</if>

<ul class="clearfix">
    <div class="name">交易模式：</div>
    <li class="cur"><a href="#">全部</a></li>
    <li><a href="{:geturi('&type=1')}">单件悬赏</a></li>
    <li><a href="{:geturi('&type=2')}">多级悬赏</a></li>
    <li><a href="{:geturi('&type=3')}">计件悬赏</a></li>
    <li><a href="{:geturi('&type=4')}">直接雇佣</a></li>
</ul>
<ul class="clearfix">
    <div class="name">需求时间：</div>
    <li class="cur"><a href="#">全部</a></li>
    <li><a href="{:geturi('&day=1')}">今日发布</a></li>
    <li><a href="{:geturi('&day=2')}">昨日发布</a></li>
    <li><a href="{:geturi('&day=3')}">1天内到期</a></li>
    <li><a href="{:geturi('&day=4')}">2天内到期</a></li>
    <li><a href="{:geturi('&day=5')}">3天内到期</a></li>
</ul>
</div>
</td>
