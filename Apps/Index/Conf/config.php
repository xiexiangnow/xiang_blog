<?php
return array(
	//'配置项'=>'配置值'        		
	'URL_CASE_INSENSITIVE'=>true,


    /*路由*/
    'URL_ROUTER_ON'   => true, //开启路由
    'URL_ROUTE_RULES' => array(//定义路由规则

        '/^news\/(\d+)\-*(\d*)$/'=>'News/lis?nv=:1&mu=:2',
        '/^show\/(\d+)$/'=>'News/show?id=:1',

    ),




    /* 模板相关配置 */
    'TMPL_PARSE_STRING' => array(
        '__JS__'    => __ROOT__ . '/Public/' . MODULE_NAME .'/js',
        '__CSS__'    => __ROOT__ . '/Public/' . MODULE_NAME .'/css',
        '__IMG__'    => __ROOT__ . '/Public/' . MODULE_NAME .'/img',
    ),



//
//    'HTML_CACHE_ON'     =>    true, // 开启静态缓存
//    'HTML_CACHE_TIME'   =>    60,   // 全局静态缓存有效期（秒）
//    'HTML_FILE_SUFFIX'  =>    '.html', // 设置静态缓存文件后缀
//    'HTML_CACHE_RULES'  =>     array(  // 定义静态缓存规则     // 定义格式1 数组方式
//     'Index:index'    =>     array('index', '43200'),
//    )










);