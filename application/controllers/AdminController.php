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

        // $abc = $this->uploadImage();

        if((isset($this->session->userdata['isAdmin']) && ($this->session->userdata['isAdmin']))){


                    $categoryName = $this->input->post('cName');
                    $categoryDescription = $this->input->post('cDescription');


                    // $bookCoverPath = $this->uploadImage();
                    $bookCoverPath = 'defaultCategory.jpg';

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

        // $abc = $this->uploadImage();

        if((isset($this->session->userdata['isAdmin']) && ($this->session->userdata['isAdmin']))){


                    $bookTitle = $this->input->post('bTitle');
                    $bookAuthor = $this->input->post('bAuthor');
                    $bookCategory = $this->input->post('bCategory');
                    $bookPrice = $this->input->post('bPrice');
                    $bookDescription = $this->input->post('bDescription');
                    $bookRating = $this->input->post('bRating');


                    $bookCoverPath = $this->uploadImage();
                    $bookCoverPath = 'default.jpg';

                    $this->load->model('BookModel');

                    $this->BookModel->insertNewBook($bookTitle, $bookDescription, $bookCoverPath, $bookPrice, $bookAuthor, $bookCategory);

                    // redirect to admin add book page
                    redirect('AdminController', 'location');


        } else {
            //redirect to admin login page
            redirect('HomeController', 'location');
        }
        


    }


//     public function uploadImage()
//     {
//             $config['upload_path']          = './assets/';
//             $config['allowed_types']        = 'gif|jpg|png';
//             $config['max_size']             = 100;
//             $config['max_width']            = 2048;
//             $config['max_height']           = 2048;

//             $this->load->library('upload', $config);

//             if ( ! $this->upload->do_upload('userfile'))
//             {
//                     $error = array('error' => $this->upload->display_errors());
// echo 'error';
//                     $this->load->view('upload_form', $error);
//             }
//             else
//             {
//                     $data = array('upload_data' => $this->upload->data());

//                     echo $data['upload_data'];
//             }
//     }

public function uploadImage(){
    $config = array();
    $config['upload_path'] = '../assets/images';
    $config['allowed_types'] = 'gif|jpg|png|jpeg|JPG';
    $config['max_size'] = '4096';
    $config['max_width'] = '1024';
    $config['max_height'] = '768';

    $this->load->library('upload', $config);
    $this->upload->initialize($config);

    // $image = null;

    if (!$this->upload->do_upload('userfile')) { 
        $errors = array('error' => $this->upload->display_errors());
    } else {
        $data = array('upload_data' => $this->upload->data());
        $image = $_FILES['userfile']['name'];
    }

    if ($image == null) {
        $ImageUrl = 'image-not-available.jpg';
    } else {
        $ImageUrl = $image;
    }
    return $ImageUrl;


}


    
}

?>