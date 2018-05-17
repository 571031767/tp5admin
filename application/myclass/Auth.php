<?php
namespace app\myclass;
use think\Db;
/**
 * 权限认证类
 * 功能特性：
 * 修改后对于用户的峨眉一部操作都需要进行认证-比如删除 添加文章等 包括ajax的删除等一系列都需要认证
 * 因此，请详细讲每一个操作都添加到表单中，便于以后授权操作
 */

//数据库
/*
-- ----------------------------
-- think_auth_rule，规则表，
-- id:主键，name：规则唯一标识, title：规则中文名称 status 状态：为1正常，为0禁用，condition：规则表达式，为空表示存在就验证，不为空表示按照条件验证
-- ----------------------------
 DROP TABLE IF EXISTS `think_auth_rule`;
CREATE TABLE `think_auth_rule` (  
    `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,  
    `name` char(80) NOT NULL DEFAULT '',  
    `title` char(20) NOT NULL DEFAULT '',  
    `type` tinyint(1) NOT NULL DEFAULT '1',    
    `status` tinyint(1) NOT NULL DEFAULT '1',  
    `condition` char(100) NOT NULL DEFAULT '',  # 规则附件条件,满足附加条件的规则,才认为是有效的规则
    PRIMARY KEY (`id`),  
    UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;
-- ----------------------------
-- think_auth_group 用户组表， 
-- id：主键， title:用户组中文名称， rules：用户组拥有的规则id， 多个规则","隔开，status 状态：为1正常，为0禁用
-- ----------------------------
 DROP TABLE IF EXISTS `think_auth_group`;
CREATE TABLE `think_auth_group` ( 
    `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT, 
    `title` char(100) NOT NULL DEFAULT '', 
    `status` tinyint(1) NOT NULL DEFAULT '1', 
    `rules` char(80) NOT NULL DEFAULT '', 
    PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;
-- ----------------------------
-- think_auth_group_access 用户组明细表
-- uid:用户id，group_id：用户组id
-- ----------------------------
DROP TABLE IF EXISTS `think_auth_group_access`;
CREATE TABLE `think_auth_group_access` (  
    `uid` mediumint(8) unsigned NOT NULL,  
    `group_id` mediumint(8) unsigned NOT NULL, 
    UNIQUE KEY `uid_group_id` (`uid`,`group_id`),  
    KEY `uid` (`uid`), 
    KEY `group_id` (`group_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
 */
class Auth{

    //默认配置
    protected $_config = array(
        'AUTH_ON'           => true,    // 认证开关
        'AUTH_TYPE'         => 1,       // 认证方式，1为实时认证；2为登录认证。
        'AUTH_GROUP'        => 'auth_group',        // 用户组数据表名
        'AUTH_GROUP_ACCESS' => 'auth_group_access', // 用户-用户组关系表
        'AUTH_RULE'         => 'menu',              // 权限规则表
        'AUTH_USER'         => 'user',               // 用户信息表
        'MODEL_NAME'        =>'model_name',           // menu 表中存的类名 列值
        'ACTION_NAME'        =>'action_name',         // menu 表中存的方法名 列值
    );

    public function __construct() {
        if (config('AUTH_CONFIG')) {
            //可设置配置项 AUTH_CONFIG, 此配置项为数组。
            $this->_config = array_merge($this->_config, config('auth')); // 请新扩展auth配置文件
        }
    }


    public function check($name, $uid, $type=1, $mode='url', $relation='or') {
        $menu_id = $this->getMenuId($name);
        $group_id = $this->getGroups($uid);//获取用户组的id
        $auth_group = Db::name($this->_config['AUTH_GROUP'])->find($group_id);
        $auth_group['rules'] = rtrim($auth_group['rules'],',');
        $auth_group['rules'] = explode(',',$auth_group['rules']);

        if(in_array($menu_id,$auth_group['rules'])){
            return true;
        }else{
            return false;
        }
    }
    //获取用户的组 id
    public function getGroups($uid) {
        $group = Db::name($this->_config['AUTH_GROUP_ACCESS'])->where(['uid'=>$uid])->field(true)->find();
        return $group['group_id'];
    }

    //根据传过来的name 去获取 权限规则表中的值  即 menu表中的id
    protected  function getMenuId($name){
        $str = explode('/',$name);
        $menu_id = Db::name($this->_config['AUTH_RULE'])->where([$this->_config['MODEL_NAME']=>$str[0],$this->_config['ACTION_NAME']=>$str[1]])->find();
        return $menu_id['id'];
    }

    //扩展  根据用户所在的组 去获取用户该展现的菜单项
    protected  function getUserMenus($uid){
        static $userMenus= [];
        if(!$userMenus){
            $group_id = $this->getGroups($uid);
            $auth_group = Db::name($this->_config['AUTH_GROUP'])->find($group_id);
            $auth_group['rules'] = rtrim($auth_group['rules'],',');
            $auth_group['rules'] = explode(',',$auth_group['rules']);
            $userMenus = Db::name($this->_config['AUTH_RULE'])->where(['id'=>['in',$auth_group['rules']],'id_menu'=>1])->select();
        }
        return $userMenus;
    }

}