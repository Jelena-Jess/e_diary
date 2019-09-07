<?php

class GradesModel{

	private $conn;
	public function __construct() {
		$this->conn = new Database();
	}

	public function getById($filter) {
		$this->conn->query("SELECT * 
			FROM	grades g
			JOIN students st ON g.id_student = st.id
			JOIN classes c ON st.class = c.id_cl
			JOIN teacher_class tc ON st.class = tc.id_class
			JOIN teachers t ON tc.id_teacher = t.id
			JOIN teacher_subject ts ON t.id = ts.id_teacher
			JOIN subjects ON ts.id_subject = subjects.id_subj
			WHERE g.id_subject = ts.id_subject
			AND ". $filter
		);
		$results = $this->conn->resultset();
		return $results;
	}
	
	public function getBySchool() {
		$this->conn->query("SELECT s.subject, avg(final1) average1, avg(final2) average2
				FROM	grades g
				JOIN subjects s ON id_subject = s.id_subj
        GROUP BY s.subject 
		");
		$results = $this->conn->resultset();
		return $results;
	}

	public function getByClass($filter) {
		$this->conn->query("SELECT  s.subject, c.class, avg(g.final1) average1, avg(g.final2) average2
		FROM grades g
        JOIN subjects s ON id_subject = s.id_subj
        JOIN teacher_subject ts ON s.id_subj = ts.id_subject
        JOIN teacher_class tc ON ts.id_teacher = tc.id_teacher
        JOIN classes c ON tc.id_class = c.id_cl
				WHERE c.id_cl = $filter
        group by s.subject 
		");
		$results = $this->conn->resultset();
		return $results;
	}


	public function update($id) {
  	if(isset($_POST['update'])) {
		$id = $_POST['id'];
		$this->conn->query('UPDATE grades
		SET term1=:term1, term2=:term2, term3=:term3, term4=:term4, final1=:final1, final2=:final2 WHERE id_g=:id');
		$this->conn->bind(':id', $_POST['id']);
		$this->conn->bind(':term1', trim(htmlspecialchars($_POST['term1'])));
		$this->conn->bind(':term2', trim(htmlspecialchars($_POST['term2'])));
		$this->conn->bind(':term3', trim(htmlspecialchars($_POST['term3'])));
		$this->conn->bind(':term4', trim(htmlspecialchars($_POST['term4'])));
		$this->conn->bind(':final1', trim(htmlspecialchars($_POST['final1'])));
		$this->conn->bind(':final2', trim(htmlspecialchars($_POST['final2'])));

		if($this->conn->execute()) {
			return true;
		} else {
			return false;
		}
}
}

public function add($filter) {
	if(isset($_POST['submit'])) {
	$this->conn->query('INSERT INTO grades
	SET term1=:term1, term2=:term2, term3=:term3, term4=:term4, final1=:final1, final2=:final2, id_student=' . $filter . ', id_subject=:subject');

	$this->conn->bind(':term1', trim(htmlspecialchars($_POST['term1'])));
	$this->conn->bind(':term2', trim(htmlspecialchars($_POST['term2'])));
	$this->conn->bind(':term3', trim(htmlspecialchars($_POST['term3'])));
	$this->conn->bind(':term4', trim(htmlspecialchars($_POST['term4'])));
	$this->conn->bind(':final1', trim(htmlspecialchars($_POST['final1'])));
	$this->conn->bind(':final2', trim(htmlspecialchars($_POST['final2'])));
	$this->conn->bind(':subject', $_POST['subject']);

	if($this->conn->execute()) {
		header("Location:grades&student=$filter");
		exit;
	} else {
		return false;
	}
}
}

public function delete() {
	if(isset($_POST['delete'])) {
		$id = $_POST['id_g'];
		$this->conn ->query("DELETE FROM grades WHERE id_g = {$id}");
		$results = $this->conn->execute();
		if(!$results){
			echo "\nPDOStatement::errorInfo():\n";
			$arr = $st->errorInfo();
			print_r($arr);
}
}
}
}
