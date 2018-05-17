/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : t5admin

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2017-10-26 21:56:34
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for ta_article
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
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ta_article
-- ----------------------------
INSERT INTO `ta_article` VALUES ('1', '1', null, '标题', '', '内容', '1', null, null, null, '0', '', '');
INSERT INTO `ta_article` VALUES ('2', '3', null, '表体1', '简介', '内容', '1', '1498111588', null, 'admin', '1', '', '');

-- ----------------------------
-- Table structure for ta_article_category
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
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ta_article_category
-- ----------------------------
INSERT INTO `ta_article_category` VALUES ('3', '测试文章分类', '', '', null, '1', '0');
INSERT INTO `ta_article_category` VALUES ('4', '语文学', '', '', null, '1', '0');
INSERT INTO `ta_article_category` VALUES ('5', '语文的儿子', null, null, '4', '1', null);
INSERT INTO `ta_article_category` VALUES ('6', '语文的孙子', '', '', '5', '1', '0');
INSERT INTO `ta_article_category` VALUES ('7', '关于我们的儿子', '', '', '1', '1', '0');

-- ----------------------------
-- Table structure for ta_auth_group
-- ----------------------------
DROP TABLE IF EXISTS `ta_auth_group`;
CREATE TABLE `ta_auth_group` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `title` char(100) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `rules` char(80) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ta_auth_group
-- ----------------------------
INSERT INTO `ta_auth_group` VALUES ('1', '超级管理员', '1', '1,5,6,7,8,9,2,10,11,12,13,3,14,4,15,16,sex,');
INSERT INTO `ta_auth_group` VALUES ('2', '普通管理员', '1', '2');
INSERT INTO `ta_auth_group` VALUES ('3', '文章编辑', '1', '');
INSERT INTO `ta_auth_group` VALUES ('4', 'admin1', '1', '');

-- ----------------------------
-- Table structure for ta_auth_group_access
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
INSERT INTO `ta_auth_group_access` VALUES ('0', '2');
INSERT INTO `ta_auth_group_access` VALUES ('1', '1');
INSERT INTO `ta_auth_group_access` VALUES ('1', '2');

-- ----------------------------
-- Table structure for ta_auth_rule
-- ----------------------------
DROP TABLE IF EXISTS `ta_auth_rule`;
CREATE TABLE `ta_auth_rule` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(80) NOT NULL DEFAULT '' COMMENT '权限表英文名',
  `title` char(20) NOT NULL DEFAULT '' COMMENT '权限表中文名',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `condition` char(100) NOT NULL DEFAULT '',
  `menu_id` int(10) NOT NULL,
  `pid` int(10) DEFAULT '0' COMMENT '自己添加的，目的是为了授权能够像菜单那样地柜显示',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ta_auth_rule
-- ----------------------------
INSERT INTO `ta_auth_rule` VALUES ('1', '系统顶级选项0', '网站设置', '1', '', '0', '0');
INSERT INTO `ta_auth_rule` VALUES ('2', '系统顶级选项1', '文章模块', '1', '', '1', '0');
INSERT INTO `ta_auth_rule` VALUES ('3', '系统顶级选项2', '常用功能', '1', '', '2', '0');
INSERT INTO `ta_auth_rule` VALUES ('4', '系统顶级选项3', '权限设置', '1', '', '3', '0');
INSERT INTO `ta_auth_rule` VALUES ('5', 'conf/add', '新增配置项', '1', '', '4', '1');
INSERT INTO `ta_auth_rule` VALUES ('6', 'conf/index', '配置项列表', '1', '', '5', '1');
INSERT INTO `ta_auth_rule` VALUES ('7', 'nav/index', '前台导航添加', '1', '', '6', '1');
INSERT INTO `ta_auth_rule` VALUES ('8', 'nav/clist', '前台导航列表', '1', '', '7', '1');
INSERT INTO `ta_auth_rule` VALUES ('9', 'MyAuth/index', '菜单管理', '1', '', '8', '1');
INSERT INTO `ta_auth_rule` VALUES ('10', 'article_category/index', '分类列表', '1', '', '9', '2');
INSERT INTO `ta_auth_rule` VALUES ('11', 'article_category/add', '新增分类', '1', '', '10', '2');
INSERT INTO `ta_auth_rule` VALUES ('12', 'article/index', '文章列表', '1', '', '11', '2');
INSERT INTO `ta_auth_rule` VALUES ('13', 'article/add', '新增文章', '1', '', '12', '2');
INSERT INTO `ta_auth_rule` VALUES ('14', 'cache/clear', '清理缓存', '1', '', '13', '3');
INSERT INTO `ta_auth_rule` VALUES ('15', 'MyAuthUserGroup/index', '用户组管理', '1', '', '14', '4');
INSERT INTO `ta_auth_rule` VALUES ('16', 'MyAuthUser/index', '用户管理', '1', '', '15', '4');
INSERT INTO `ta_auth_rule` VALUES ('17', 'my_auth_user_group/accredit', '授权', '1', '', '16', '15');
INSERT INTO `ta_auth_rule` VALUES ('18', 'my_auth_user_group/open_edit_ahth_group', '编辑组名', '1', '', '17', '15');

