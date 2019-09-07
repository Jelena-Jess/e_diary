<?php

class MessageController extends Controller {

  public $id_user_login; 
  public function __construct() {
  $this->messageModel = $this->model('MessageModel');
  $this->id_user_login = $_SESSION['user_id'];
  }

 // show all users
  public function users() {
    $user_id_status = $_SESSION['user_status'];

      if($user_id_status == 3) {
        $users = $this->messageModel->getParents();
        foreach($users as $value)
        {
          echo "<p class='nav-item p-0 m-0 border-bottom'>";
          echo "<a class='nav-link p-2' onclick='read_all(".$value->id.")'>";
          echo $value->pname." ".$value->psurname . "</a>";
          echo "</p>";
        }
        return;

      } else if ($user_id_status == 4) {
        $users = $this->messageModel->getTeachers();
        if(!empty($users)){
        foreach($users as $value)
        {
          echo "<p class='nav-item p-0 m-0 border-bottom'>";
          echo "<a class='nav-link' onclick='read_all(".$value->id.")'>";
          echo $value->tname." ".$value->tsurname . "</a>";
          echo "</p>"; 
        }
        return;
      }else{
        echo "";
      }
    }
  }

  // show all messages
  public function read_all()
  {
  if($_SERVER['REQUEST_METHOD'] === "POST") {
    if(isset($_POST['id'])) {
      $user_id = $this->secure_input($_POST['id']);
        
      $messages = $this->messageModel->showMessage($this->id_user_login, $user_id);
      $arrayMessages = array();
      foreach ($messages as $value) { 
        if($value->recieverId === $_SESSION['user_id']){
          echo "<p class='speech-bubble-recipient text-left sender text-left'>" .$value->body. "</p>";
          } else {
          $this->messageModel->new_status_Message($value->id); 
          echo "<p class='speech-bubble text-left reciever text-right'>".$value->body."</p>";
          }
        }
      }
    }
    return;
  }

  // Read new messages in real time
  public function read_new() {
    
  if($_SERVER['REQUEST_METHOD'] === "POST") {
    if(isset($_POST['id'])) {
      $reciverId = $_POST['id'];
      $sender = $_SESSION['user_id'];
      $messages = $this->messageModel->read_new_Message($sender, $reciverId);

      foreach ($messages as $value)
      { 
        $this->messageModel->new_status_Message($value->id); 
        echo "<p class='speech-bubble text-left sender text-left'>".$value->body."</p>";
      }
      return;
    }
  }
  }

  // Add a new message
  public function new_message() {
    if($_SERVER['REQUEST_METHOD'] === "POST") {
      if(isset($_POST['id']) && isset($_POST['message'])) {
        $user_id = $this->secure_input($_POST['id']);
        $message = $this->secure_input($_POST['message']);

        echo "<p class='speech-bubble text-left reciever text-right'>$message</p>"; 
        $this->messageModel->addMessage($this->id_user_login,$user_id,$message);
        return; 
      }
    }
  }

  private function secure_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
}