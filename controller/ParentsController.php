<?php

class ParentsController extends Controller {

  public function __construct() {
    $this->userModel = $this->model('UserModel');
    $this->subjectModel = $this->model('SubjectModel');
    $this->classesModel = $this->model('ClassesModel');
    $this->teacherSubjectClassModel = $this->model('TeacherSubjectClassModel');
    $this->studentModel = $this->model('StudentModel');
    $this->timetableModel = $this->model('TimetableModel');
    $this->noticeboardModel = $this->model('NoticeboardModel');
    $this->daysModel = $this->model('DaysModel');
    $this->lessonsModel = $this->model('LessonsModel');
    $this->messageModel = $this->model('MessageModel');
    $this->opendoorModel = $this->model('OpendoorModel');
    $this->gradesModel = $this->model('GradesModel');

    if(!isset($_SESSION['user_id'])) {
      header("Location: ../Users/login");
    }
  }

  function index() {
    $get = $this->studentModel->getParent();
    $data = [
      'par' => $get
    ];
    $this->loadView("inc/parent/header");
    $this->loadView("inc/parent/sidebar");
    $this->loadView("Parents/dashboard_parent", $data);
    $this->loadView("inc/footer");
  }

  function personal() {
    $get = $this->studentModel->getParent();
    $data = [
      'parent' => $get
    ];
    $this->loadView("inc/parent/header");
    $this->loadView("inc/parent/sidebar");
    $this->loadView("Parents/personal", $data);
    $this->loadView("inc/footer");
  }

  function change_password() {
    $get = $this->studentModel->getParent();
    $pass = $this->studentModel->updatePass();
    $data = [
      'parent' => $get
    ];
    $this->loadView("inc/parent/header");
    $this->loadView("inc/parent/sidebar");
    $this->loadView("Parents/change_password", $data);
    $this->loadView("inc/footer");
  }


  function messages() {
    $this->loadView("inc/parent/header");
    $this->loadView("inc/parent/sidebar");
    $this->loadView("Parents/messages");
    $this->loadView("inc/footer");
  }

   function msg_contacts() {
    $this->loadView("inc/parent/header");
    $this->loadView("inc/parent/sidebar");
    $this->loadView("Parents/msg_contacts");
    $this->loadView("inc/footer");
  }

  function subjects_parent() {
    $get = $this->gradesModel->getById("st.id =".$_SESSION['user_id']);
    $data = [
      'grade' => $get
    ];
    $this->loadView("inc/parent/header");
    $this->loadView("inc/parent/sidebar");
    $this->loadView("Parents/subjects_parent", $data);
    $this->loadView("inc/footer");
  }
  
  function opendoor_parent() {
    $this->loadView("inc/parent/header");
    $this->loadView("inc/parent/sidebar");
    $this->loadView("Parents/opendoor_parent");
    $this->loadView("inc/footer");
  }

  function opendoor_timeslots() {
    $get = $this->opendoorModel->getSlotsForParents($_SESSION['user_id']);
    $data = [
      'opendoor' => $get
    ];
    $this->loadView("inc/parent/header");
    $this->loadView("inc/parent/sidebar");
    $this->loadView("Parents/opendoor_timeslots", $data);
    $this->loadView("inc/footer");
  }

  function opendoor_responses() {
    $get = $this->opendoorModel->getResponsesForParents($_SESSION['user_id']);
    $remove = $this->opendoorModel->remove_response();
    $data = [
      'opendoor' => $get
    ];
    $this->loadView("inc/parent/header");
    $this->loadView("inc/parent/sidebar");
    $this->loadView("Parents/opendoor_responses", $data);
    $this->loadView("inc/footer");
  }

  function noticeboard_parent() {
    $get = $this->noticeboardModel->getAll(" ORDER BY date desc");
    $data = [
      'notice' => $get
    ];
    $this->loadView("inc/parent/header");
    $this->loadView("inc/parent/sidebar");
    $this->loadView("Parents/noticeboard_parent", $data);
    $this->loadView("inc/footer");
  }

  function noticeboard_details() {
    $get = $this->noticeboardModel->get($_GET['id']);
    $data = [
      'notice' => $get
    ];
      $this->loadView("inc/parent/header");
      $this->loadView("inc/parent/sidebar");
     $this->loadView("Parents/noticeboard_details", $data);
     $this->loadView("inc/footer");
   }

   function timetable() {
    $get = $this->timetableModel->getForStudents("");
    $mon = $this->timetableModel->getForStudents(" AND d.id_days=1");
    $tue = $this->timetableModel->getForStudents(" AND d.id_days=2");
    $wed = $this->timetableModel->getForStudents(" AND d.id_days=3");
    $thu = $this->timetableModel->getForStudents(" AND d.id_days=4");
    $fri = $this->timetableModel->getForStudents(" AND d.id_days=5");
    $data = [
      'timetable' => $get,
      'mon' => $mon,
      'tue' => $tue,
      'wed' => $wed,
      'thu' => $thu,
      'fri' => $fri
    ];
    $this->loadView("inc/parent/header");
    $this->loadView("inc/parent/sidebar");
    $this->loadView("Parents/timetable", $data);
    $this->loadView("inc/footer");
  }
  
}