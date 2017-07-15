<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2014 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用入口文件


// 检测PHP环境

if(version_compare(PHP_VERSION,'5.3.0','<')) die('require PHP > 5.3.0 !');

  

// 网站文件入口位置

define('ABSPATH', dirname(__FILE__));

  

// 定义应用目录

define('APP_NAME', 'Apps');

define('APP_PATH','./Apps/');

define('CONF_PATH', ABSPATH . '/config/');

define('RUNTIME_PATH', ABSPATH . '/cache/');

define('TMPL_PATH', ABSPATH . '/templates/');

define('UPLOAD_PATH', ABSPATH . '/uploads/');

define('SESSION_TYPE','Db');

define('THINK_PATH', ABSPATH . '/include/ThinkPHP/');

  

// 开启调试模式

define('APP_DEBUG',True);

  

// 引入ThinkPHP入口文件

require THINK_PATH . 'ThinkPHP.php';