<?php
class AdminController extends CI_Controller{

    public function __construct()
    {
            parent::__construct();
    }

    public function index(){
        if((isset($this->session->userdata['isAdmin']) && ($this->session->userdata['isAdmin']))){

            $this->load->model('CategoryModel');

            $data['categories'] = $this->CategoryModel->getAllCategory()->result();

            $this->load->view('partials/header');
            $this->load->view('AdminView',$data);
            $this->load->view('partials/footer');


        }else{

            redirect( 'HomeController', 'location');
        }
    }

    public function validateNewCategory(){

        $bookConfigRules = array(
            array(
                    'field' => 'cName',
                    'label' => 'Category Name',
                    'rules' => 'trim|required'
            ),
            array(
                    'field' => 'cDescription',
                    'label' => 'Category Description',
                    'rules' => 'trim|required|max_length[2000]'
            )
    );
    
    $this->form_validation->set_rules($bookConfigRules);
    
    if ($this->form_validation->run() == FALSE) {
        if((isset($this->session->userdata['isAdmin']) && ($this->session->userdata['isAdmin']))){
            redirect( 'AdminController', 'location');
        }else{
            redirect( 'HomeController', 'location');
        }
    } else {
        $this->addNewCategory();
    }
    }

    public function addNewCategory(){


        if((isset($this->session->userdata['isAdmin']) && ($this->session->userdata['isAdmin']))){


                    $categoryName = $this->input->post('cName');
                    $categoryDescription = $this->input->post('cDescription');

                    $bookCoverPath = 'defaultCategory.png';
                    $bookCoverPath = $this->uploadImage("categoryCovers");

                    $this->load->model('CategoryModel');

                    $this->CategoryModel->insertNewCategory($categoryName, $categoryDescription, $bookCoverPath);

                    // redirect to admin add book page
                    redirect('AdminController', 'location');


        } else {
            //redirect to admin login page
            redirect('HomeController', 'location');
        }
        


    }

    public function validateNewBook(){

        $bookConfigRules = array(
            array(
                    'field' => 'bTitle',
                    'label' => 'Book Title',
                    'rules' => 'trim|required'
            ),
            array(
                    'field' => 'bDescription',
                    'label' => 'Book Description',
                    'rules' => 'trim|required|max_length[1000]',
                    'errors' => array(
                            'required' => 'You must provide a %s.',
                    ),
            ),
            array(
                    'field' => 'bAuthor',
                    'label' => 'Book Author',
                    'rules' => 'trim|required'
            ),
            array(
                    'field' => 'bPrice',
                    'label' => 'Book Price',
                    'rules' => 'trim|required'
            ),
            array(
                    'field' => 'bRating',
                    'label' => 'Book Rating',
                    'rules' => 'required'
            ),
            array(
                    'field' => 'bCategory',
                    'label' => 'Book Category',
                    'rules' => 'trim|required'
            )
    );
    
    $this->form_validation->set_rules($bookConfigRules);
    
    if ($this->form_validation->run() == FALSE) {
        if((isset($this->session->userdata['isAdmin']) && ($this->session->userdata['isAdmin']))){
            redirect( 'AdminController', 'location');
        }else{
            redirect( 'HomeController', 'location');
        }
    } else { 
        $this->addNewBook();
    }
    }


    public function addNewBook(){


        if((isset($this->session->userdata['isAdmin']) && ($this->session->userdata['isAdmin']))){


                    $bookTitle = $this->input->post('bTitle');
                    $bookAuthor = $this->input->post('bAuthor');
                    $bookCategory = $this->input->post('bCategory');
                    $bookPrice = $this->input->post('bPrice');
                    $bookDescription = $this->input->post('bDescription');
                    $bookRating = $this->input->post('bRating');


                    $bookCoverPath = 'image-not-available.jpg';
                    $bookCoverPath = $this->uploadImage("bookCovers");

                    $this->load->model('BookModel');

                    $this->BookModel->insertNewBook($bookTitle, $bookDescription, $bookCoverPath, $bookPrice, $bookAuthor, $bookCategory, $bookRating);

                    // redirect to admin add book page
                    redirect('AdminController', 'location');


        } else {
            //redirect to admin login page
            redirect('HomeController', 'location');
        }
        


    }

public function uploadImage($type){
    // $config = array();
    $config['upload_path'] = './assets/images/'.$type;
    $config['allowed_types'] = 'gif|jpg|png|jpeg|JPG';
    $config['max_size'] = '4096';
    $config['max_width'] = '2080';
    $config['max_height'] = '1600';
    $config['encrypt_name'] = TRUE;

    $this->upload->initialize($config);
    $this->load->library('upload', $config);

    // $image = null;

    if (!$this->upload->do_upload()) { 
        $errors = array('error' => $this->upload->display_errors());
    } else {
        // $data = array('upload_data' => $this->upload->data());
        // $image = $_FILES['userfile']['name'];

        $upload_data = $this->upload->data();
        $image = $upload_data['file_name'];
    }

    if (empty($image) ||$image == null) {
        $ImageUrl = 'image-not-available.jpg';
        if($type == 'categoryCovers'){
            $ImageUrl = 'defaultCategory.png';
        }else{
            $ImageUrl = 'image-not-available.jpg';
        }

    } else {
        $ImageUrl = $image;
    }
    return $ImageUrl;
}


    
}

?>