<?php
namespace LibSpider;

abstract class PController{
	protected $obj;
	protected $orgs;

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

	protected function showView(){

		$function = debug_backtrace(0,2)[1]['function'];
		$num = func_num_args();
		$controller = get_class($this);
		switch ($num) {
			case 0:
				$tplDir = explode('C',explode('\\',$controller)[1])[0]; 
				$tpl    = $function.'.html';
				break;
			case 1:
				#判断/
			case 2:
				#是否缓存文件
		}
		$this->loadTpl($tplDir,$tpl);
	}

	protected function loadTpl($tplDir,$tpl){
		#模版赋值的两种方法
		$args = $this->args;
		#1.一种是开始想到的不好看的方法
		//  $name = array_keys($args)[0];
		//  $$name = $args[array_keys($args)[0]];
		//  if($name != 'name'){
		//  	unset($name);
		// }
		#2.extract函数
		extract($args);
		include_once(HOME.'View/'.$tplDir.'/'.$tpl);
	}

	public function zjd($name,$data){
		
		$this->args[$name] = $data;

	}

	public function __destruct(){

		if(DEBUG){
			runTime();
		}
	}

}