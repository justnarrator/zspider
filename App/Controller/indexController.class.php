<?php
namespace Controller;

class IndexController {

	public function __construct(){

	}

	public function index(){
		echo '默认方法执行成功';
		echo "<br/>";
		echo 'TODO:1.get参数没有绑定2.模型没做3.视图没做4.linux和windows系统路径没有兼容5.控制器父类没有写';
	}

	public function __call($name,$arguments){
		if(sizeof($arguments) > 0){
			$arguments = implode(',',$arguments).'该方法参数为空';
		}else{
			$arguments = '该方法参数为空';
		}
		echo '[',$name,']方法不存在',"<br/>",$arguments;
	}
}