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

        $this->load->model('VisitModel');
        $this->VisitModel->addVisit($this->session->userdata('userID'), session_id(), $bookID, $timestamp);


        $this->load->model('BookModel');
        $data['bookDetails'] = $this->BookModel->getBookByID($bookID);

        $this->load->view('partials/header');
        $this->load->view('BookDetailsView',$data);
        $this->load->view('partials/footer');
    }

    
}

?>
