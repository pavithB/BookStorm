<?php
class CartController extends CI_Controller{

    public function addBookToCart(){

        // echo $this->input->post('redirectTo');
        $data = array(

        'id'      => $this->input->post('bookID'),
        'qty'     => $this->input->post('qty'),
        'price'   => $this->input->post('bookPrice'),
        'name'    => $this->input->post('bookTitle'),

    );
    
    $this->cart->insert($data);

    // $this->cart->destroy();
    
    redirect( $this->input->post('redirectTo'), 'location');

    }

    public function viewCart(){

        $this->load->view('partials/header');
        $this->load->view('CartView');
        $this->load->view('partials/footer');

    }

    // echo $this->cart->total_items();


        // $this->load->model('BookModel');
        // $data['categoryBooks'] = $this->BookModel->getBooksByCategory($categoryID)->result();


        // $this->load->model('CategoryModel');
        // $data['category'] = $this->CategoryModel->getCategoryByID($categoryID);


        // $this->load->view('partials/header');
        // $this->load->view('CategoryBookView',$data);
        // $this->load->view('partials/footer');
    

    
}

?>
