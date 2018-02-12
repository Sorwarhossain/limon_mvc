<?php 
/*
* Base Controller
* This load models and views
*/

class Controller {
	// Load model
	public function model($model){
		// require the file
		require_once '../app/models/' . $model .'.php';

		// Instantiate the model
		return new $model;
	}

	// Loca view
	public function view($view, $data = []){
		// check for the view file
		if(file_exists('../app/views/'. $view .'.php')){
			require_once '../app/views/'. $view .'.php';
		} else {
			die('view does not exists');
		}
	}


}