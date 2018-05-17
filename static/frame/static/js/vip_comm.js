/**
 * @name:   vip-admin 后台模板主入口
 * @author: 随丶
 */
layui.define('layer', function (exports) {

    // 封装方法
    var mod = {
        // 添加选项卡 [操作对象，标签标题，url地址]
        add: function (elem, tit, url) {
            parent.addTab(elem, tit, url);
        }
        // 获取当前选中的选项卡的lay-id
        ,getThisTabId: function () {
            // 获取并返回 id
            return parent.getThisTabID();
        }
        // 删除选项卡[标签lay-id]
        ,del: function (id) {
            parent.delTab(id);
        }
    };

    // 输出
    exports('vip_tab', mod);
});
layui.define(['layer', 'element'], function (exports) {
    // 操作对象
    var layer = layui.layer
        , element = layui.element
        , $ = layui.jquery;

    // 封装方法
    var mod = {
        // 添加 HTMl
        addHtml: function (addr, obj, treeStatus, data) {
            // 请求数据
            $.get(addr, data, function (res) {
                var view = "";
                if (res.data) {
                    $(res.data).each(function (k, v) {
                        v.subset && treeStatus ? view += '<li class="layui-nav-item layui-nav-itemed">' : view += '<li class="layui-nav-item">';
                        if (v.subset) {
                            view += '<a href="javascript:;"><i class="layui-icon">' + v.icon + '</i>' + v.text + '</a><dl class="layui-nav-child">';
                            $(v.subset).each(function (ko, vo) {
                                view += '<dd>';
                                if(vo.target){
                                    view += '<a href="' + vo.href + '" target="_blank">';
                                }else{
                                    view += '<a href="javascript:;" href-url="' + vo.href + '">';
                                }
                                view += '<i class="layui-icon">' + vo.icon + '</i>' + vo.text + '</a></dd>';
                            });
                            view += '<dl>';
                        } else {
                            if (v.target) {
                                view += '<a href="' + v.href + '" target="_blank">';
                            } else {
                                view += '<a href="javascript:;" href-url="' + v.href + '">';
                            }
                            view += '<i class="layui-icon">' + v.icon + '</i>' + v.text + '</a>';
                        }
                        view += '</li>';
                    });
                } else {
                    layer.msg('接受的菜单数据不符合规范,无法解析');
                }
                // 添加到 HTML
                $(document).find(".layui-nav[lay-filter=" + obj + "]").html(view);
                // 更新渲染
                element.init();
            },'json');
        }
        // 左侧主体菜单 [请求地址,过滤ID,是否展开,携带参数]
        , main: function (addr, obj, treeStatus, data) {
            // 添加HTML
            this.addHtml(addr, obj, treeStatus, data);
        }
        // 顶部左侧菜单 [请求地址,过滤ID,是否展开,携带参数]
        , top_left: function (addr, obj, treeStatus, data) {
            // 添加HTML
            this.addHtml(addr, obj, treeStatus, data);
        }
        /*// 顶部右侧菜单
         ,top_right: function(){

         }*/
    };

    // 输出
    exports('vip_nav', mod);
});
layui.define(['layer', 'element'], function (exports) {

    var $ = layui.jquery;

    // 封装方法
    var mod = {
        // 删除公共方法   deleteAll(ids,请求的url,操作成功跳转url,操作失败跳转url)
        deleteAll: function (ids, url, sUrl, eUrl) {
            // ids不能为空
            if (ids == null || ids == '') {
                layer.msg('请选择要删除的数据', {time: 2000});
                return false;
            } else {
                layer.confirm('确认删除选中数据?', {
                    title: '删除',
                    btn: ['确认', '取消'] // 按钮
                }, function (index, layero) {
                    // 确认
                    $.post(url, {ids: ids}, function (res) {
                        // 大于0表示删除成功
                        if (res.status > 0) {
                            // 提示信息并跳转
                            layer.msg(res.msg, {time: 1500}, function () {
                                location.href = sUrl;
                            })
                        } else {
                            // 提示信息并跳转
                            layer.msg(res.msg, {time: 1500}, function () {
                                location.href = eUrl;
                            })
                        }
                    });
                }, function (index) {
                    // 关闭
                    layer.close(index);
                });
            }
        }
        // 转换时间戳为日期时间(时间戳,是否只显示年月日时分,8)
        ,unixToDate: function (unixTime, isFull, timeZone) {
            if (unixTime == '' || unixTime == null) {
                return '';
            }
            if (typeof (timeZone) == 'number') {
                unixTime = parseInt(unixTime) + parseInt(timeZone) * 60 * 60;
            }
            var time = new Date(unixTime * 1000);
            var ymdhis = "";
            var year, month, date, hours, minutes, seconds;
            if (time.getUTCFullYear() < 10) {
                year = '0' + time.getUTCFullYear();
            } else {
                year = time.getUTCFullYear();
            }
            if ((time.getUTCMonth() + 1) < 10) {
                month = '0' + (time.getUTCMonth() + 1);
            } else {
                month = (time.getUTCMonth() + 1);
            }
            if (time.getUTCDate() < 10) {
                date = '0' + time.getUTCDate();
            } else {
                date = time.getUTCDate();
            }
            ymdhis += year + "-";
            ymdhis += month + "-";
            ymdhis += date;
            if (isFull === true) {
                if (time.getUTCHours() < 10) {
                    hours = '0' + time.getUTCHours();
                } else {
                    hours = time.getUTCHours();
                }
                if (time.getUTCMinutes() < 10) {
                    minutes = '0' + time.getUTCMinutes();
                } else {
                    minutes = time.getUTCMinutes();
                }
                if (time.getUTCSeconds() < 10) {
                    seconds = '0' + time.getUTCSeconds();
                } else {
                    seconds = time.getUTCSeconds();
                }
                ymdhis += " " + hours + ":";
                ymdhis += minutes;
                // ymdhis += seconds;
            }
            return ymdhis;
        }
        // 批量删除 返回需要的 ids
        ,getIds: function (o, str) {
            var obj = o.find('tbody tr td:first-child input[type="checkbox"]:checked');
            var list = '';
            obj.each(function (index, elem) {
                list += $(elem).attr(str) + ',';
            });
            // 去除最后一位逗号
            list = list.substr(0, (list.length - 1));
            return list;
        }
        // 获取高度
        ,getFullHeight: function(){
            return $(window).height() - ( $('.my-btn-box').outerHeight(true) ? $('.my-btn-box').outerHeight(true) + 35 :  40 );
        }
    };

    // 输出
    exports('vip_table', mod);
});
// 配置
layui.config({
    base: './frame/static/js/'  // 模块目录
}).extend({                     // 模块别名
    vip_nav: 'vip_nav'
    , vip_tab: 'vip_tab'
    , vip_table: 'vip_table'
});

