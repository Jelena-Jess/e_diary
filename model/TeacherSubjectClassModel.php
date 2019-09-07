<?php

class TeacherSubjectClassModel {


	private $conn;

	public function __construct() {
		$this->conn = new Database();
	}
 

	public function getSubjects($filter) {
		$this->conn->query("SELECT 
							*
							FROM 
							teacher_subject ts
							JOIN subjects s ON ts.id_subject = s.id_subj
							JOIN teachers t ON ts.id_teacher = t.id
							WHERE ts.id_teacher = $filter
							");
		$results = $this->conn->resultset();
		return $results;
	}


	public function addSubject($filter) {
		if(isset($_POST['submit'])){
		$this->conn->query("INSERT INTO teacher_subject 
		SET id_teacher=(SELECT id FROM teachers WHERE id=".$filter."), id_subject=:subject
		");
		$this->conn->bind(':subject', $_POST['subject']);

		if($this->conn->execute()) {
			header("Location:teacher_subjects&teacher=$filter");
			exit;
		} else {
			return false;
		}
	}
	}
		
	public function deleteSubject() {
		if(isset($_POST['delete'])) {
			$id = $_POST['id'];
			$this->conn ->query("DELETE FROM teacher_subject WHERE id_ts = {$id}");
			$results = $this->conn->execute();
			if(!$results){
				echo "\nPDOStatement::errorInfo():\n";
				$arr = $st->errorInfo();
				print_r($arr);
	}
 }
}

	public function getClass($filter) {
		$this->conn->query("SELECT 
							*
							FROM 
							teacher_class tc
							JOIN classes c ON tc.id_class = c.id_cl
							JOIN teachers t ON tc.id_teacher = t.id
							WHERE tc.id_teacher = $filter
							");
		$results = $this->conn->resultset();
		return $results;
	}

	
	public function addClass($filter) {
		if(isset($_POST['submit'])){
		$this->conn->query("INSERT INTO teacher_class 
		SET id_teacher=(SELECT id FROM teachers WHERE id=".$filter."), id_class=:class
		");

		$this->conn->bind(':class', $_POST['class']);

		if($this->conn->execute()) {
			header("Location:teacher_classes&teacher=$filter");
			exit;
		} else {
			return false;
		}
	}
	}

	public function deleteClass() {
		if(isset($_POST['delete'])) {
			$id = $_POST['id'];
			$this->conn ->query("DELETE FROM teacher_class WHERE id_tc = {$id}");
			$results = $this->conn->execute();
			if(!$results){
				echo "\nPDOStatement::errorInfo():\n";
				$arr = $st->errorInfo();
				print_r($arr);
	}
 }
}

public function getSubjectsByClass($filter="") {
	$this->conn->query("SELECT 
						*
						FROM 
						subjects s
						JOIN teacher_subject ts ON s.id = ts.id_subject
						JOIN teacher_class tc ON ts.id_teacher = tc.id_teacher
						WHERE " . $filter
						);
	$results = $this->conn->resultset();
	return $results;
	}
}