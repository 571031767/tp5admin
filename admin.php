<?php
// 定义项目路径
define('APP_PATH', __DIR__ . '/application/');
// 加载框架基础文件
require __DIR__ . '/thinkphp/base.php';
// 绑定当前入口文件到admin模块
\think\Route::bind('admin');
// 关闭admin模块的路由
\think\App::route(false);
\think\Url::root('/admin.php?s=');
// 执行应用
\think\App::run()->send();
