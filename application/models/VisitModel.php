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
}
?>