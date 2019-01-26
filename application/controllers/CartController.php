<?php
class CartController extends CI_Controller{

    public function addBookToCart(){

        // echo $this->input->post('redirectTo');
        $data = array(

        'id'       => $this->input->post('bookID'),
        'qty'      => $this->input->post('qty'),
        'price'    => $this->input->post('bookPrice'),
        'name'     => $this->input->post('bookTitle'),
        'bookCover'=> $this->input->post('bookCover'),

    );
    
    $this->cart->insert($data);

    
    redirect( $this->input->post('redirectTo'), 'location');

    }

    public function viewCart(){

        $this->load->view('partials/header');
        $this->load->view('CartView');
        $this->load->view('partials/footer');

    }

    public function updateQty($option, $cartRow){

        $newQty = 0;
        if($option === 'increment'){
            $newQty = $this->cart->get_item($cartRow)['qty'] + 1;
        }else if($option === 'decrement'){
            $newQty = $this->cart->get_item($cartRow)['qty'] - 1;
        }else if($option === 'remove'){
            $newQty = 0;
        }

        $data = array(
            'rowid' => $cartRow,
            'qty'   => $newQty
    );
    
    $this->cart->update($data);


    $this->load->view('partials/header');
    $this->load->view('CartView');
    $this->load->view('partials/footer');
    }



        // $this->load->model('BookModel');
        // $data['categoryBooks'] = $this->BookModel->getBooksByCategory($categoryID)->result();


        // $this->load->model('CategoryModel');
        // $data['category'] = $this->CategoryModel->getCategoryByID($categoryID);


        // $this->load->view('partials/header');
        // $this->load->view('CategoryBookView',$data);
        // $this->load->view('partials/footer');
    

    
}

?>
