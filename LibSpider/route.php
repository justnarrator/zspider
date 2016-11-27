<?php
/**
 * 路由类
 */

namespace LibSpider;

class route {
	public $routeMes = [];//路由信息

	public function __construct(){

		if(isset($_SERVER['REQUEST_URI'])) {
			$uriArray = explode('/',$_SERVER['REQUEST_URI']);
			$countUri = sizeof($uriArray);
			if($countUri >=2 && $uriArray[1] != ''){
				$this->routeMes['controller'] = 'index';
				if(!empty($uriArray[2])){
					$this->routeMes['method'] = $uriArray[2];
				}else{
					$this->routeMes['method'] = 'index';
				}
			}else{
				$this->routeMes['controller'] = 'index';
				$this->routeMes['method']     = 'index';
			}
        } else {
			$this->routeMes['controller'] = 'index';
        	$this->routeMes['method']     = 'index';
        }
	}

    /**
     * @return array
     */
	public function getRoute(){

		return $this->routeMes;
	}
}