<?php
namespace Controller;
use \LibSpider\PController;

class IndexController extends PController{

	public function __construct(){
		
		parent::__construct();

	}

	public function index(){

		dump( 'TODO:2.模型没做3.视图还差部分' );
		$ass = ['s','f'];
		$this->zjd('s',$ass);
		$this->showView();
	}

}