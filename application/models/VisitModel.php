<?php

class VisitModel extends CI_Model {

    public function addVisit($userID, $sessionID, $bookID, $timestamp) {

        // printf("session id: %s\r\n",$timestamp);
         
        $data = array(
            'userID' => $userID,
            'sessionID' => $sessionID,
            'bookID' => $bookID,
            'timestamp' => $timestamp
    );
    
    $this->db->insert('visit', $data);

    }

    public function getRecomendations($bookID) {
        $query = $this->db->query('SELECT *, COUNT(*) AS visits  FROM visit INNER JOIN book ON visit.bookID = book.bookID WHERE userID IN (SELECT userID FROM visit WHERE bookID = '.$bookID.')  GROUP BY visit.bookID ORDER BY visits DESC LIMIT 6;');
        return $query->result();
        
        //         foreach ($query->result() as $row)
        // {
        //         print ($row->bookTitle);
        //         print ("/////////////");
        // }
    }

    

    //retrieve book viewed count by book id
    public function getBookViewCount($bookID){
        $query = $this->db->query("SELECT * FROM visit WHERE bookID=".$bookID);
        return $query->num_rows();
    }
   
    //retrieve user count by book id
    public function getBookViewUserCount($bookID){
        $query = $this->db->query("SELECT bookID, userID FROM visit WHERE bookID = ".$bookID." GROUP BY userID");
        return $query->num_rows();
    }
    
    //retrieve last viewed book details by book id
    public function getBookLastView($bookID){
        $query = $this->db->query("SELECT timestamp FROM visit WHERE bookID=$bookID ORDER BY visitID DESC LIMIT 1");
        return $query->row();
    }
    
}
?>