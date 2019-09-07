<?php

class TeacherController extends Controller {

  public function __construct() {
    $this->messageModel = $this->model('MessageModel');
    $this->userModel = $this->model('UserModel');
    $this->subjectModel = $this->model('SubjectModel');
    $this->classesModel = $this->model('ClassesModel');
    $this->teacherModel = $this->model('TeacherModel');
    $this->teacherSubjectClassModel = $this->model('TeacherSubjectClassModel');
    $this->studentModel = $this->model('StudentModel');
    $this->timetableModel = $this->model('TimetableModel');
    $this->noticeboardModel = $this->model('NoticeboardModel');
    $this->daysModel = $this->model('DaysModel');
    $this->lessonsModel = $this->model('LessonsModel');
    $this->gradesModel = $this->model('GradesModel');
    $this->opendoorModel = $this->model('OpendoorModel');
    $this->hoursModel = $this->model('HoursModel');
    $this->minutesModel = $this->model('MinutesModel');
    $this->periodModel = $this->model('PeriodModel');

    if(!isset($_SESSION['user_id'])) {
      header("Location: ../Users/login");
    }
  }

  function index() {
    $get = $this->teacherModel->getAll(" where id =". $_SESSION['user_id']);
    $data = [
      'teach' => $get
    ];
    $this->loadView("inc/teacher/header");
    $this->loadView("inc/teacher/sidebar");
    $this->loadView("Teacher/teachers_dashboard", $data);
    $this->loadView("inc/footer");
  }
  
  function personal() {
    $get = $this->teacherModel->getAll(" where id =". $_SESSION['user_id']);
    $data = [
      'teacher' => $get
    ];
    $this->loadView("inc/teacher/header");
    $this->loadView("inc/teacher/sidebar");
    $this->loadView("Teacher/personal", $data);
    $this->loadView("inc/footer");
  }

  function change_password() {
    $get = $this->teacherModel->getAll(" where id =". $_SESSION['user_id']);
    $pass = $this->teacherModel->updatePass();
    $data = [
      'teach' => $get
    ];
    $this->loadView("inc/teacher/header");
    $this->loadView("inc/teacher/sidebar");
    $this->loadView("Teacher/change_password", $data);
    $this->loadView("inc/footer");
  }

  function teachers_class() {
    $get = $this->teacherSubjectClassModel->getClass($_SESSION['user_id']);
    $data = [
      'class' => $get
    ];
    $this->loadView("inc/teacher/header");
    $this->loadView("inc/teacher/sidebar");
    $this->loadView("Teacher/teachers_class", $data);
    $this->loadView("inc/footer");
  }

  function messages() {
    $this->loadView("inc/teacher/header");
    $this->loadView("inc/teacher/sidebar");
    $this->loadView("Teacher/messages");
    $this->loadView("inc/footer");
  }

  function teachers_timetable() {
    $get = $this->timetableModel->getForTeachers("");
    $mon = $this->timetableModel->getForTeachers(" AND d.id_days=1");
    $tue = $this->timetableModel->getForTeachers(" AND d.id_days=2");
    $wed = $this->timetableModel->getForTeachers(" AND d.id_days=3");
    $thu = $this->timetableModel->getForTeachers(" AND d.id_days=4");
    $fri = $this->timetableModel->getForTeachers(" AND d.id_days=5");
    $data = [
      'timetable' => $get,
      'mon' => $mon,
      'tue' => $tue,
      'wed' => $wed,
      'thu' => $thu,
      'fri' => $fri
    ];
    $this->loadView("inc/teacher/header");
    $this->loadView("inc/teacher/sidebar");
    $this->loadView("Teacher/teachers_timetable", $data);
    $this->loadView("inc/footer");
  }

  function classes() {
    $get = $this->studentModel->getByClass($_GET["class"]);
    $data = [
      'class' => $get
    ];
    $this->loadView("inc/teacher/header");
    $this->loadView("inc/teacher/sidebar");
    $this->loadView("Teacher/classes", $data);
    $this->loadView("inc/footer");
  }

  function grades() {
    $delete = $this->gradesModel->delete();
    $get = $this->gradesModel->getById("t.id = ".$_SESSION['user_id']." AND id_student =".$_GET["student"]);
    $update = $this->gradesModel-> update('id_g');
    $add = $this->gradesModel->add($_GET["student"]);
    $subjects = $this->teacherSubjectClassModel->getSubjects($_SESSION['user_id']);
    $data = [
      'grades' => $get,
      'subj' => $subjects
    ];
    $this->loadView("inc/teacher/header");
    $this->loadView("inc/teacher/sidebar");
    $this->loadView("Teacher/grades", $data);
    $this->loadView("inc/footer");
  }

  function teachers_opendoor() {
    $this->loadView("inc/teacher/header");
    $this->loadView("inc/teacher/sidebar");
    $this->loadView("Teacher/teachers_opendoor");
    $this->loadView("inc/footer");
  }

  function timeslots() {
    $delete = $this->opendoorModel->deleteSlot();
    $get = $this->opendoorModel->getSlots();
    $add = $this->opendoorModel->addSlot();
    $day = $this->daysModel->getAll();
    $hour = $this->hoursModel->getAll();
    $minutes = $this->minutesModel->getAll();
    $period = $this->periodModel->getAll();
    $data = [
      'opendoor' => $get,
      'day' => $day,
      'hour' => $hour,
      'minutes' => $minutes,
      'period' => $period
    ];
    $this->loadView("inc/teacher/header");
    $this->loadView("inc/teacher/sidebar");
    $this->loadView("Teacher/timeslots", $data);
    $this->loadView("inc/footer");
  }

  function requests() {
    $get = $this->opendoorModel->getResponses();
    $accept = $this->opendoorModel->teacherAccept();
    $remove = $this->opendoorModel->remove_opendoor();
    $data = [
      'opendoor' => $get
    ];
    $this->loadView("inc/teacher/header");
    $this->loadView("inc/teacher/sidebar");
    $this->loadView("Teacher/requests", $data);
    $this->loadView("inc/footer");
  }

}