-- ----------------------------
-- Table structure for ta_conf
-- ----------------------------
DROP TABLE IF EXISTS `ta_conf`;
CREATE TABLE `ta_conf` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `ch_name` varchar(32) NOT NULL COMMENT '配置项中文吗',
  `en_name` varchar(32) NOT NULL COMMENT '配置项英文名',
  `conf_value` varchar(2500) DEFAULT NULL COMMENT '配置项值',
  `info` varchar(100) DEFAULT NULL COMMENT '配置项说明',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ta_conf
-- ----------------------------
INSERT INTO `ta_conf` VALUES ('1', '网站名称', 'web_name', '个人通用版后台_tp5通用后台', '                                                                                                    ');
INSERT INTO `ta_conf` VALUES ('2', '网址', 'web_url', 'http://localhost/tp5admin', '');
INSERT INTO `ta_conf` VALUES ('13', '网站首页关键字', 'index_keywords', '米醋儿网,米醋儿博客,micuer', '网站首页的关键字，方便seo优化');
INSERT INTO `ta_conf` VALUES ('14', '首页描述seo', 'index_description', '米醋儿网是一个专业解决快手教程，帮助快手新人学习和制作快手视频的一个网站！', '米醋儿网是一个专业解决快手教程，帮助快手新人学习和制作快手视频的一个网站！');
INSERT INTO `ta_conf` VALUES ('15', '后台分页条数', 'ht_page_size', '20', '');

-- ----------------------------
-- Table structure for ta_link
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
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ta_link
-- ----------------------------
INSERT INTO `ta_link` VALUES ('27', '米醋儿', '', 'http://www.micuer.com', '1', '0');
INSERT INTO `ta_link` VALUES ('28', '韩宇微博', '', 'http://weibo.com', '0', '1');
INSERT INTO `ta_link` VALUES ('29', '2', 'public/uploads/20171026\\f23798fd9802ea0b00fea71db5ed6582.png', '1', '1', '1');
INSERT INTO `ta_link` VALUES ('30', '3', 'public/uploads/20171026\\b29741cc5f9dd2797c67930bd5002a76.png', 'qqqqq', '1', '1');
INSERT INTO `ta_link` VALUES ('31', '1', 'public/uploads/20171026\\f23798fd9802ea0b00fea71db5ed6582.png', '1', '1', '1');

-- ----------------------------
-- Table structure for ta_menu
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
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ta_menu
-- ----------------------------
INSERT INTO `ta_menu` VALUES ('1', '网站设置', '', '', '', '1', '0');
INSERT INTO `ta_menu` VALUES ('2', '文章模块', '', '', '', '1', '0');
INSERT INTO `ta_menu` VALUES ('3', '常用功能', '', '', '', '1', '0');
INSERT INTO `ta_menu` VALUES ('4', '权限设置', '', '', '', '1', '0');
INSERT INTO `ta_menu` VALUES ('5', '新增配置项', 'conf', 'add', '', '1', '1');
INSERT INTO `ta_menu` VALUES ('6', '配置项列表', 'conf', 'index', '', '1', '1');
INSERT INTO `ta_menu` VALUES ('7', '前台导航添加', 'nav', 'index', '', '1', '1');
INSERT INTO `ta_menu` VALUES ('8', '前台导航列表', 'nav', 'clist', '', '1', '1');
INSERT INTO `ta_menu` VALUES ('9', '菜单管理', 'MyAuth', 'index', '', '1', '1');
INSERT INTO `ta_menu` VALUES ('10', '分类列表', 'article_category', 'index', '', '1', '2');
INSERT INTO `ta_menu` VALUES ('11', '新增分类', 'article_category', 'add', '', '1', '2');
INSERT INTO `ta_menu` VALUES ('12', '文章列表', 'article', 'index', '', '1', '2');
INSERT INTO `ta_menu` VALUES ('13', '新增文章', 'article', 'add', '', '1', '2');
INSERT INTO `ta_menu` VALUES ('14', '清理缓存', 'cache', 'clear', '', '1', '3');
INSERT INTO `ta_menu` VALUES ('15', '用户组管理', 'MyAuthUserGroup', 'index', '', '1', '4');
INSERT INTO `ta_menu` VALUES ('16', '用户管理', 'MyAuthUser', 'index', '', '1', '4');
INSERT INTO `ta_menu` VALUES ('17', '授权', 'my_auth_user_group', 'accredit', '', '1', '15');
INSERT INTO `ta_menu` VALUES ('18', '编辑组名', 'my_auth_user_group', 'open_edit_ahth_group', '', '1', '15');

-- ----------------------------
-- Table structure for ta_nav
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
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ta_nav
-- ----------------------------
INSERT INTO `ta_nav` VALUES ('1', '1', '1', '1', '1', '0');
INSERT INTO `ta_nav` VALUES ('2', '1', '1', '1', '1', '0');
INSERT INTO `ta_nav` VALUES ('3', '1', '0', '1', '1', '0');

-- ----------------------------
-- Table structure for ta_user
-- ----------------------------
DROP TABLE IF EXISTS `ta_user`;
CREATE TABLE `ta_user` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `login_ip` varchar(32) DEFAULT NULL,
  `login_time` varchar(12) DEFAULT NULL,
  `pid` int(10) DEFAULT NULL COMMENT '父级id',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ta_user
-- ----------------------------
INSERT INTO `ta_user` VALUES ('1', 'admin', 'e10adc3949ba59abbe56e057f20f883e', null, null, null);
INSERT INTO `ta_user` VALUES ('2', 'admin1', '21232f297a57a5a743894a0e4a801fc3', null, null, null);
