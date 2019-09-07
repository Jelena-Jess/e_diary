<?php

	class OpendoorModel{
	
		private $conn;

			public function __construct() {
				$this->conn = new Database();
			}

    public function getSlots() {
			$this->conn->query("SELECT * FROM teacher_openslot tc
			JOIN teachers t ON tc.id_teacher = t.id
			JOIN days d ON tc.id_day = d.id_days
			JOIN hours h ON tc.id_hour = h.id
			JOIN minutes m ON tc.id_minute = m.id_min
			JOIN period p ON tc.id_period = p.id_period
			WHERE t.id = ".$_SESSION['user_id']);
			$query = $this->conn->resultset();
			return $query;
		}

		public function addSlot(){
			if(isset($_POST['submit'])){
			$this->conn->query("INSERT INTO teacher_openslot 
				SET id_teacher=".$_SESSION['user_id'].", id_day=:day, id_hour=:time, id_minute=:minute, id_period=:period");
			
			$this->conn->bind(':day', $_POST['day']);
			$this->conn->bind(':time', $_POST['time']);
			$this->conn->bind(':minute', $_POST['minute']);
			$this->conn->bind(':period', $_POST['period']);

			if($this->conn->execute()) {
				header("Location:timeslots");
				exit;
			} else {
				return false;
			}
		}
	}

		public function deleteSlot() {
			if(isset($_POST['delete'])) {
				$id = $_POST['id_tos'];
				$this->conn ->query("DELETE FROM teacher_openslot WHERE id_tos = {$id}");
				$results = $this->conn->execute();
				if(!$results){
					echo "\nPDOStatement::errorInfo():\n";
					$arr = $st->errorInfo();
					print_r($arr);
		}
	 }
	}

	public function getSlotsForParents($filter) {
		$this->conn->query("SELECT * FROM teacher_openslot tc
		JOIN teachers t ON tc.id_teacher = t.id
		JOIN teacher_class tcl ON t.id = tcl.id_teacher
		JOIN students s ON tcl.id_class = s.class
		JOIN days d ON tc.id_day = d.id_days
		JOIN hours h ON tc.id_hour = h.id
		JOIN minutes m ON tc.id_minute = m.id_min
		JOIN period p ON tc.id_period = p.id_period
		WHERE s.id=". $filter);
		$query = $this->conn->resultset();
		return $query;
	}

	public function getResponses() {
		$this->conn->query("SELECT o.id_o, s.name, s.surname, s.pname, s.psurname, t.tname, t.tsurname, d.day, h.hour, m.min, p.period, o.timestamp
		FROM opendoor o
		JOIN students s ON o.id_parent = s.id
		JOIN teacher_openslot tcos ON o.id_tos = tcos.id_tos
		JOIN days d ON tcos.id_day = d.id_days
		JOIN hours h ON tcos.id_hour = h.id
		JOIN minutes m ON tcos.id_minute = m.id_min
		JOIN period p ON tcos.id_period = p.id_period
		JOIN teachers t on tcos.id_teacher = t.id
		WHERE t.id=".$_SESSION['user_id']."
		ORDER BY id_o DESC");
		$query = $this->conn->resultset();
			return $query;
	}

	public function teacherAccept() {
		if(isset($_POST['accept'])) {
			$id_o = $_POST['id_o'];
			$this->conn->query('INSERT INTO opendoor_response
			SET id_opendoor='.$id_o.', status=1');
				if($this->conn->execute()) {
					header("Location: requests");
					return true;
					} else {
					return false;
					}
				}elseif(isset($_POST['decline'])){
					$id_o = $_POST['id_o'];
					$this->conn->query('INSERT INTO opendoor_response
					SET id_opendoor='.$id_o.', status=0');
						if($this->conn->execute()) {
							header("Location: requests");
							return true;
							} else {
							return false;
							}
				}
			}

			public function getResponsesForParents($filter) {
				$this->conn->query("SELECT odr.status, t.tname, t.tsurname, s.name, s.surname, s.pname, s.psurname, d.day, h.hour, m.min, p.period, odr.timestamp  FROM opendoor_response odr
					JOIN opendoor o ON odr.id_opendoor = o.id_o
					JOIN students s ON o.id_parent = s.id
					JOIN teacher_openslot tcos ON o.id_tos = tcos.id_tos
					JOIN teachers t ON tcos.id_teacher = t.id
					JOIN days d ON tcos.id_day = d.id_days
					JOIN hours h ON tcos.id_hour = h.id
					JOIN minutes m ON tcos.id_minute = m.id_min
					JOIN period p ON tcos.id_period = p.id_period
					WHERE s.id=" . $filter . " 
					ORDER BY id_odr DESC");
				$query = $this->conn->resultset();
					return $query;
			}

			public function remove_response() {
							$this->conn ->query("DELETE FROM opendoor_response WHERE DATEDIFF(NOW(), `timestamp`)>7 ");
							$results = $this->conn->execute();
							if(!$results){
								echo "\nPDOStatement::errorInfo():\n";
								$arr = $st->errorInfo();
								print_r($arr);	
					}
				}	

			public function remove_opendoor() {
				$this->conn ->query("DELETE FROM opendoor WHERE DATEDIFF(NOW(), `timestamp`)>7 ");
				$results = $this->conn->execute();
				if(!$results){
					echo "\nPDOStatement::errorInfo():\n";
					$arr = $st->errorInfo();
					print_r($arr);	
				}
			}
}
?>

