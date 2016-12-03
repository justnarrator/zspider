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
     * GET参数绑定
     * 支持路由模式:
     * 1.p/v/p/v
     * 2.p/v/p/v?p=v&p=v
     * 3.p/v/p/v/?p=v&p=v
     */
    function bindGetPara(){

        $quStr  = substr(URI(), strpos(URI(), '?')+1);
        $string = explode('/', str_replace('?'.$quStr,'', URI()));
        $count  = sizeof($string);
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
        $quStr = substr(URI(), strpos(URI(), '?')+1);
        $quArr = explode('&', $quStr);
        array_map('parseUri',$quArr);
    }

    /**
     * 解析路由
     */
    function parseUri($quStr){

        $partArr = explode('=',$quStr);
        $_GET[$partArr[0]] = $partArr[1];
    }

    function getView(){
        Twig_Autoloader::register();
        $loader = new Twig_Loader_Filesystem('path/to/templates');//视图文件夹
        $twig = new Twig_Environment($loader.array(
                'cache' => 'path/to/compilation_cache',
            ));
    } 