// 主入口方法
layui.use(['layer', 'element', 'util'], function () {

    // 操作对象
    var device = layui.device()
        , element = layui.element
        , layer = layui.layer
        , util = layui.util
        , $ = layui.jquery
        , cardIdx = 0
        , cardLayId = 0
        , side = $('.my-side')
        , body = $('.my-body')
        , footer = $('.my-footer');

    //阻止IE7以下访问
    if (device.ie && device.ie < 8) {
        layer.alert('如果您非得使用ie浏览vip-admin 后台模板，那么请使用ie8+');
    }

    // 导航栏收缩
    function navHide(t, st) {
        var time = t ? t : 50;
        st ? localStorage.log = 1 : localStorage.log = 0;
        side.animate({'left': -200}, time);
        body.animate({'left': 0}, time);
        footer.animate({'left': 0}, time);
    }

    // 导航栏展开
    function navShow(t, st) {
        var time = t ? t : 50;
        st ? localStorage.log = 0 : localStorage.log = 1;
        side.animate({'left': 0}, time);
        body.animate({'left': 200}, time);
        footer.animate({'left': 200}, time);
    }

    // 监听导航栏收缩
    $('.btn-nav').on('click', function () {
        if (localStorage.log == 0) {
            navShow(50);
        } else {
            navHide(50);
        }
    });

    // 根据导航栏text获取lay-id
    function getTitleId(card, title) {
        var id = -1;
        $(document).find(".layui-tab[lay-filter=" + card + "] ul li").each(function () {
            if (title === $(this).find('span').html()) {
                id = $(this).attr('lay-id');
            }
        });
        return id;
    }

    // 添加TAB选项卡
    window.addTab = function (elem, tit, url) {
        var card = 'card';                                              // 选项卡对象
        var title = tit ? tit : elem.children('a').html();              // 导航栏text
        var src = url ? url : elem.children('a').attr('href-url');      // 导航栏跳转URL
        var id = new Date().getTime();                                  // ID
        var flag = getTitleId(card, title);                             // 是否有该选项卡存在
        // 大于0就是有该选项卡了
        if (flag > 0) {
            id = flag;
        } else {
            if (src) {
                //新增
                element.tabAdd(card, {
                    title: '<span>' + title + '</span>'
                    , content: '<iframe src="' + src + '" frameborder="0"></iframe>'
                    , id: id
                });
                // 关闭弹窗
                layer.closeAll();
            }
        }
        // 切换相应的ID tab
        element.tabChange(card, id);
        // 提示信息
        // layer.msg(title);
    };

    // 监听顶部左侧导航
    element.on('nav(side-top-left)', function (elem) {
        // 添加tab方法
        window.addTab(elem);
    });

    // 监听顶部右侧导航
    element.on('nav(side-top-right)', function (elem) {
        // 修改skin
        if ($(this).attr('data-skin')) {
            localStorage.skin = $(this).attr('data-skin');
            skin();
        } else {
            // 添加tab方法
            window.addTab(elem);
        }
    });

    // 监听导航(side-main)点击切换页面
    element.on('nav(side-main)', function (elem) {
        // 添加tab方法
        window.addTab(elem);
    });

    // 删除选项卡
    window.delTab = function (layId) {
        // 删除
        element.tabDelete('card', layId);
    };

    // 删除所有选项卡
    window.delAllTab = function () {
        // 选项卡对象
        layui.each($('.my-body .layui-tab-title > li'), function (k, v) {
            var layId = $(v).attr('lay-id');
            if (layId > 1) {
                // 删除
                element.tabDelete('card', layId);
            }
        });
    };

    // 获取当前选中选项卡lay-id
    window.getThisTabID = function () {
        // 当前选中的选项卡id
        return $(document).find('body .my-body .layui-tab-card > .layui-tab-title .layui-this').attr('lay-id');
    };

    // 双击关闭相应选项卡
    $(document).on('dblclick', '.my-body .layui-tab-card > .layui-tab-title li', function () {
        // 欢迎页面以外，删除选项卡
        if ($(this).index() > 0) {
            element.tabDelete('card', $(this).attr('lay-id'));
        } else {
            layer.msg('欢迎页面不能关闭')
        }
    });

    // 选项卡右键事件阻止
    $(document).on("contextmenu", '.my-body .layui-tab-card > .layui-tab-title li', function () {
        return false;
    });

    // 选项卡右键事件
    $(document).on("mousedown", '.my-body .layui-tab-card > .layui-tab-title li', function (e) {
        // 判断是右键点击事件并且不是欢迎页面选项卡
        if (3 == e.which && $(this).index() > 0) {
            // 赋值
            cardIdx = $(this).index();
            cardLayId = $(this).attr('lay-id');
            console.log('lay-id:' + cardLayId);
            // 选择框
            layer.tips($('.my-dblclick-box').html(), $(this), {
                skin: 'dblclick-tips-box',
                tips: 3,
                time: false
            });
        }
    });

    // 点击body关闭tips
    $(document).on('click', 'html', function () {
        layer.closeAll('tips');
    });

    // 右键提示框菜单操作-刷新页面
    $(document).on('click', '.card-refresh', function () {
        // 窗体对象
        var ifr = $(document).find('.my-body .layui-tab-content .layui-tab-item iframe').eq(cardIdx);
        // 刷新当前页
        ifr.attr('src', ifr.attr('src'));
        // 切换到当前选项卡
        element.tabChange('card', cardLayId);
    });

    // 右键提示框菜单操作-关闭页面
    $(document).on('click', '.card-close', function () {
        // 删除
        window.delTab(cardLayId);
    });

    // 右键提示框菜单操作-关闭所有页面
    $(document).on('click', '.card-close-all', function () {
        // 删除
        window.delAllTab();
    });

    // 打赏
    $('.pay').on('click', function () {
        layer.open({
            type: 1,
            title: false,               // 标题不显示
            closeBtn: false,            // 关闭按钮不显示
            shadeClose: true,           // 点击遮罩关闭
            area: ['auto', 'auto'],      // 宽高
            content: $('.my-pay-box')   // 弹出内容
        });
    });

    // 皮肤
    function skin() {
        var skin = localStorage.skin ? localStorage.skin : 0;
        var body = $('body');
        body.removeClass('skin-0');
        body.removeClass('skin-1');
        body.removeClass('skin-2');
        body.addClass('skin-' + skin);
    }

    // 工具
    function _util() {
        var bar = $('.layui-fixbar');
        // 分辨率小于1023  使用内部工具组件
        if ($(window).width() < 1023) {
            util.fixbar({
                bar1: '&#xe602;'
                , css: {left: 10, bottom: 54}
                , click: function (type) {
                    if (type === 'bar1') {
                        //iframe层
                        layer.open({
                            type: 1,                        // 类型
                            title: false,                   // 标题
                            offset: 'l',                    // 定位 左边
                            closeBtn: 0,                    // 关闭按钮
                            anim: 0,                        // 动画
                            shadeClose: true,               // 点击遮罩关闭
                            shade: 0.8,                     // 半透明
                            area: ['150px', '100%'],        // 区域
                            skin: 'my-mobile',              // 样式
                            content: $('body .my-side').html() // 内容
                        });
                    }
                    element.init();
                }
            });
            bar.removeClass('layui-hide');
            bar.addClass('layui-show');
        } else {
            bar.removeClass('layui-show');
            bar.addClass('layui-hide');
        }
    };

    // 自适应
    $(window).on('resize', function () {
        if ($(window).width() > 1023) {
            navShow(10);
        } else {
            navHide(10);
        }
        _util();
    });

    // 监听控制content高度
    function init() {
        // 起始判断-收缩/展开
        if (!localStorage.log) {
            if ($(window).width() > 1023) {
                if (localStorage.log == 0) {
                    navHide(10);
                } else {
                    navShow(10);
                }
            } else {
                navHide(10);
            }
        } else {
            if (localStorage.log == 0) {
                navHide(10);
            } else {
                navShow(10);
            }
        }
        // 工具
        _util();
        // skin
        skin();
        // 选项卡高度
        cardTitleHeight = $(document).find(".layui-tab[lay-filter='card'] ul.layui-tab-title").height();
        // 需要减去的高度
        height = $(window).height() - $('.layui-header').height() - cardTitleHeight - $('.layui-footer').height();
        // 设置高度
        $(document).find(".layui-tab[lay-filter='card'] div.layui-tab-content").height(height - 2);
    }

    // 初始化
    init();
});