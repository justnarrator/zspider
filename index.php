<?php
/**
 * Created by PhpStorm.
 * User: 张建东
 * Date: 2016/11/22
 * Time: 22:20
 */

	#PHP版本控制
	$version  = (string)phpversion();
	$parseNum = $version[0].$version[2];
	if((int)$parseNum < 55){
    	die("请升级PHP版本");
	}

	#引入依赖扩展
    require 'vendor/autoload.php';//
    
	#定义常量
	define("ZSPIDER", realpath('./'));   //根目录
	define("HOME", ZSPIDER.'/App/');     //应用目录
	define("LIB", ZSPIDER.'/LibSpider/');//核心目录
	define("DEBUG", TRUE);               //开启调试

	#调试
	if(DEBUG){

		#引入依赖包
		$whoops = new \Whoops\Run;
		$whoops->pushhandler(new \Whoops\Handler\PrettyPageHandler);
		$whoops->register();

		ini_set('display_errors', 1);
	}else{
		ini_set('display_errors', 0);
	}

	#引入函数库
    include ZSPIDER.'/common/functions.php';

    #引入核心类
    include LIB.'/zSpider.php';

    #自动加载类
    spl_autoload_register('\LibSpider\zSpider::load');

    #计算启动时间
    runStart();
    
    #启动小框架
    startSpider();