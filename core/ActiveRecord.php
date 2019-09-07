<?php

class ActiveRecord {
	private $conn;

	public function __construct() {
		$this->conn = new Database();
    }
	
	public function getAll($filter=""){
		$this->conn->query("SELECT * FROM ". static::$table . " " . $filter);
		$results = $this->conn->resultset();
		return $results;
	}  

	public function get($id){
		$this->conn->query("select * from ".static::$table . " where ".static::$key." = :id");
		$this->conn->bind(':id', $id);
		$results = $this->conn->single();
		return $results;
	}

	public function delete(){
		if(isset($_POST['delete'])) {
			$id = $_POST[static::$key];
			$this->conn ->query("delete from " . static::$table . " where " . static::$key . "= :id");
			$this->conn->bind(':id',$id);
			$results = $this->conn->execute();
			if(!$results){
				echo "\nPDOStatement::errorInfo():\n";
				$arr = $results->errorInfo();
				print_r($arr);	
			}
		}
	}


//SubjectModel Methods
	public function insert(){
		if(isset($_POST['submit']) && !empty($_POST[static::$column]) && !is_numeric($_POST[static::$column])){
		$this->conn->query("INSERT INTO ".static::$table." (".static::$column.")
		VALUES (:".static::$column.")");
		
		$this->conn->bind(':'.static::$column, trim(htmlspecialchars($_POST[static::$column])));

		if($this->conn->execute()) {
			header("Location:subjects_admin");
			exit;
		} else {
			return false;
		}
	}	
}

public function update(){
	if(isset($_POST['update']) && !empty($_POST['subject']) && !is_numeric($_POST['subject'])) {
		$this->conn->query('UPDATE '.static::$table.'
		SET subject = :subject
		WHERE subjects.id_subj=:id;');

		$this->conn->bind(':id', $_POST['id_subj']);
		$this->conn->bind(':subject', $_POST['subject']);
		if($this->conn->execute()) {
			return true;
		} else {
			return false;
		}
	}
}

public function getSubjectsByClass($filter) {
	$this->conn->query("SELECT s.id_subj, s.subject
	FROM 
	subjects s
		JOIN teacher_subject ts ON s.id_subj = ts.id_subject
		JOIN teachers t ON ts.id_teacher = t.id
		JOIN teacher_class tc ON t.id = tc.id_teacher
		JOIN classes c ON tc.id_class = c.id_cl
		WHERE c.id_cl =" . $filter
		);
		$results = $this->conn->resultset();
		return $results;
}

//ClassesModel Methods
public function add() {
	if(isset($_POST['addNew'])){
		$year = $_POST['class_year'];
		$name = $_POST['class_name'];
		$full_name = $year . $name;
		$this->conn->query("INSERT INTO classes (class) VALUES (:class)");
		$this->conn->bind(':class', $full_name);
		if($this->conn->execute()) {
		// header("Location: users_admin");
		return true;
		} else {
			return false;
		}
	}
}

public function filter() {
	if(isset($_POST['submit'])) {
		$q = $_POST['value'];
		$this->conn->query("SELECT * FROM classes WHERE class LIKE '%$q%'");
		$results = $this->conn->resultset();
		if($results) {
		return $results;
		}else {
			return false;
		}
	}
}

//TeacherModel
	public function updatePass() {
		if(isset($_POST['submit']) && !empty($_POST['current_pass']) && !empty($_POST['new_pass']) && !empty($_POST['new_pass_check'])) {
			$current_pass = hash("md5", $_POST['current_pass']);
			$new_pass = hash("md5", $_POST['new_pass']);
			$new_pass_check = hash("md5", $_POST['new_pass_check']);

			$this->conn->query('SELECT password FROM teachers
			WHERE id='.$_SESSION['user_id']);
			$results = $this->conn->resultset();
			$current_pass_db = $results[0]->{'password'};

			if($current_pass == $current_pass_db) {
				if($new_pass == $new_pass_check){
					$this->conn->query("UPDATE teachers
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

	//NoticeboardModel
	public function addNotice(){
		if(isset($_POST['submit']) && !empty($_POST['title']) && !empty($_POST['message'])){
			$this->conn->query("INSERT INTO news (title, message) VALUES (:title, :message)");
			$this->conn->bind(':title', trim(htmlspecialchars($_POST['title'])));
			$this->conn->bind(':message', trim(htmlspecialchars($_POST['message'])));
			if($this->conn->execute()) {
				header("Location:noticeboard_admin");
				return true;
			} else {
				return false;
			}
		}
	}


	// public function save(){
	// 	$fields="";
	// 	foreach($fields as $k=>$v){
	// 		if($k == static::$key){continue;}
	// 		$fields .= "{$k}='{$v}',";
	// 	}
	// 	$fields = rtrim($fields,",");
	// 	return $fields;
	// }

	// public function insert(){

	// 	try {
	// 		$table =static::$table;
	// 		$querry = $this->conn->query("insert into ".$table." set ");
	// 		$querry .= $this->save();
	// 		$result = $this->conn->execute();
	// 	}
	// 	catch(Exception $e) {
	// 		echo "exception";
	// 		echo $e->getMessage();
	// 	}
	// }

	// public function update($id){
	// 	try {
	// 		$table =static::$table;
	// 		$querry = $this->conn->query("update {$table} set ");
	// 		$querry .= $this ->save();
	// 		$querry .= " where " . static::$key . "= {$id}";
	// 		$result = $this->conn->execute($querry);
	// 	}
	// 	catch(Exception $e) {
	// 		echo "exception";
	// 		echo $e->getMessage();
	// 	}
	// }

}
