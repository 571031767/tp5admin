/*
Navicat MySQL Data Transfer

Source Server         : local
Source Server Version : 50547
Source Host           : localhost:3306
Source Database       : tp5admin

Target Server Type    : MYSQL
Target Server Version : 50547
File Encoding         : 65001

Date: 2018-05-30 17:17:04
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `ta_article`
-- ----------------------------
DROP TABLE IF EXISTS `ta_article`;
CREATE TABLE `ta_article` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `category_id` int(10) NOT NULL COMMENT '文章的分类id',
  `attr_id` int(10) DEFAULT NULL COMMENT '文章的属性id  比如热门 推荐等',
  `name` varchar(250) NOT NULL,
  `info` varchar(250) DEFAULT NULL COMMENT '文件简介',
  `content` text COMMENT '文章内容',
  `status` tinyint(1) NOT NULL,
  `add_time` int(10) DEFAULT NULL,
  `edit_time` int(10) DEFAULT NULL,
  `add_user` varchar(30) DEFAULT NULL,
  `oid` int(5) DEFAULT '255',
  `seo_key` varchar(120) DEFAULT NULL,
  `seo_content` varchar(200) DEFAULT NULL,
  `uid` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ta_article
-- ----------------------------
INSERT INTO `ta_article` VALUES ('2', '3', null, '表体1', '简介', '内容', '1', '1498111588', null, 'admin', '1', '', '', '9');
INSERT INTO `ta_article` VALUES ('4', '3', null, '3ddddd', 'www', 'wwww', '0', null, null, null, '255', null, null, '9');

-- ----------------------------
-- Table structure for `ta_article_category`
-- ----------------------------
DROP TABLE IF EXISTS `ta_article_category`;
CREATE TABLE `ta_article_category` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(100) DEFAULT NULL,
  `category_seo_key` varchar(100) DEFAULT NULL,
  `category_seo_description` varchar(250) DEFAULT NULL,
  `pid` int(10) DEFAULT NULL,
  `_blank` tinyint(1) DEFAULT '1' COMMENT '是否新窗口打开',
  `oid` tinyint(5) DEFAULT NULL COMMENT '排序',
  `add_time` int(10) DEFAULT NULL,
  `alter_time` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ta_article_category
-- ----------------------------

-- ----------------------------
-- Table structure for `ta_auth_group`
-- ----------------------------
DROP TABLE IF EXISTS `ta_auth_group`;
CREATE TABLE `ta_auth_group` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `title` char(100) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `rules` char(80) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ta_auth_group
-- ----------------------------
INSERT INTO `ta_auth_group` VALUES ('7', '超级管理员', '1', '46,3,14,4,15,17,18,1,6,8,9,30,31,');
INSERT INTO `ta_auth_group` VALUES ('10', '普通管理员', '1', '1,6,42,8,39,40,41,9,30,31,35,36,37,38,');
INSERT INTO `ta_auth_group` VALUES ('11', '普通用户', '1', '1,6,8,9,30,35,2,10,12,3,14,28,4,15,16,43,');
INSERT INTO `ta_auth_group` VALUES ('12', 'test', '1', '43,3,14,28,2,12,4,15,16,26,1,6,8,9,30,35,');

-- ----------------------------
-- Table structure for `ta_auth_group_access`
-- ----------------------------
DROP TABLE IF EXISTS `ta_auth_group_access`;
CREATE TABLE `ta_auth_group_access` (
  `uid` mediumint(8) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  UNIQUE KEY `uid_group_id` (`uid`,`group_id`),
  KEY `uid` (`uid`),
  KEY `group_id` (`group_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ta_auth_group_access
-- ----------------------------
INSERT INTO `ta_auth_group_access` VALUES ('1', '5');
INSERT INTO `ta_auth_group_access` VALUES ('6', '5');
INSERT INTO `ta_auth_group_access` VALUES ('7', '6');
INSERT INTO `ta_auth_group_access` VALUES ('9', '7');
INSERT INTO `ta_auth_group_access` VALUES ('10', '11');
INSERT INTO `ta_auth_group_access` VALUES ('11', '12');
INSERT INTO `ta_auth_group_access` VALUES ('12', '12');

-- ----------------------------
-- Table structure for `ta_banner`
-- ----------------------------
DROP TABLE IF EXISTS `ta_banner`;
CREATE TABLE `ta_banner` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `url` varchar(500) DEFAULT NULL,
  `picture` varchar(500) DEFAULT NULL,
  `title` varchar(200) DEFAULT NULL,
  `add_time` int(10) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  `user` varchar(255) DEFAULT NULL,
  `_target` varchar(100) DEFAULT '_blank',
  `oid` int(100) DEFAULT '255',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of ta_banner
-- ----------------------------
INSERT INTO `ta_banner` VALUES ('6', '1', 'public/uploads/20180516\\ff91095070a987f352de2fbc10c17b39.jpg', '1', '1526450985', '0', 'admin', '', '0');

-- ----------------------------
-- Table structure for `ta_conf`
-- ----------------------------
DROP TABLE IF EXISTS `ta_conf`;
CREATE TABLE `ta_conf` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `ch_name` varchar(32) NOT NULL COMMENT '配置项中文吗',
  `en_name` varchar(32) NOT NULL COMMENT '配置项英文名',
  `conf_value` varchar(2500) DEFAULT NULL COMMENT '配置项值',
  `info` varchar(100) DEFAULT NULL COMMENT '配置项说明',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ta_conf
-- ----------------------------
INSERT INTO `ta_conf` VALUES ('1', '网站名称', 'web_name', '个人通用版后台_tp5通用后台', '                                                                                                    ');
INSERT INTO `ta_conf` VALUES ('2', '网址', 'web_url', 'http://localhost/tp5admin', '');
INSERT INTO `ta_conf` VALUES ('13', '网站首页关键字', 'index_keywords', '米醋儿网,米醋儿博客,micuer', '网站首页的关键字，方便seo优化');
INSERT INTO `ta_conf` VALUES ('14', '首页描述seo', 'index_description', '米醋儿网是一个专业解决快手教程，帮助快手新人学习和制作快手视频的一个网站！', '米醋儿网是一个专业解决快手教程，帮助快手新人学习和制作快手视频的一个网站！');
INSERT INTO `ta_conf` VALUES ('17', '最大文件上传', 'max_size', '2048', 'KB\r\n');

-- ----------------------------
-- Table structure for `ta_link`
-- ----------------------------
DROP TABLE IF EXISTS `ta_link`;
CREATE TABLE `ta_link` (
  `id` smallint(4) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `img` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `ordid` tinyint(3) unsigned NOT NULL DEFAULT '255',
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ta_link
-- ----------------------------
INSERT INTO `ta_link` VALUES ('27', '米醋儿', '', 'http://www.micuer.com', '1', '1');
INSERT INTO `ta_link` VALUES ('33', '微博', '', 'https://weibo.com/u/1942350072/home?wvr=5&lf=reg', '0', '1');

-- ----------------------------
-- Table structure for `ta_menu`
-- ----------------------------
DROP TABLE IF EXISTS `ta_menu`;
CREATE TABLE `ta_menu` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) DEFAULT NULL,
  `model_name` varchar(50) DEFAULT NULL,
  `action_name` varchar(50) DEFAULT NULL,
  `info` varchar(250) DEFAULT NULL COMMENT '说明',
  `status` tinyint(1) DEFAULT '1',
  `pid` int(10) DEFAULT NULL,
  `o` int(5) NOT NULL DEFAULT '500' COMMENT '排序',
  `icon` varchar(200) DEFAULT NULL COMMENT '图标',
  `is_menu` tinyint(1) DEFAULT '0' COMMENT '是否为左侧显示菜单',
  `desc` varchar(255) DEFAULT NULL COMMENT '必要的文字说明',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=56 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ta_menu
-- ----------------------------
INSERT INTO `ta_menu` VALUES ('1', '网站设置', '', '', '', '1', '0', '999', '', '1', null);
INSERT INTO `ta_menu` VALUES ('2', '文章模块', '', '', '', '1', '0', '500', '&#xe60a;', '1', null);
INSERT INTO `ta_menu` VALUES ('3', '常用功能', '', '', '', '1', '0', '2', '&#xe632;', '1', null);
INSERT INTO `ta_menu` VALUES ('4', '权限设置', '', '', '', '1', '0', '500', '&#xe613;', '1', null);
INSERT INTO `ta_menu` VALUES ('44', '新增分类', 'articleCategory', 'add', '', '1', '10', '500', '', '0', null);
INSERT INTO `ta_menu` VALUES ('6', '基础配置', 'conf', 'index', '', '1', '1', '500', '', '1', null);
INSERT INTO `ta_menu` VALUES ('43', '网站首页', 'index', 'index', '', '1', '0', '1', '&#xe68e;', '0', null);
INSERT INTO `ta_menu` VALUES ('8', '前台导航', 'nav', 'clist', '', '1', '1', '500', '', '1', null);
INSERT INTO `ta_menu` VALUES ('9', '菜单管理', 'myAuth', 'index', '', '1', '1', '500', '&#xe62a;', '1', null);
INSERT INTO `ta_menu` VALUES ('10', '分类列表', 'articleCategory', 'index', '', '1', '2', '500', '&#xe62a;', '1', null);
INSERT INTO `ta_menu` VALUES ('46', '系统功能', 'system', 'index', '', '1', '0', '0', '', '0', null);
INSERT INTO `ta_menu` VALUES ('12', '文章列表', 'article', 'index', '', '1', '2', '500', '&#xe648;', '1', null);
INSERT INTO `ta_menu` VALUES ('13', '新增文章', 'article', 'add', '', '1', '2', '500', '&#xe61f;', '1', null);
INSERT INTO `ta_menu` VALUES ('14', '清理缓存', 'cache', 'clear', '', '1', '3', '500', '', '1', null);
INSERT INTO `ta_menu` VALUES ('15', '管理员分组管理', 'myAuthUserGroup', 'index', '', '1', '4', '500', '&#xe613;', '1', null);
INSERT INTO `ta_menu` VALUES ('16', '管理员管理', 'admin', 'index', '', '1', '4', '500', '&#xe613;', '1', null);
INSERT INTO `ta_menu` VALUES ('17', '授权', 'my_auth_user_group', 'accredit', '', '1', '15', '500', '&#xe650;', '1', null);
INSERT INTO `ta_menu` VALUES ('18', '编辑组名', 'my_auth_user_group', 'open_edit_ahth_group', '', '1', '15', '500', '&#xe613;', '1', null);
INSERT INTO `ta_menu` VALUES ('26', '删除管理员', 'admin', 'del', '', '1', '16', '500', '', '0', null);
INSERT INTO `ta_menu` VALUES ('27', '添加管理员', 'admin', 'add', '', '1', '16', '500', '', '0', null);
INSERT INTO `ta_menu` VALUES ('28', '图片管理', 'Picmanage', 'index', '', '1', '3', '500', '', '1', null);
INSERT INTO `ta_menu` VALUES ('29', '上传新图', 'Picmanage', 'add_new_pic', '', '1', '28', '500', '&#xe654;', '0', null);
INSERT INTO `ta_menu` VALUES ('30', '首页轮播', 'Banner', 'index', '', '1', '1', '500', '', '1', null);
INSERT INTO `ta_menu` VALUES ('31', '新增轮播', 'Banner', 'add', '', '1', '30', '500', '&#xe608;', '0', null);
INSERT INTO `ta_menu` VALUES ('32', '添加用户组', 'MyAuthUserGroup', 'add', '', '1', '15', '500', '&#xe612;', '0', null);
INSERT INTO `ta_menu` VALUES ('33', '重置密码', 'User', 'reset_pass', '', '1', '16', '500', '&#xe9aa;', '0', null);
INSERT INTO `ta_menu` VALUES ('35', '友情链接', 'Friendlink', 'index', '', '1', '1', '500', '', '1', null);
INSERT INTO `ta_menu` VALUES ('36', '新增友情链接', 'Friendlink', 'add', '', '1', '35', '500', '&#xe608;', '0', null);
INSERT INTO `ta_menu` VALUES ('37', '删除友链', 'Friendlink', 'dalete_link', '', '1', '35', '500', '&#x1007;', '0', null);
INSERT INTO `ta_menu` VALUES ('38', '修改友链', 'Friendlink', 'edit', '', '1', '35', '500', '&#xe642;', '0', null);
INSERT INTO `ta_menu` VALUES ('39', '新增', 'nav', 'add', '', '1', '8', '500', '', '0', null);
INSERT INTO `ta_menu` VALUES ('40', '修改', 'nav', 'edit', '', '1', '8', '500', '', '0', null);
INSERT INTO `ta_menu` VALUES ('41', '删除', 'nav', 'del', '', '1', '8', '500', '', '0', null);
INSERT INTO `ta_menu` VALUES ('42', '新增配置项', 'conf', 'add', '', '1', '6', '500', '', '0', null);
INSERT INTO `ta_menu` VALUES ('47', '执行原生sql', 'Database', 'sql', '', '1', '46', '500', '', '0', null);
INSERT INTO `ta_menu` VALUES ('48', '修改基础配置', 'Conf', 'edit', '', '1', '6', '500', '', '0', null);
INSERT INTO `ta_menu` VALUES ('49', '删除基础配置', 'Conf', 'del_conf_item', '', '1', '6', '500', '', '0', null);
INSERT INTO `ta_menu` VALUES ('50', '生成配置文件', 'Conf', 'set_conf_items', '', '1', '6', '500', '', '0', null);
INSERT INTO `ta_menu` VALUES ('51', '新增菜单', 'MyAuth', 'add_new_menu', '', '1', '9', '500', '', '0', null);
INSERT INTO `ta_menu` VALUES ('52', '删除菜单', 'MyAuth', 'del_item', '', '1', '9', '500', '', '0', null);
INSERT INTO `ta_menu` VALUES ('53', '修改', 'MyAuth', 'edit', '', '1', '9', '500', '', '0', null);
INSERT INTO `ta_menu` VALUES ('54', '删除', 'Banner', 'del', '', '1', '30', '500', '', '0', null);
INSERT INTO `ta_menu` VALUES ('55', '修改', 'Banner', 'change_status', '', '1', '30', '500', '', '0', null);

-- ----------------------------
-- Table structure for `ta_nav`
-- ----------------------------
DROP TABLE IF EXISTS `ta_nav`;
CREATE TABLE `ta_nav` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `_blank` tinyint(1) NOT NULL DEFAULT '0',
  `src` varchar(500) NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `istop` tinyint(1) DEFAULT '1' COMMENT '0为顶部导航，1为中部导航，2为底部导航',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ta_nav
-- ----------------------------

-- ----------------------------
-- Table structure for `ta_pics`
-- ----------------------------
DROP TABLE IF EXISTS `ta_pics`;
CREATE TABLE `ta_pics` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) DEFAULT NULL,
  `src` varchar(500) DEFAULT NULL,
  `add_time` int(10) DEFAULT NULL,
  `user` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `default` (`title`,`user`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of ta_pics
-- ----------------------------

-- ----------------------------
-- Table structure for `ta_user`
-- ----------------------------
DROP TABLE IF EXISTS `ta_user`;
CREATE TABLE `ta_user` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `login_ip` varchar(32) DEFAULT NULL,
  `login_time` varchar(12) DEFAULT NULL,
  `pid` int(10) DEFAULT NULL COMMENT '父级id',
  `status` tinyint(1) DEFAULT '1',
  `headimgurl` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ta_user
-- ----------------------------
INSERT INTO `ta_user` VALUES ('9', 'admin', '21232f297a57a5a743894a0e4a801fc3', null, null, null, '1', null);
INSERT INTO `ta_user` VALUES ('10', 'user', 'ee11cbb19052e40b07aac0ca060c23ee', null, null, null, '1', null);
INSERT INTO `ta_user` VALUES ('12', '111', '698d51a19d8a121ce581499d7b701668', null, null, null, '0', null);
