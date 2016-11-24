<?php
/**
 * Created by PhpStorm.
 * User: 张建东
 * Date: 2016/11/23
 * Time: 22:23
 */
    defined('DEBUG') 	or define('DEBUG',false); //  是否调试模式
    define('CPATH', '../Controller/'); //定义控制器目录
    define('MPATH', '../Model/');      //定义模型目录
    define('PPATH', '../Public/');     //定义静态文件目录
    define('VPATH', '../View/');       //定义视图文件目录
    define('EPATH', '../Extends');     //定义扩展类目录
    routeSpider();
/**
 * 路由函数
 */
    function routeSpider(){
        $routePath  = empty($_SERVER['PATH_INFO']) ? $_SERVER['REQUEST_URI'] : $_SERVER['PATH_INFO'];
        $pathArr    = array_filter(explode('/', $routePath));
        $controller = empty($pathArr[1]) ? 'index' : $pathArr[1];
        $method     = empty($pathArr[2]) ? 'index' : $pathArr[2];
        sendRequest($controller,$method);
    }

/**
 * @param string $controller 控制器
 * @param string $method     方法
 */
    function sendRequest($controller = '',$method = ''){
        $checkRes = checkController($controller);
        if($checkRes === FALSE){
            showError("控制器不存在");
        }
    }

/**
 * @param $errorMes
 * @param int $errReturn
 */
    function showError($errorMes,$errReturn = 0){
        if($errReturn === 0){
            die($errorMes);
        }elseif ($errReturn === 1){//写入错误日志
            #日志。错误时间，请求的路由，请求的ip
        }

    }

/**
 * @param string $controller
 * @return bool
 */
    function checkController($controller = ''){
        if($controller !== ''){
            $cFile = CPATH.$controller.'Controller.class.php';
            if(is_file($cFile)){
                return TRUE;
            }
            return FALSE;
        }
        return FALSE;
    }