<?php
class BookDetailsController extends CI_Controller{

    public function BookDetails($bookID){

        $this->load->model('BookModel');
        $data['bookDetails'] = $this->BookModel->getBookByID($bookID);

        $this->load->view('partials/header');
        $this->load->view('BookDetailsView',$data);
        $this->load->view('partials/footer');
    }

    
}

?>
