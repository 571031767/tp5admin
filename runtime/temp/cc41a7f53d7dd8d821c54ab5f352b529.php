<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:85:"E:\phpStudy\WWW\tp5\public/../application/admin\view\my_auth_user_group\accredit.html";i:1526451283;s:69:"E:\phpStudy\WWW\tp5\public/../application/admin\view\public\head.html";i:1526439758;}*/ ?>
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
    <!--<link rel="stylesheet" href="__STATIC__/ztree/css/demo.css" type="text/css">-->
    <link rel="stylesheet" href="__STATIC__/ztree/css/metroStyle/metroStyle.css" type="text/css">
    <link rel="stylesheet" href="__STATIC__/ztree/css/zTreeStyle/zTreeStyle.css" type="text/css">
    <script type="text/javascript" src="__STATIC__/ztree/js/jquery.ztree.core.js"></script>
    <script type="text/javascript" src="__STATIC__/ztree/js/jquery.ztree.excheck.js"></script>
    <script type="text/javascript" src="__STATIC__/ztree/js/jquery.ztree.exedit.js"></script>



    <SCRIPT LANGUAGE="JavaScript">
        var setting = {
            view: {
                dblClickExpand: false
            },
            check: {
                enable: true
            },
            callback: {
                onRightClick: OnRightClick
            }
        };

//        var zNodes =[
//            {id:1, name:"无右键菜单 1", open:true, noR:true,
//                children:[
//                    {id:11, name:"节点 1-1", noR:true},
//                    {id:12, name:"节点 1-2", noR:true}
//
//                ]},
//            {id:2, name:"右键操作 2", open:true,
//                children:[
//                    {id:21, name:"节点 2-1"},
//                    {id:22, name:"节点 2-2"},
//                    {id:23, name:"节点 2-3"},
//                    {id:24, name:"节点 2-4"}
//                ]},
//            {id:3, name:"右键操作 3", open:true,
//                children:[
//                    {id:31, name:"节点 3-1"},
//                    {id:32, name:"节点 3-2"},
//                    {id:33, name:"节点 3-3"},
//                    {id:34, name:"节点 3-4"}
//                ]}
//        ];
        var zNodes = <?php echo $auth_list; ?>;
        setting.check.chkboxType = { "Y" : "ps", "N" : "s" };
        function OnRightClick(event, treeId, treeNode) {
            if (!treeNode && event.target.tagName.toLowerCase() != "button" && $(event.target).parents("a").length == 0) {
                zTree.cancelSelectedNode();
                showRMenu("root", event.clientX, event.clientY);
            } else if (treeNode && !treeNode.noR) {
                zTree.selectNode(treeNode);
                showRMenu("node", event.clientX, event.clientY);
            }
        }

        function showRMenu(type, x, y) {
            $("#rMenu ul").show();
            if (type=="root") {
                $("#m_del").hide();
                $("#m_check").hide();
                $("#m_unCheck").hide();
            } else {
                $("#m_del").show();
                $("#m_check").show();
                $("#m_unCheck").show();
            }

            y += document.body.scrollTop;
            x += document.body.scrollLeft;
            rMenu.css({"top":y+"px", "left":x+"px", "visibility":"visible"});

            $("body").bind("mousedown", onBodyMouseDown);
        }
        function hideRMenu() {
            if (rMenu) rMenu.css({"visibility": "hidden"});
            $("body").unbind("mousedown", onBodyMouseDown);
        }
        function onBodyMouseDown(event){
            if (!(event.target.id == "rMenu" || $(event.target).parents("#rMenu").length>0)) {
                rMenu.css({"visibility" : "hidden"});
            }
        }
        var addCount = 1;
        function addTreeNode() {
            hideRMenu();
            var newNode = { name:"增加" + (addCount++)};
            if (zTree.getSelectedNodes()[0]) {
                newNode.checked = zTree.getSelectedNodes()[0].checked;
                zTree.addNodes(zTree.getSelectedNodes()[0], newNode);
            } else {
                zTree.addNodes(null, newNode);
            }
        }
        function removeTreeNode() {
            hideRMenu();
            var nodes = zTree.getSelectedNodes();
            if (nodes && nodes.length>0) {
                if (nodes[0].children && nodes[0].children.length > 0) {
                    var msg = "要删除的节点是父节点，如果删除将连同子节点一起删掉。\n\n请确认！";
                    if (confirm(msg)==true){
                        zTree.removeNode(nodes[0]);
                    }
                } else {
                    zTree.removeNode(nodes[0]);
                }
            }
        }
        function checkTreeNode(checked) {
            var nodes = zTree.getSelectedNodes();
            if (nodes && nodes.length>0) {
                zTree.checkNode(nodes[0], checked, true);
            }
            hideRMenu();
        }
        function resetTree() {
            hideRMenu();
            $.fn.zTree.init($("#treeDemo"), setting, zNodes);
        }

        var zTree, rMenu;
        $(document).ready(function(){
            $.fn.zTree.init($("#treeDemo"), setting, zNodes);
            zTree = $.fn.zTree.getZTreeObj("treeDemo");
            rMenu = $("#rMenu");
        });
    </SCRIPT>
    <style type="text/css">
        #treeDemo{height: 700px;}
        div#rMenu {position:absolute; visibility:hidden; top:0; background-color: #555;text-align: left;padding: 2px;}
        div#rMenu ul li{
            margin: 1px 0;
            padding: 0 5px;
            cursor: pointer;
            list-style: none outside none;
            background-color: #DFDFDF;
        }
        .ztree{padding: 20px; border: none}
        .ztree *{font-size: 14px;}
        ul .ztree{ border:none;background-color: #FFF;}

    </style>
</head>
<body>
<button onclick="onCheck()" class="layui-btn"  style="width: 200px;" title="请正确勾选下方菜单后再进行保存" >保存</button>
<div >
    <ul id="treeDemo" class="ztree"></ul>
</div>
<div id="rMenu">
    <ul>
        <!--<li id="m_add" onclick="addTreeNode();">增加节点</li>-->
        <!--<li id="m_del" onclick="removeTreeNode();">删除节点</li>-->
        <!--<li id="m_check" onclick="checkTreeNode(true);">Check节点</li>-->
        <!--<li id="m_unCheck" onclick="checkTreeNode(false);">unCheck节点</li>-->
        <li id="m_reset" onclick="resetTree();">恢复初始状态</li>
    </ul>
</div>

<script>
    function onCheck(e,treeId,treeNode){
        var treeObj=$.fn.zTree.getZTreeObj("treeDemo"),
            nodes=treeObj.getCheckedNodes(true),
            names="",
            ids = "";
        for(var i=0;i<nodes.length;i++){
            names+=nodes[i].name + ",";
            ids  += nodes[i].id + ",";
            //alert(nodes[i].id); //获取选中节点的值
        }
        $("#nodes_id").val(ids);
        if(ids == ""){
            error('请选择数据');
            return false;
        }
        document.nodes.submit();
    }
</script>
<form name="nodes" class="layui-form" action="<?php echo url('accredit'); ?>" method="post">
<div class="layui-form-item">
    <input type="hidden" name="group_id" value="<?php echo $group_id; ?>">
    <input type="hidden" name="ids" value="" id="nodes_id">
</div>
</form>


<script>
    //Demo
    layui.use('form', function(){
        var form = layui.form();


    });

    function reset_auth_rule(){
        var url = "<?php echo url('reset_auth_rule'); ?>";
        $.post(url,{all:'all'},function(e){
            if(e == 1){
                layer.msg('重置成功');
            }else {
                layer.msg('重置失败');
            }
        },'json')
    }


</script>
</body>
</html>