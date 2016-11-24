<?php
/**
 * Created by PhpStorm.
 * User: 张建东
 * Date: 2016/11/22
 * Time: 22:20
 */
$version = (string)phpversion();
$parseNum = $version[0].$version[2];
if((int)$parseNum < 55){
    die("请升级PHP版本");
}
define("DEBUG",TRUE);//开启调试模式