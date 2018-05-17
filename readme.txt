
        layer.confirm('您确定要封禁此用户？', {
            btn: ['确定','取消'] //按钮
        }, function(){
            //layer.msg('的确很重要', {icon: 1});
            var url = "{:U('User/bind_user')}";
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
    }

    $data['status'] = 1;
    $data['msg'] = '成功';
    $data['data'] = '';
    echo json_encode($data);die;

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
