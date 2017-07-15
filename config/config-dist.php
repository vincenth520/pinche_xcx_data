<?php 
return array(   
	//'配置项'=>'配置值'
	/*
    'URL_MODEL'             =>  1,
    'SHOW_PAGE_TRACE'       =>  true,*/

    /* 数据库设置 */
    'DB_TYPE'               =>  'mysqli',     // 数据库类型
    'DB_HOST'               =>  'localhost', // 服务器地址
    'DB_NAME'               =>  'xcx',          // 数据库名
    'DB_USER'               =>  'root',      // 用户名
    'DB_PWD'                =>  'root',          // 密码
    'DB_PORT'               =>  '3306',        // 端口
    'DB_PREFIX'             =>  'xcx_',    // 数据库表前缀
    'DB_PARAMS'          	=>  array(), // 数据库连接参数    
    'DB_DEBUG'  			=>  TRUE, // 数据库调试模式 开启后可以记录SQL日志
    'DB_FIELDS_CACHE'       =>  true,        // 启用字段缓存
    'DB_CHARSET'            =>  'utf8mb4',      // 数据库编码默认采用utf8
    'TMPL_PARSE_STRING' =>array(
        '__PUBLIC__' => __ROOT__.'/Public'
    ),

    /*模版引擎*/
    'TMPL_ENGINE_TYPE'      =>  'Smarty', 
		 'URL_MODEL' 		 => '2',
		 'TMPL_PARSE_STRING' => array(
		 '__PUBLIC__' 		 => __ROOT__.'/static',
		 '__UPLOAD__' 		 => __ROOT__.'/uploads'
 		 ),

 	'TMPL_FILE_DEPR' => '_',
    'TMPL_CACHE_ON'  => false,
    'HTML_CACHE_ON'  =>false
);