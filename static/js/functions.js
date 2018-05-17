/**
 * Created by Administrator on 2018/5/4.
 * 常用的js函数库  基于layer的简单封装调用
 * 在使用本函数前必须调用layui中的layer模块或者使用单独的layer插件
 * powered by qq571031767
 * 微博：@沙坪坝韩宇
 */
layui.use('layer', function(){
    var layer = layui.layer;
});
function success(msg) {
    if(!msg){
        msg = '成功';
    }
    layer.msg(msg, {icon: 1});
}
function error(msg) {
    if(!msg){
        msg = '失败';
    }
    layer.msg(msg, {icon: 5});
}
function ref() {
    window.location.reload();
}
function  reload(i){
    if(!i){
        i = 3;
    }
    var t = i * 1000;
    setTimeout("ref()",t);
}

function open(url,title) {
    if(!title){
        layer.open({
            title:"micuer.com",
            type: 2,
            area: ['700px', '100%'],
            fixed: false, //不固定
            maxmin: true,
            content: url
        });
    }else {
        layer.open({
            title:title,
            type: 2,
            area: ['700px', '100%'],
            fixed: false, //不固定
            maxmin: true,
            content: url
        });
    }

}