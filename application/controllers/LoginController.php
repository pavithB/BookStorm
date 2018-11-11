<?php
class LoginController extends CI_Controller{

    public function __construct() {
        parent::__construct();

        // Load MODEL
        $this->load->model('AdminModel');
        }


    public function index(){

        // $this->load->model('BookModel');
        // $books['allBooks'] = $this->BookModel->getAllBooks()->result();
        // $books['allBooks']  = $data;
        // foreach ($allBooks->result() as $row)
        // {
        //         print ($row->categoryID);
        // }


        // $this->load->model('CategoryModel');
        // $data['allCategory'] = $this->CategoryModel->getAllCategory()->result();
        // $data=$this->CategoryModel->getAllCategory();
        // $books['allCategory']  = $data->result();


        $this->load->view('partials/header');
        $this->load->view('LoginView');
        $this->load->view('partials/footer');
    }

    public function adminLogin(){

    $this->form_validation->set_rules('username', 'Username', 'trim|required');
    $this->form_validation->set_rules('password', 'Password', 'trim|required');
    
    if ($this->form_validation->run() == FALSE) {
    // if(isset($this->session->userdata['logged_in'])){
    // $this->load->view('admin_page');
    // }else{
        $this->load->view('partials/header');
        $this->load->view('LoginView');
        $this->load->view('partials/footer');
    // }
    // echo "validation error";
    } else {
    $data = array(
    'username' => $this->input->post('username'),
    'password' => $this->input->post('password')
    );
    $result = $this->AdminModel->authAdmin($data);
    if ($result == TRUE) {
    
    $username = $this->input->post('username');
    $result = $this->AdminModel->adminData($username);
    if ($result != false) {
    $session_data = array(
    'firstname' => $result[0]->firstname,
    'lastname' => $result[0]->lastname
    );

    $this->session->set_userdata('adminData', $session_data);
    $this->session->set_userdata('isAdmin', true);
    $this->load->view('admin_page');
    }
    } else {
    $data = array(
    'error_message' => 'Invalid Username or Password'
    );
    // $this->load->view('login_form', $data);
    $this->load->view('partials/header');
    $this->load->view('LoginView',$data);
    $this->load->view('partials/footer');

    }
    echo "validation done";
    }
    
    }
    

    
}

?>
