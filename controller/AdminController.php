<?php
class AdminController extends Controller {

  public function __construct() {
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

    if(!isset($_SESSION['user_id'])) {
      header("Location: ../Users/login");
    }
  }

  function index() {
    $this->loadView("inc/admin/header");
    $this->loadView("inc/admin/sidebar");
    $this->loadView("Admin/dashboard");
    $this->loadView("inc/footer");
  }

  function dashboard_admin() {
    $this->loadView("inc/admin/header");
    $this->loadView("inc/admin/sidebar");
    $this->loadView("Admin/dashboard");
    $this->loadView("inc/footer");
  }
  
  function personal() {
    $get = $this->userModel->getAdmin();
    $data = [
      'admin' => $get
    ];
    $this->loadView("inc/admin/header");
    $this->loadView("inc/admin/sidebar");
    $this->loadView("Admin/personal", $data);
    $this->loadView("inc/footer");
  }

  function change_password() {
    $get = $this->userModel->getAdmin();
    $pass = $this->userModel->updatePassAdmin();
    $data = [
      'admin' => $get
    ];
    $this->loadView("inc/admin/header");
    $this->loadView("inc/admin/sidebar");
    $this->loadView("Admin/change_password", $data);
    $this->loadView("inc/footer");
  }

  function users_admin() {
    $tdelete = $this->userModel->tdelete(); 
    $adelete = $this->userModel->adelete(); 
    $hdelete = $this->userModel->hdelete(); 
    $users = $this->userModel->getAll();
    $add = $this->userModel->add();
    $update = $this->userModel->update('id');
    $data = [
      'user' => $users,
      'update' => $update
    ];
    $this->loadView("inc/admin/header");
    $this->loadView("inc/admin/sidebar");
    $this->loadView("Admin/users", $data);
    $this->loadView("inc/footer");
  }
  
    public function subjects_admin() {
    $delete = $this->subjectModel->delete(); 
    $subjects = $this->subjectModel->getAll();
    $add = $this->subjectModel->insert();
    $update = $this->subjectModel->update('id_subj');
    $data = [
      'subj' => $subjects
    ];
    $this->loadView("inc/admin/header");
    $this->loadView("inc/admin/sidebar");
    $this->loadView("Admin/subjects", $data);
    $this->loadView("inc/footer");
  }
  
  function classes_admin() {
    $add = $this->classesModel->add();
    $filter = $this->classesModel->filter();
    $delete = $this->classesModel->delete();
    $data = [
      'class' => $filter
    ];
    $this->loadView("inc/admin/header");
    $this->loadView("inc/admin/sidebar");
    $this->loadView("Admin/classes", $data);
    $this->loadView("inc/footer");
  }

  function class_details() {
    $delete = $this->studentModel->delete(); 
    $classes = $this->studentModel->getByClass($_GET["class"]);
    $add = $this->studentModel->add($_GET["class"]);
    $update = $this->studentModel->update("id");
    $data = [
      'class' => $classes
    ];
    $this->loadView("inc/admin/header");
    $this->loadView("inc/admin/sidebar");
    $this->loadView("Admin/class_details", $data);
    $this->loadView("inc/footer");
  }

  function timetable_admin() {
    $filter = $this->classesModel->filter();
    $data = [
      'filter' => $filter
    ];
    $this->loadView("inc/admin/header");
    $this->loadView("inc/admin/sidebar");
    $this->loadView("Admin/timetable", $data);
    $this->loadView("inc/footer");
  }

  function timetable_add() {
    $delete = $this->timetableModel->delete(); 
    $add = $this->timetableModel->add($_GET["class"]);
    $update = $this->timetableModel->update();
    $subj = $this->subjectModel->getSubjectsByClass($_GET["class"]);
    $lesson = $this->lessonsModel->getAll();
    $day = $this->daysModel->getAll();
    $get = $this->timetableModel->getForAdmin($_GET["class"]);
    $mon = $this->timetableModel->getForAdmin($_GET["class"]."  AND d.id_days=1");
    $tue = $this->timetableModel->getForAdmin($_GET["class"]."  AND d.id_days=2");
    $wed = $this->timetableModel->getForAdmin($_GET["class"]."  AND d.id_days=3");
    $thu = $this->timetableModel->getForAdmin($_GET["class"] ." AND d.id_days=4");
    $fri = $this->timetableModel->getForAdmin($_GET["class"] ." AND d.id_days=5");
    $data = [
      'timetable' => $get,
      'subj' => $subj,
      'lesson' =>$lesson,
      'day' =>$day,
      'mon' => $mon,
      'tue' => $tue,
      'wed' => $wed,
      'thu' => $thu,
      'fri' => $fri
    ];
    $this->loadView("inc/admin/header");
    $this->loadView("inc/admin/sidebar");
    $this->loadView("Admin/timetable_add", $data);
    $this->loadView("inc/footer");
  }

  function noticeboard_admin() {
    $delete = $this->noticeboardModel->delete();
    $get = $this->noticeboardModel->getAll(" ORDER BY date desc");
    $add = $this->noticeboardModel->addNotice();
    $data = [
      'notice' => $get
    ];
    $this->loadView("inc/admin/header");
    $this->loadView("inc/admin/sidebar");
    $this->loadView("Admin/noticeboard", $data);
    $this->loadView("inc/footer");
  }

  function noticeboard_details() {
    $get = $this->noticeboardModel->get($_GET['id']);
    $data = [
      'notice' => $get
    ];
    $this->loadView("inc/admin/header");
    $this->loadView("inc/admin/sidebar");
    $this->loadView("Admin/noticeboard_details", $data);
    $this->loadView("inc/footer");
   }

  function teachers_admin() {
    $teachers = $this->teacherModel->getAll();
    $data = [
      'teach' => $teachers
    ];
    $this->loadView("inc/admin/header");
    $this->loadView("inc/admin/sidebar");
    $this->loadView("Admin/teachers", $data);
    $this->loadView("inc/footer");
  }

  function teacher_classes() {
    $delete = $this->teacherSubjectClassModel->deleteClass(); 
    $get = $this->teacherSubjectClassModel->getClass($_GET["teacher"]);
    $add = $this->teacherSubjectClassModel->addClass($_GET["teacher"]);
    $class = $this->classesModel->getAll();
    $data = [
      'get' => $get,
      'class' => $class
    ];
    $this->loadView("inc/admin/header");
    $this->loadView("inc/admin/sidebar");
    $this->loadView("Admin/teacher_classes", $data);
    $this->loadView("inc/footer");
  }

  function teacher_subjects() {
    $delete = $this->teacherSubjectClassModel->deleteSubject(); 
    $get = $this->teacherSubjectClassModel->getSubjects($_GET["teacher"]);
    $add = $this->teacherSubjectClassModel->addSubject($_GET["teacher"]);
    $subject = $this->subjectModel->getAll();
    $data = [
      'get' => $get,
      'subject' => $subject
    ];
    $this->loadView("inc/admin/header");
    $this->loadView("inc/admin/sidebar");
    $this->loadView("Admin/teacher_subjects", $data);
    $this->loadView("inc/footer");
  }
}