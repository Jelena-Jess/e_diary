<?php

abstract class Controller {
  public function loadView($view, $data=[], $params=array()) {
		foreach ($params as $k=>$param) {
      $this->$k = $param;
		}
    include_once "view/{$view}.php";
    //require_once "view/footer.php";
  }

  public function index() {
    echo "Podrazumevana strana";
	}
  
// Load model
public function model($model){
  // Require model file
  require_once 'model/' . $model . '.php';

  // Instantiate model
  return new $model();
  }
}
?>