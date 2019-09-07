<?php

    class AjaxController  extends Controller{
	
		private $conn;

            public function __construct() {
                $this->conn = new Database();
            }
                


       public function ajaxs() {
        if($_SERVER['REQUEST_METHOD']=='GET') {
            if(isset($_GET['id'])) {
                $id = $_GET['id'];
                $this->conn->query('INSERT INTO opendoor SET id_tos='.$id.', id_parent ='. $_SESSION['user_id']);
                if($this->conn->execute()) {
                    header("Location:opendoor_timeslots");
                    exit;
                    } else {
                    return false;
                    }
               }
        }
    }  
}

