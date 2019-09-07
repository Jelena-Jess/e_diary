<?php
class StudentModel {


	private $conn;

	public function __construct() {
		$this->conn = new Database();
	}

public function getByClass($filter) {
		$this->conn->query("SELECT 
              *
							FROM 
							students 
							JOIN classes ON students.class = classes.id_cl
							WHERE classes.id_cl =" . $filter
							);
		$results = $this->conn->resultset();
		return $results;
	}
	
	public function getParent() {
		$this->conn->query("SELECT * FROM students
		where id =". $_SESSION['user_id']);
						$results = $this->conn->resultset();
						if($results) {
										return $results;
						}else {
										return false;
						}
		}

public function update($id) {
  if(isset($_POST['update']) && !empty($_POST['name']) && !empty($_POST['surname']) && !empty($_POST['jmbg']) && !empty($_POST['pname']) && !empty($_POST['psurname']) && !empty($_POST['username']) && !empty($_POST['password'])){
    $id = $_POST['id'];
    $this->conn->query('UPDATE students
    SET name=:name, surname=:surname, jmbg=:jmbg, pname=:pname, psurname=:psurname, username=:username, password=:password WHERE id=:id');
    $this->conn->bind(':id', $_POST['id']);
    $this->conn->bind(':name', trim(htmlspecialchars($_POST['name'])));
    $this->conn->bind(':surname', trim(htmlspecialchars($_POST['surname'])));
    $this->conn->bind(':jmbg', trim(htmlspecialchars($_POST['jmbg'])));
    $this->conn->bind(':pname', trim(htmlspecialchars($_POST['pname'])));
		$this->conn->bind(':psurname', trim(htmlspecialchars($_POST['psurname'])));
		$this->conn->bind(':username', trim(htmlspecialchars($_POST['username'])));
		$this->conn->bind(':password', hash("md5", ($_POST['password'])));
    if($this->conn->execute()) {
      return true;
    } else {
      return false;
    }
}
}

	
public function add($filter) {
	if(isset($_POST['submit']) && !empty($_POST['name']) && !empty($_POST['surname']) && !empty($_POST['jmbg']) && !empty($_POST['pname']) && !empty($_POST['psurname']) && !empty($_POST['username']) && !empty($_POST['password'])){

		$this->conn->query('INSERT INTO students 
		SET name=:name, surname=:surname, jmbg=:jmbg, pname=:pname, psurname=:psurname, username=:username, password=:password, class=' .$filter. ', status=(SELECT id_status FROM status WHERE id_status=4)');

		$this->conn->bind(':name', trim(htmlspecialchars($_POST['name'])));
		$this->conn->bind(':surname', trim(htmlspecialchars($_POST['surname'])));
		$this->conn->bind(':jmbg', trim(htmlspecialchars($_POST['jmbg'])));
		$this->conn->bind(':pname', trim(htmlspecialchars($_POST['pname'])));
		$this->conn->bind(':psurname', trim(htmlspecialchars($_POST['psurname'])));
		$this->conn->bind(':username', trim(htmlspecialchars($_POST['username'])));
		$this->conn->bind(':password', hash("md5", ($_POST['password'])));

		if($this->conn->execute()) {
			header("Location:class_details&class=$filter");
			exit;
		} else {
			return false;
		}
	}
}

	public function updatePass() {
		if(isset($_POST['submit']) && !empty($_POST['current_pass']) && !empty($_POST['new_pass']) && !empty($_POST['new_pass_check']))
		 {
		  $current_pass = hash("md5", $_POST['current_pass']);
			$new_pass = hash("md5", $_POST['new_pass']);
			$new_pass_check = hash("md5", $_POST['new_pass_check']);


			$this->conn->query('SELECT password FROM students
			WHERE id='.$_SESSION['user_id']);
			$results = $this->conn->resultset();
			$current_pass_db = $results[0]->{'password'};


			if($current_pass == $current_pass_db) {
				if($new_pass == $new_pass_check){
					$this->conn->query("UPDATE students
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

  public function delete() {
		if(isset($_POST['delete'])) {
			$id = $_POST['id'];
			$this->conn ->query("delete from students where id = {$id}");
			$results = $this->conn->execute();
			if(!$results){
				echo "\nPDOStatement::errorInfo():\n";
				$arr = $st->errorInfo();
				print_r($arr);
	}
 }
}


}