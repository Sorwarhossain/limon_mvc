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

	// Prepare Statement with query
	public function query($sql){
		$this->stmt = $this->dbh->prepare($sql);
	}

	// Bind the values
	public function bind($param, $value, $type = null){
		if(is_null($type)){
			switch(true){
				case is_int($value) :
					$type = PDO::PARAM_INT;
					break;
				case is_bool($value) :
					$type = PDO::PARAM_BOOL;
					break;
				case is_null($value) :
					$type = PDO::PARAM_NULL;
					break;
				default :
					$type = PDO::PARAM_STR;
			}
		}

		$this->stmt->bindValue($param, $value, $type);
	}


	// Execute the prepared statement
	public function execute(){
		return $this->stmt->execute();
	}


	// Get result set as array of object
	public function resultSet(){
		$this->execute();
		return $this->stmt->fetchAll(PDO::FETCH_OBJ);
	}


	// Get single result
	public function single(){
		$this->execute();
		return $this->stmt->fetch(PDO::FETCH_OBJ);
	}

	//Get row count
	public function rowCount(){
		return $this->stmt->rowCount();
	}


}