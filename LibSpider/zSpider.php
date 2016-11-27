<?php
/**
 * Created by PhpStorm.
 * User: 张建东
 * Date: 2016/11/23
 * Time: 22:23
 */
namespace LibSpider;

class zSpider {

    /**
     * 框架运行
     */
    public static function run(){

        $route      = new route();
        $routeMes   = $route->getRoute();
        $controller = $routeMes['controller'];
        $method     = $routeMes['method'];
        $filePath = str_replace('/','\\' , HOME.'/Controller/'.$controller.'Controller.class.php');
        if(is_file($filePath)){
            include $filePath;
            $controllerClass = "\Controller\\".$controller.'Controller';
            $controllerObj   = new $controllerClass();
            if(is_callable([$controllerObj, $method])){
                $controllerObj ->$method();
            }else{
                die('控制器方法不可用');
            }
        }else{
            die('非法请求控制器');
        }

    }

    /**
     * @param $class
     * @return bool
     */
    public static function load($class){

            $file = ZSPIDER.'\\'.$class.'.php';
            if(is_file($file)){
                include $file;
            }else{
                return FALSE;
            }
    }
}
    

    