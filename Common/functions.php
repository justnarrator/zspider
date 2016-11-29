<?php
/**
 * Created by PhpStorm.
 * User: 张建东
 * Date: 2016/11/23
 * Time: 22:23
 */
    /**
     * 框架启动函数
     */
    function startSpider(){

        \LibSpider\zSpider::run();
    }

    function e(){
        exit;
    }

    function runStart(){
        $GLOBALS['startTime'] = microtime(TRUE);
    }

    function runTime(){
        if(DEBUG){
            echo "<br/>运行时间",round(microtime(TRUE)-$GLOBALS['startTime'],4),'s';
        }
    }

    /**
     * 输出当前网址的uri路径
     */
    function URI(){
        return $_SERVER['REQUEST_URI'];
    }

    /**
     * GET参数绑定，默认控制器和方法都有的情况下绑定
     */
    function bindGetPara(){
        $string = explode('/', URI());
        $count = sizeof($string);
        if($count > 3){
            if($string[3] != ''){
                for($i=3;$i<$count;$i+=2){
                    if($string[$i] == ''){
                        break;
                    }
                    $_GET[$string[$i]] = isset($string[$i+1]) ? $string[$i+1] : '';
                }
            }
        }
    } 