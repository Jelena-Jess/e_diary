<?php

class UserModel {

private $conn;

public function __construct() {
    $this->conn = new Database;
}

public function login($username, $password) {
    $this->conn->query("SELECT id, name, surname, '' AS jmbg, '' AS pname, '' AS psurname, username, password, '' AS class, status_id_status FROM admin WHERE username = :username 
    UNION 
    SELECT id, tname, tsurname, '' AS jmbg, '' AS pname, '' AS psurname, username, password, '' AS class, status_id_status FROM teachers WHERE username = :username 
    UNION 
    SELECT id, name, surname, '' AS jmbg, '' AS pname, '' AS psurname, username, password, '' AS class, status_id_status FROM headmaster WHERE username = :username 
    UNION 
    SELECT * FROM students WHERE username = :username");
    $this->conn->bind(':username', $username);

    $row = $this->conn->single();

    $stored_password = $row->password;
    if($password == $stored_password) {
        return $row;
    } else {
        return false;
    }
}

public function findUserByUsername($username) {
    $this->conn->query("SELECT username FROM admin WHERE username = :username 
    UNION 
    SELECT username FROM teachers WHERE username = :username 
    UNION 
    SELECT username FROM headmaster WHERE username = :username 
    UNION 
    SELECT username FROM students WHERE username = :username");
    $this->conn->bind(':username', $username);

    $row = $this->conn->single();

    //check row
    if($this->conn->rowCount() > 0) {
        return true;
    } else {
        return false;
    }
}

public function getAll() {
    if(isset($_POST['displayRole'])) {
        $table = $_POST['status_display'];
        switch($table) {
            case 'admin':
                $table = 'admin';
                break;
            case 'headmaster':
                $table = 'headmaster';
                break;
            case 'teacher':
                $table = 'teachers';
                break;
        }

        $this->conn->query("SELECT * FROM {$table}");
        $results = $this->conn->resultset();
        if($results) {
            return $results;
            header("Location: users_admin");
        }else {
            return false;
        }
    }
}

public function getAdmin() {
    $this->conn->query("SELECT * FROM admin
    where id =". $_SESSION['user_id']);
        $results = $this->conn->resultset();
        if($results) {
            return $results;
        }else {
            return false;
        }
    }

    public function updatePassAdmin() {
        if(isset($_POST['submit']) && !empty($_POST['current_pass']) && !empty($_POST['new_pass']) && !empty($_POST['new_pass_check'])) {
            $current_pass = hash("md5", $_POST['current_pass']);
            $new_pass = hash("md5", $_POST['new_pass']);
            $new_pass_check = hash("md5", $_POST['new_pass_check']);

            $this->conn->query('SELECT `password` FROM `admin`
            WHERE `id`='.$_SESSION['user_id']);
            $results = $this->conn->resultset();
            $current_pass_db = $results[0]->{'password'};

            if($current_pass == $current_pass_db) {
                if($new_pass == $new_pass_check){
                    $this->conn->query("UPDATE `admin`
                    SET `password`=:new_pass WHERE `id`=".$_SESSION['user_id']);

                    $this->conn->bind(':new_pass', hash("md5", $_POST['new_pass']));

                    if($this->conn->execute()) {
                    header("Location:personal");
                    exit;
                    } else {
                    return false;
                    }
                }
            }
          }
      }


    public function getHeadmaster() {
        $this->conn->query("SELECT * FROM headmaster
        where id =". $_SESSION['user_id']);
                $results = $this->conn->resultset();
                if($results) {
                        return $results;
                }else {
                        return false;
                }
        }

    public function updatePassHead() {
        if(isset($_POST['submit']) && !empty($_POST['current_pass']) && !empty($_POST['new_pass']) && !empty($_POST['new_pass_check'])) {
            $current_pass = hash("md5", $_POST['current_pass']);
            $new_pass = hash("md5", $_POST['new_pass']);
            $new_pass_check = hash("md5", $_POST['new_pass_check']);
    
                $this->conn->query('SELECT password FROM headmaster
                WHERE id='.$_SESSION['user_id']);
                $results = $this->conn->resultset();
                $current_pass_db = $results[0]->{'password'};
    
    
                if($current_pass == $current_pass_db) {
                    if($new_pass == $new_pass_check){
                        $this->conn->query("UPDATE headmaster
                         SET `password`=:new_pass WHERE `id`=".$_SESSION['user_id']);

                        $this->conn->bind(':new_pass', hash("md5", $_POST['new_pass']));

                        if($this->conn->execute()) {
                            header("Location:personal");
                            exit;
                            } else {
                            return false;
                            }
                        }
                    }
            }
        }

    public function add(){
        if(isset($_POST['submit']) && !empty($_POST['name']) && !empty($_POST['surname']) && !empty($_POST['username']) && !empty($_POST['password']) && !is_numeric($_POST['name']) && !is_numeric($_POST['surname']) && !is_numeric($_POST['username'])) {
            $table = $_POST['status'];
            $status_id = '';
            switch($table) {
                case 'admin':
                    //$table 		= 'admin';
                    $status_id 	= 1;
                    $this->conn->query("INSERT INTO admin (name, surname, username, password, status_id_status) VALUES (:name, :surname, :username, :password, :status_id_status)");
                    break;
                case 'headmaster':
                    //$table 		= 'headmaster';
                    $status_id 	= 2;
                    $this->conn->query("INSERT INTO headmaster (name, surname, username, password, status_id_status) VALUES (:name, :surname, :username, :password, :status_id_status)");
                    break;
                case 'teacher':
                    $status_id 	= 3;
                    $this->conn->query("INSERT INTO teachers (tname, tsurname, username, password, status_id_status) VALUES (:name, :surname, :username, :password, :status_id_status)");
                    break;
            }

                $this->conn->bind(':name', trim(htmlspecialchars($_POST['name'])));
                $this->conn->bind(':surname', trim(htmlspecialchars($_POST['surname'])));
                $this->conn->bind(':username', trim(htmlspecialchars($_POST['username'])));
                $this->conn->bind(':password', hash("md5", $_POST['password']));
                $this->conn->bind(':status_id_status', $status_id);

                if($this->conn->execute()) {
                    header("Location: users_admin");
                    return true;

                } else {
                    return false;
                }
            }
        }

    public function update($id){
        if(isset($_POST['update']) && !empty($_POST['name']) && !empty($_POST['surname']) && !empty($_POST['username']) && !empty($_POST['password']) && !is_numeric($_POST['name']) && !is_numeric($_POST['surname']) && !is_numeric($_POST['username'])) {
            $id = $_POST['id'];
            $table = $_POST['status'];
            $status_id = '';
            switch($table) {
                case 'admin':
                    //$table 		= 'admin';
                    $status_id 	= 1;
                    $this->conn->query('UPDATE admin SET name=:name, surname=:surname, username=:username, password=:password, status_id_status=1 WHERE id=:id');
                    break;
                case 'headmaster':
                    //$table 		= 'headmaster';
                    $status_id 	= 2;
                    $this->conn->query('UPDATE headmaster SET name=:name, surname=:surname, username=:username, password=:password, status_id_status=2 WHERE id=:id');
                    break;
                case 'teacher':
                    $status_id 	= 3;
                    $this->conn->query('UPDATE teachers SET tname=:name, tsurname=:surname, username=:username, password=:password, status_id_status=3 WHERE id=:id');
                    break;
            }
                $this->conn->bind(':id', $_POST['id']);
                $this->conn->bind(':name', trim(htmlspecialchars($_POST['name'])));
                $this->conn->bind(':surname', trim(htmlspecialchars($_POST['surname'])));
                $this->conn->bind(':username', trim(htmlspecialchars($_POST['username'])));
                $this->conn->bind(':password', hash("md5", $_POST['password']));
                //$this->conn->bind(':status_id_status', $_POST['status_id_status']);
                if($this->conn->execute()) {
                    return true;
                } else {
                    return false;
                }
            }
        }


    public function adelete() {
        if(isset($_POST['delete'])) {
            $id = $_POST['id'];
            $this->conn ->query("delete from admin where id = :id");
            $this->conn->bind(':id', $id);
            $results = $this->conn->execute();
            if(!$results){
                echo "\nPDOStatement::errorInfo():\n";
                $arr = $st->errorInfo();
                print_r($arr);
            }
        }
    }

    public function hdelete() {
        if(isset($_POST['delete'])) {
            $id = $_POST['id'];
            $this->conn ->query("delete from headmaster where id = {$id}");
            $results = $this->conn->execute();
            if(!$results){
                echo "\nPDOStatement::errorInfo():\n";
                $arr = $st->errorInfo();
                print_r($arr);
            }
        }
    }

    public function tdelete() {
        if(isset($_POST['delete'])) {
            $id = $_POST['id'];
            $this->conn ->query("delete from teachers where id = {$id}");
            $results = $this->conn->execute();
            if(!$results){
                echo "\nPDOStatement::errorInfo():\n";
                $arr = $st->errorInfo();
                print_r($arr);
            }
        }
    }
}