<?php

class MessageModel {
    private $conn;

    public function __construct() {
        $this->conn = new Database();
    }

    public function showMessage($senderId, $recieverId) {
        $this->conn->query("SELECT m.id, m.body, m.time, m.recieverId, m.senderId, s.pname, ts.tname FROM messages m
        LEFT JOIN students s ON m.senderId = s.id
        LEFT JOIN students r ON m.recieverId = r.id
        LEFT JOIN teachers ts ON m.senderId = ts.id
        LEFT JOIN teachers tr ON m.recieverId = tr.id
        WHERE m.senderId = {$senderId}
        AND m.recieverId = {$recieverId}
        OR m.senderId = {$recieverId}
        AND m.recieverId = {$senderId}
        ORDER BY time ASC");

        $results = $this->conn->resultset();
        return $results;
    }

    public function getTeachers() {

        $this->conn->query("SELECT t.id, t.tname, t.tsurname, s.name FROM teachers t
            JOIN teacher_class tc ON t.id = tc.id_teacher
            JOIN classes c ON tc.id_class = c.id_cl
            JOIN students s ON c.id_cl = s.class
            WHERE s.id=".$_SESSION['user_id']);
        $results = $this->conn->resultset();
        if($results) {
            return $results;
        }else {
            return false;
        }

    }

    public function getParents() {

        $this->conn->query("SELECT s.id, s.pname, s.psurname, t.tname, t.tsurname FROM students s
            JOIN classes c ON s.class = c.id_cl
            JOIN teacher_class tc ON c.id_cl = tc.id_class
            JOIN teachers t ON tc.id_teacher = t.id
            WHERE t.id =".$_SESSION['user_id']);
        $results = $this->conn->resultset();
        if($results) {
            return $results;
        }else {
            return false;
        }
    }

    public function addMessage($from, $to, $message) {

            $this->conn->query("INSERT INTO messages (senderId, recieverId, body, status) VALUES (:senderId, :recieverId, :body, :status)");
            $this->conn->bind(':senderId', $from);
            $this->conn->bind(':recieverId', $to);
            $this->conn->bind(':body', $message);
            $this->conn->bind(':status', 1); 
            $this->conn->execute();
            return; 
    }
    
    public function read_new_Message($recieverId, $senderId) {
           
        $this->conn->query("SELECT messages.id, messages.body, messages.time FROM messages WHERE senderId = :senderId AND recieverId = :recieverId AND status = :status"); 
        $this->conn->bind(':senderId', $senderId); 
        $this->conn->bind(':recieverId', $recieverId); 
        $this->conn->bind(':status', 1); 
        
        $results = $this->conn->resultset(); 
        return $results; 
    }

    public function new_status_Message($id) {
        
        $this->conn->query("UPDATE messages SET status = :status WHERE id = :id"); 
        $this->conn->bind(':status', 0); 
        $this->conn->bind(':id', $id);
        $this->conn->execute(); 
        return; 
    }
}
