<?php
class HomeController extends CI_Controller{
    public function index(){

        // $this->load->model('BookModel');
        // $books['allBooks'] = $this->BookModel->getAllBooks()->result();
        // $books['allBooks']  = $data;
        // foreach ($allBooks->result() as $row)
        // {
        //         print ($row->categoryID);
        // }


        $this->load->model('CategoryModel');
        $data['allCategory'] = $this->CategoryModel->getAllCategory()->result();
        // $data=$this->CategoryModel->getAllCategory();
        // $books['allCategory']  = $data->result();


        $this->load->view('partials/header');
        $this->load->view('HomeView',$data);
        $this->load->view('partials/footer');
    }


    public function search(){

        $searchKeyword = $this->input->post('search');
        $data['searchKeyword'] = $searchKeyword;
        $this->load->model('BookModel');
        $data['searchResult'] = $this->BookModel->getSearchResult($searchKeyword);
        $this->load->view('partials/header');
        $this->load->view('SearchView',$data);
        $this->load->view('partials/footer');



    }

    
}

?>
