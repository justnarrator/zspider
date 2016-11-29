<?php
namespace LibSpider;

abstract class PController{
	protected $obj;

	public function __construct(){
		$this->obj = serialize($this);
	}

	public function __call($name,$arguments){

		#方法不存在时，将默认方法变为get参数
		if(sizeof($arguments) > 0){
			$arguments = implode(',',$arguments).'该方法参数为空';
		}else{
			$arguments = '该方法参数为空';
		}
		echo '[',$name,']方法不存在',PHP_EOL,$arguments;
	}

	public function __toString(){

		return $this->obj;
	}

	public static function __callStatic($name,$arguments){

		if(sizeof($arguments) > 0){
			$arguments = '参数：'.implode(',',$arguments);
		}else{
			$arguments = '该方法参数为空';
		}
		echo '[',$name,']静态方法不可访问',$arguments,PHP_EOL;
	}

	public function __destruct(){

		if(DEBUG){
			runTime();
		}
	}

}