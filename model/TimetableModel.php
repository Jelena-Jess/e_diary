<?php
class TimetableModel{

	private $conn;
	public function __construct() {
		$this->conn = new Database();
	}


	public function getForStudents($filter) {
		$this->conn->query("SELECT tt.id_time,d.day, l.lesson, s.subject, c.class, t.tname, t.tsurname, st.name, st.surname
		FROM timetable tt
			JOIN days d ON tt.day = d.id_days
			JOIN lessons l ON tt.lesson = l.id_l
			JOIN subjects s ON tt.id_subject = s.id_subj
			JOIN classes c ON tt.id_class = c.id_cl
      JOIN students st ON c.id_cl = st.class
			JOIN teacher_class tc ON c.id_cl = tc.id_class
			JOIN teachers t ON tc.id_teacher = t.id
			JOIN teacher_subject ts ON t.id = ts.id_teacher
			WHERE tt.id_subject = ts.id_subject
			AND st.id = ".$_SESSION['user_id']." $filter
			ORDER BY l.lesson ASC
		");
		$results = $this->conn->resultset();
		return $results;
	}

	public function getForTeachers($filter) {
		$this->conn->query("SELECT tt.id_time,d.day, l.lesson, s.subject, c.class, c.id_cl, t.tname, t.tsurname
		FROM timetable tt
			JOIN days d ON tt.day = d.id_days
			JOIN lessons l ON tt.lesson = l.id_l
			JOIN subjects s ON tt.id_subject = s.id_subj
			JOIN classes c ON tt.id_class = c.id_cl
			JOIN teacher_class tc ON c.id_cl = tc.id_class
			JOIN teachers t ON tc.id_teacher = t.id
			JOIN teacher_subject ts ON t.id = ts.id_teacher
			WHERE tt.id_subject = ts.id_subject
			AND t.id = ".$_SESSION['user_id']." $filter
			ORDER BY l.lesson ASC
		 ");
		$results = $this->conn->resultset();
		return $results;
	}

	public function getForAdmin($filter) {
		$this->conn->query("SELECT tt.id_time, d.day, l.lesson, s.subject, c.class, c.id_cl, t.tname, t.tsurname
		FROM timetable tt
			JOIN days d ON tt.day = d.id_days
			JOIN lessons l ON tt.lesson = l.id_l
			JOIN subjects s ON tt.id_subject = s.id_subj
			JOIN classes c ON tt.id_class = c.id_cl
			JOIN teacher_class tc ON c.id_cl = tc.id_class
			JOIN teachers t ON tc.id_teacher = t.id
			JOIN teacher_subject ts ON t.id = ts.id_teacher
			WHERE tt.id_subject = ts.id_subject
			AND c.id_cl = $filter
			ORDER BY l.lesson ASC
		 ");
		$results = $this->conn->resultset();
		return $results;
	}

	public function add($filter){
		if(isset($_POST['submit'])){
		$this->conn->query("INSERT INTO timetable
		SET day=:day, lesson=:lesson, id_subject=:subj, id_class=$filter, id_teacher=(SELECT t.id  FROM teachers t 
				JOIN teacher_class tc ON t.id = tc.id_teacher
				JOIN teacher_subject ts ON t.id = ts.id_teacher
        JOIN classes c ON tc.id_class = c.id_cl 
				WHERE ts.id_subject =:subj AND c.id_cl =$filter)
		");

		$this->conn->bind(':day', $_POST['day']);
		$this->conn->bind(':lesson', $_POST['lesson']);
		$this->conn->bind(':subj', $_POST['subj']);

		if($this->conn->execute()) {
			header("Location:timetable_add&class=$filter");
			exit();
		} else {
			return false;
		}
	}
}


	public function update(){
		if(isset($_POST['update'])) {
			$this->conn->query('UPDATE timetable tt
			SET tt.day = :day, tt.lesson = :lesson, tt.id_subject = :subj
			WHERE tt.id_time=:id_time
			');

		$this->conn->bind(':id_time', $_POST['id_time']);
		$this->conn->bind(':day', $_POST['day']);
		$this->conn->bind(':lesson', $_POST['lesson']);
		$this->conn->bind(':subj', $_POST['subj']);
		if($this->conn->execute()) {
			return true;
		} else {
			return false;
		}
	}
	}

	public function delete() {
		if(isset($_POST['delete'])) {
			$id = $_POST['id_time'];
			$this->conn ->query("DELETE FROM timetable WHERE id_time = {$id}");
			$results = $this->conn->execute();
			if(!$results){
				echo "\nPDOStatement::errorInfo():\n";
				$arr = $st->errorInfo();
				print_r($arr);
	}
 }
}
}