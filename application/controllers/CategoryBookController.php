<?php
class CategoryBookController extends CI_Controller{



    public function __construct() {
        parent:: __construct();

        $this->load->model('BookModel');
        $this->load->model('CategoryModel');
    }



        public function loadPaginatedBooks(){

        $data['categoryBooks'] = $this->BookModel->getBooksByCategory($categoryID)->result();



        $data['category'] = $this->CategoryModel->getCategoryByID($categoryID);


        $this->load->view('partials/header');
        $this->load->view('CategoryBookView',$data);
        $this->load->view('partials/footer');
    }

    public function categoryBooks($categoryID){

        $config = array();
        $config["base_url"] = base_url() . "CategoryBookController/categoryBooks/".$categoryID;
        $config["total_rows"] = $this->BookModel->booksPerCategory($categoryID);
        $config["per_page"] = 8;
        $config["uri_segment"] = 4;
        $config['attributes'] = array('class' => ' page-item page-link');
        // $config['full_tag_open'] = '<li class="page-item">';
        // $config['full_tag_close'] = '</li>';

        // echo $config['total_rows'] ;
        $this->pagination->initialize($config);

        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $data["categoryBooks"] = $this->BookModel->fetchBooksByCategory($config["per_page"], $page, $categoryID);

        $data['category'] = $this->CategoryModel->getCategoryByID($categoryID);


            
        $data["links"] = $this->pagination->create_links();

        $this->load->view('partials/header');
        $this->load->view('CategoryBookView',$data);
        $this->load->view('partials/footer');

    }

    
}

?>
