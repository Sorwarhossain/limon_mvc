<?php 
/*
* Pages Class
*/
class Pages extends Controller{
	public function __construct(){
		//echo 'Pages controller loaded';
	}

	public function index(){
		$this->view('pages/index', ['title' => 'Welcome to MVC Framework']);
	}

	public function about(){
		$this->view('pages/about');
	}
}