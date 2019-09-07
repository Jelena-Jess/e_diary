<?php

class HeadmasterController extends Controller {
  
  public function __construct() {
    $this->classesModel = $this->model('ClassesModel');
    $this->gradesModel = $this->model('GradesModel');
    $this->userModel = $this->model('UserModel');

    if(!isset($_SESSION['user_id'])) {
      header("Location: ../Users/login");
    }
  }
  
  function index() {
    $this->loadView("inc/headmaster/header");
    $this->loadView("inc/headmaster/sidebar");
    $this->loadView("Headmaster/headmaster_dashboard");
    $this->loadView("inc/footer");
  }
   
  function personal() {
    $get = $this->userModel->getHeadmaster();
    $data = [
      'head' => $get
    ];
    $this->loadView("inc/headmaster/header");
    $this->loadView("inc/headmaster/sidebar");
    $this->loadView("Headmaster/personal", $data);
    $this->loadView("inc/footer");
  }
  function change_password() {
    $get = $this->userModel->getHeadmaster();
    $pass = $this->userModel->updatePassHead();
    $data = [
      'head' => $get
    ];
    $this->loadView("inc/headmaster/header");
    $this->loadView("inc/headmaster/sidebar");
    $this->loadView("Headmaster/change_password", $data);
    $this->loadView("inc/footer");
  }
  function classes_statistics() {
    $get = $this->gradesModel->getByClass($_GET["class"]);
    $data = [
      'gr' => $get
    ];
    $this->loadView("inc/headmaster/header");
    $this->loadView("inc/headmaster/sidebar");
    $this->loadView("Headmaster/classes_statistics", $data);
    $this->loadView("inc/footer");
  }
  function school_statistics() {
    $get = $this->gradesModel->getBySchool();
    $data = [
      'grades' => $get
    ];
    $this->loadView("inc/headmaster/header");
    $this->loadView("inc/headmaster/sidebar");
    $this->loadView("Headmaster/school_statistics", $data);
    $this->loadView("inc/footer");
  }
  function classes() {
    $filter = $this->classesModel->filter();
    $data = [
      'class' => $filter
    ];
    $this->loadView("inc/headmaster/header");
    $this->loadView("inc/headmaster/sidebar");
    $this->loadView("Headmaster/classes", $data);
    $this->loadView("inc/footer");
  }
}