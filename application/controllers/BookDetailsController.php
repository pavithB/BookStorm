<?php
class BookDetailsController extends CI_Controller{

    public function BookDetails($bookID){

        $this->load->model('VisitModel');
        $data['recomendBook'] = $this->VisitModel->getRecomendations($bookID);
        $data['currentBook'] = $bookID;

        if(!($this->session->userdata('userID'))){

            $userID = uniqid();
            $this->session->set_userdata('userID', $userID );

            // printf("session have a user id: %s\r\n", $this->session->userdata('userID'));
            // echo "-----------";
            // printf("session id: %s\r\n", $this->session->session_id());
            // print_r(session_id());
            // printf("session id: %s\r\n", $this->session->userdata('ip_address'));
            // printf("session id: %s\r\n", $this->session->userdata('timestamp'));
            // echo 'no';
        }

        // echo ("ssss".$this->session->userdata('userID'));

            // printf("session doesnt have a user id: %s\r\n", $this->session->userdata('userID'));
            // printf("unique id: %s\r\n", $userID);
            // echo "-----------";
            // printf("session id: %s\r\n", session_id());
            // print_r($_SERVER['REMOTE_ADDR']);
            // printf("session id: %s\r\n", $this->session->userdata('ip_address'));
            // printf("session id: %s\r\n", $this->session->userdata('timestamp'));
        
    
        date_default_timezone_set('Asia/Colombo'); # add your city to set local time zone
        $dateTime = new dateTime();
        $timestamp = $dateTime->getTimestamp();
        // print date('Y-m-d H:i:s',$t2);

if(!(isset($this->session->userdata['isAdmin']) && ($this->session->userdata['isAdmin']))){

        $this->load->model('VisitModel');
        $this->VisitModel->addVisit($this->session->userdata('userID'), session_id(), $bookID, $timestamp);

}

        $this->load->model('BookModel');
        $data['bookDetails'] = $this->BookModel->getBookByID($bookID);

        $data['viewedCount'] = $this->getBookViewCount($bookID);
        $data['visitorsCount'] = $this->getBookViewUserCount($bookID);
        $data['lastViewedDate'] = $this->getBookLastView($bookID);
        // $data['viewedOthers'] = $this->getViewedOtherBooksByVisitors($bookID);



        $this->load->view('partials/header');
        $this->load->view('BookDetailsView',$data);
        $this->load->view('partials/footer');
    }


    //function to get book viewed count data
    public function getBookViewCount($bookID) {
        
        $this->load->model('VisitModel');
        $viewedCount = $this->VisitModel->getBookViewCount($bookID);

        return $viewedCount;
    }

    //function to get user count for the book
    public function getBookViewUserCount($bookID) {
        
        $this->load->model('VisitModel');
        $userCount = $this->VisitModel->getBookViewUserCount($bookID);
        return $userCount;
    }

    //function to get user last book viewed date
    public function getBookLastView($bookID) {
        
        $this->load->model('VisitModel');
        $bookDetails = $this->VisitModel->getBookLastView($bookID);

        if ($bookDetails != NULL) {
                $viewedDate = date('Y-M-d H:i:s', $bookDetails->timestamp);
        } else {
            $viewedDate = 'N/A';
        }
        return $viewedDate;
    }



    
}

?>
