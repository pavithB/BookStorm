<?php
class CategoryBookController extends CI_Controller{
    public function categoryBooks($categoryID){

        $this->load->model('BookModel');
        $data['categoryBooks'] = $this->BookModel->getBooksByCategory($categoryID)->result();


        $this->load->model('CategoryModel');
        $data['category'] = $this->CategoryModel->getCategoryByID($categoryID);


        $this->load->view('partials/header');
        $this->load->view('CategoryBookView',$data);
        $this->load->view('partials/footer');
    }

    
}

?>
