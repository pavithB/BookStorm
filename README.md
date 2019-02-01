# BookStorm
An ecommerce website for books. develop using CodeIgniter framework for PHP
https://studentsiitac-my.sharepoint.com/:w:/g/personal/pavith_2015238_iit_ac_lk/EdyH7fqGl0xMjbKIEANyXoUBpM40fCUo0ja-n81Tz0_4YA?e=NciT44




 

 

 

 

 

INFORMATICS INSTITUTE OF TECHNOLOGY 

In collaboration with 

The University of Westminster, UK 

 

 

BEng (Hons) DEGREE PROGRAMME in SOFTWARE ENGINEERING 

 

“Book-Storm” 

 

Advance Server Side Web Programming 

 

 

 

 

By 

S.G.V.P.B.Gunasekara 

Student No: 2015238 / W1608462 

 

Contents 

Browse Books by Categories3 

View All Books in a Category with Pagination4 

Add a Book to a Shopping Basket5 

View the Shopping Basket (Editing)6 

Admin Login7 

Create New Categories8 

Add New Book9 

Search for a Book by Title / Author10 

View Individual Books Details / Visitor Statistics10 

Track User11 

Recommended Books12 

Codeigniter Configurations13 

Appendix13 

Appendix – A (Controllers)13 

AdminController.php14 

BookDetailsController.php19 

CartController.php21 

CategoryBookController.php22 

HomeController.php24 

LoginController.php24 

Appendix – B (Views)27 

AdminView.php27 

BookDetailsView.php33 

CartView.php40 

CategoryBookView.php43 

HomeView.php46 

LoginView.php52 

SearchView.php54 

Footer.php57 

Header.php58 

Appendix – C (Models)62 

AdminModel.php62 

BookModel.php63 

CategoryModel.php66 

VisitModel.php67 

￼ 

 

 

 

 

 

 

 

 

 

 

 

 

 

 

Browse Books by Categories 

 

 

 

 

Refer Appendix -A [Symbol]  HomeController  [Symbol] index()  function 

 

 

 

 

 

 

 

 

 

 

 

 

View All Books in a Category with Pagination 

 

 

Refer Appendix -A [Symbol]  CategoryBookController  [Symbol]  loadPaginatedBooks()  function 

 

 

 

 

Add a Book to a Shopping Basket 

 

 

 

 

 

 

 

Refer Appendix -A [Symbol]  BookDetailsController  [Symbol]  bookDetails()  function 

 

View the Shopping Basket (Editing) 

 

 

 

 

 

Refer Appendix -A [Symbol]  CartController  [Symbol] addBookToCart()  function 

 

 

Refer Appendix -A [Symbol]  CartController  [Symbol] updatQty()  function 

 

Admin Login 

 

Refer Appendix -A [Symbol]  LoginController  [Symbol] adminLogin()  function 

 

 

 

 

 

 

 

 

 

 

 

 

 

 

 

 

Create New Categories 

 

Refer Appendix -A [Symbol]  AdminController  [Symbol] addNewCategory()  function 

 

 

Add New Book 

 

 

 

 

Refer Appendix -A [Symbol]  AdminController  [Symbol] addnewBook()  function 

 

 

 

Search for a Book by Title / Author 

 

 

 

 

 

Refer Appendix -A [Symbol]  HomeController  [Symbol] search()  function 

 

 

 

 

 

 

 

 

 

View Individual Books Details / Visitor Statistics 

 

 

 

 

Refer Appendix -A [Symbol]  BookDetailsController  [Symbol] getBookViewCount()  function 

 

 

Track User 

 

Refer Appendix -A [Symbol]  BookDetailsController  [Symbol] bookDetails()  function 

 

Recommended Books 

 

 

 

Refer Appendix -A [Symbol]  BookDetailsController  [Symbol] bookDetails()  function 

 

 

 

 

 

 

 

 

Codeigniter Configurations 

 

Set base path in config/config.php: 

$config['base_url'] = 'http://localhost/BookStorm/'; 

 

Set libraries and helpers to preload in config/autoload.php: 

$autoload['libraries'] = array('database','form_validation','session','cart','pagination','upload'); 

$autoload['helper'] = array('url','form'); 

 

Configure database in config/database.php: 

$db['default'] = array( 

    'dsn'   => '', 

    'hostname' => 'localhost', 

    'username' => 'root', 

    'password' => '', 

    'database' => 'bookstorm', 

    'dbdriver' => 'mysqli', 

    'dbprefix' => '', 

    'pconnect' => FALSE, 

    'db_debug' => (ENVIRONMENT !== 'production'), 

    'cache_on' => FALSE, 

    'cachedir' => '', 

    'char_set' => 'utf8', 

    'dbcollat' => 'utf8_general_ci', 

    'swap_pre' => '', 

    'encrypt' => FALSE, 

    'compress' => FALSE, 

    'stricton' => FALSE, 

    'failover' => array(), 

    'save_queries' => TRUE 

); 

 

Appendix 

 

Appendix – A (Controllers) 

 

AdminController.php 

This controller for handle all the admin role related manipulations and logics such as add new books 

<?php 

class AdminController extends CI_Controller { 

 

        public function __construct() { 

            parent:: __construct(); 

 

            $this -> load -> model('CategoryModel'); 

            $this -> load -> model('BookModel'); 

        } 

 

        public function index() { 

            if ((isset($this -> session -> userdata['isAdmin']) && ($this -> session -> userdata['isAdmin']))) { 

 

                $data['categories'] = $this -> CategoryModel -> getAllCategory() -> result(); 

 

                $this -> load -> view('partials/header'); 

                $this -> load -> view('AdminView', $data); 

                $this -> load -> view('partials/footer'); 

 

            } else { 

 

                redirect('HomeController', 'location'); 

            } 

        } 

 

        public function validateNewCategory() { 

 

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

 

            $this -> form_validation -> set_rules($bookConfigRules); 

 

            if ($this -> form_validation -> run() == FALSE) { 

                if ((isset($this -> session -> userdata['isAdmin']) && ($this -> session -> userdata['isAdmin']))) { 

                    redirect('AdminController', 'location'); 

                } else { 

                    redirect('HomeController', 'location'); 

                } 

            } else { 

                $this -> addNewCategory(); 

            } 

        } 

 
 

        public function addNewCategory() { 

 

            // $abc = $this->uploadImage(); 

 

            if ((isset($this -> session -> userdata['isAdmin']) && ($this -> session -> userdata['isAdmin']))) { 

 

                $categoryName = $this -> input -> post('cName'); 

                $categoryDescription = $this -> input -> post('cDescription'); 

 

                // $bookCoverPath = $this->uploadImage(); 

                $bookCoverPath = 'defaultCategory.jpg'; 

 
 

                $this -> CategoryModel -> insertNewCategory($categoryName, $categoryDescription, $bookCoverPath); 

 

                // redirect to admin add book page 

                redirect('AdminController', 'location'); 

 

            } else { 

                //redirect to admin login page 

                redirect('HomeController', 'location'); 

            } 

 
 

        } 

 

        public function validateNewBook() { 

 

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

 

            $this -> form_validation -> set_rules($bookConfigRules); 

 

            if ($this -> form_validation -> run() == FALSE) { 

                if ((isset($this -> session -> userdata['isAdmin']) && ($this -> session -> userdata['isAdmin']))) { 

                    redirect('AdminController', 'location'); 

                } else { 

                    redirect('HomeController', 'location'); 

                } 

            } else { 

                $this -> addNewBook(); 

            } 

        } 

 

        public function addNewBook() { 

 

            // $abc = $this->uploadImage(); 

 

            if ((isset($this -> session -> userdata['isAdmin']) && ($this -> session -> userdata['isAdmin']))) { 

 

                $bookTitle = $this -> input -> post('bTitle'); 

                $bookAuthor = $this -> input -> post('bAuthor'); 

                $bookCategory = $this -> input -> post('bCategory'); 

                $bookPrice = $this -> input -> post('bPrice'); 

                $bookDescription = $this -> input -> post('bDescription'); 

                $bookRating = $this -> input -> post('bRating'); 

 

                $bookCoverPath = $this -> uploadImage(); 

                $bookCoverPath = 'default.jpg'; 

 
 

                $this -> BookModel -> insertNewBook($bookTitle, $bookDescription, $bookCoverPath, $bookPrice, $bookAuthor, $bookCategory); 

 

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

 

        public function uploadImage() { 

            $config = array(); 

            $config['upload_path'] = '../assets/images'; 

            $config['allowed_types'] = 'gif|jpg|png|jpeg|JPG'; 

            $config['max_size'] = '4096'; 

            $config['max_width'] = '1024'; 

            $config['max_height'] = '768'; 

 

            $this -> load -> library('upload', $config); 

            $this -> upload -> initialize($config); 

 

            // $image = null; 

 

            if (!$this -> upload -> do_upload('userfile')) { 

                $errors = array('error' => $this -> upload -> display_errors()); 

            } else { 

                $data = array('upload_data' => $this -> upload -> data()); 

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

 

 

 BookDetailsController.php 

 

This controller handle user tracking features and book recommendation and visitor statistics features 

 

<?php 

class BookDetailsController extends CI_Controller { 

 

        public function BookDetails($bookID) { 

 

            $this -> load -> model('VisitModel'); 

            $data['recomendBook'] = $this -> VisitModel -> getRecomendations($bookID); 

            $data['currentBook'] = $bookID; 

 

            if (!($this -> session -> userdata('userID'))) { 

 

                $userID = uniqid(); 

                $this -> session -> set_userdata('userID', $userID); 

            } 

 

            date_default_timezone_set('Asia/Colombo'); # add your city to set local time zone 

            $dateTime = new dateTime(); 

            $timestamp = $dateTime -> getTimestamp(); 

 

            if (!(isset($this -> session -> userdata['isAdmin']) && ($this -> session -> userdata['isAdmin']))) { 

                $this -> load -> model('VisitModel'); 

                $this -> VisitModel -> addVisit($this -> session -> userdata('userID'), session_id(), $bookID, $timestamp); 

            } 

 

            $this -> load -> model('BookModel'); 

            $data['bookDetails'] = $this -> BookModel -> getBookByID($bookID); 

 

            $data['viewedCount'] = $this -> getBookViewCount($bookID); 

            $data['visitorsCount'] = $this -> getBookViewUserCount($bookID); 

            $data['lastViewedDate'] = $this -> getBookLastView($bookID); 

 

            $this -> load -> view('partials/header'); 

            $this -> load -> view('BookDetailsView', $data); 

            $this -> load -> view('partials/footer'); 

        } 

 

        //function to get book viewed count data 

        public function getBookViewCount($bookID) { 

 

            $this -> load -> model('VisitModel'); 

            $viewedCount = $this -> VisitModel -> getBookViewCount($bookID); 

 

            return $viewedCount; 

        } 

 

        //function to get user count for the book 

        public function getBookViewUserCount($bookID) { 

 

            $this -> load -> model('VisitModel'); 

            $userCount = $this -> VisitModel -> getBookViewUserCount($bookID); 

            return $userCount; 

        } 

 

        //function to get user last book viewed date 

        public function getBookLastView($bookID) { 

 

            $this -> load -> model('VisitModel'); 

            $bookDetails = $this -> VisitModel -> getBookLastView($bookID); 

 

            if ($bookDetails != NULL) { 

                $viewedDate = date('Y-M-d H:i:s', $bookDetails -> timestamp); 

            } else { 

                $viewedDate = 'N/A'; 

            } 

            return $viewedDate; 

        } 

    } 

 

    ?> 

 

 

CartController.php 

 

This controller handle  cart related logics such as add to cart , update cart and view cart 

 

<?php 

class CartController extends CI_Controller { 

 

        public function addBookToCart() { 

 

            $data = array( 

 

                'id'      => $this -> input -> post('bookID'), 

                'qty'     => $this -> input -> post('qty'), 

                'price'   => $this -> input -> post('bookPrice'), 

                'name'    => $this -> input -> post('bookTitle'), 

 

            ); 

 

            $this -> cart -> insert($data); 

 

            // $this->cart->destroy(); 

 

            redirect($this -> input -> post('redirectTo'), 'location'); 

 

        } 

 

        public function viewCart() { 

 

            $this -> load -> view('partials/header'); 

            $this -> load -> view('CartView'); 

            $this -> load -> view('partials/footer'); 

 

        } 

 

        public function updateQty($option, $cartRow) { 

 

            $newQty = 0; 

            if ($option === 'increment') { 

                $newQty = $this -> cart -> get_item($cartRow)['qty'] + 1; 

            } else if ($option === 'decrement') { 

                $newQty = $this -> cart -> get_item($cartRow)['qty'] - 1; 

            } else if ($option === 'remove') { 

                $newQty = 0; 

            } 

 

            $data = array( 

                'rowid' => $cartRow, 

                'qty'   => $newQty 

            ); 

 

            $this -> cart -> update($data); 

 

            $this -> load -> view('partials/header'); 

            $this -> load -> view('CartView'); 

            $this -> load -> view('partials/footer'); 

        } 

 

    } 

 

    ?> 

 

 

CategoryBookController.php 

 

<?php 

class CategoryBookController extends CI_Controller { 

 
 

        public function __construct() { 

            parent:: __construct(); 

             

            $this -> load -> model('BookModel'); 

            $this -> load -> model('CategoryModel'); 

        } 

 
 

        public function loadPaginatedBooks() { 

 

            $data['categoryBooks'] = $this -> BookModel -> getBooksByCategory($categoryID) -> result(); 

            $data['category'] = $this -> CategoryModel -> getCategoryByID($categoryID); 

 

            $this -> load -> view('partials/header'); 

            $this -> load -> view('CategoryBookView', $data); 

            $this -> load -> view('partials/footer'); 

        } 

 

        public function categoryBooks($categoryID) { 

 

            $config = array(); 

            $config["base_url"] = base_url(). "CategoryBookController/categoryBooks/".$categoryID; 

            $config["total_rows"] = $this -> BookModel -> booksPerCategory($categoryID); 

            $config["per_page"] = 8; 

            $config["uri_segment"] = 4; 

            $config['attributes'] = array('class' => ' page-item page-link'); 

 

            $this -> pagination -> initialize($config); 

 

            $page = ($this -> uri -> segment(4)) ? $this -> uri -> segment(4) : 0; 

            $data["categoryBooks"] = $this -> BookModel -> fetchBooksByCategory($config["per_page"], $page, $categoryID); 

            $data['category'] = $this -> CategoryModel -> getCategoryByID($categoryID); 

 

            $data["links"] = $this -> pagination -> create_links(); 

 

            $this -> load -> view('partials/header'); 

            $this -> load -> view('CategoryBookView', $data); 

            $this -> load -> view('partials/footer'); 

 

        } 

    } 

 

    ?> 

 

 

HomeController.php 

 

This controller for load home page and display categories  

<?php 

class HomeController extends CI_Controller { 

        public function index() { 

 

            $this -> load -> model('CategoryModel'); 

            $data['allCategory'] = $this -> CategoryModel -> getAllCategory() -> result(); 

 

            $this -> load -> view('partials/header'); 

            $this -> load -> view('HomeView', $data); 

            $this -> load -> view('partials/footer'); 

        } 

 

        public function search() { 

 

            $searchKeyword = $this -> input -> post('search'); 

            $data['searchKeyword'] = $searchKeyword; 

            $this -> load -> model('BookModel'); 

            $data['searchResult'] = $this -> BookModel -> getSearchResult($searchKeyword); 

            $this -> load -> view('partials/header'); 

            $this -> load -> view('SearchView', $data); 

            $this -> load -> view('partials/footer'); 

 

        } 

    } 

 

    ?> 

 

 

LoginController.php 

 

This controller manipulate admin authentication actions 

<?php 

class LoginController extends CI_Controller { 

 

        public function __construct() { 

            parent:: __construct(); 

 

            // Load MODEL 

            $this -> load -> model('AdminModel'); 

        } 

 

        public function index() { 

 

            $this -> load -> view('partials/header'); 

            $this -> load -> view('LoginView'); 

            $this -> load -> view('partials/footer'); 

        } 

 

        public function adminLogin() { 

 

            $this -> form_validation -> set_rules('username', 'Username', 'trim|required'); 

            $this -> form_validation -> set_rules('password', 'Password', 'trim|required'); 

 

            if ($this -> form_validation -> run() == FALSE) { 

                // if(isset($this->session->userdata['logged_in'])){ 

                // $this->load->view('admin_page'); 

                // }else{ 

                $this -> load -> view('partials/header'); 

                $this -> load -> view('LoginView'); 

                $this -> load -> view('partials/footer'); 

                // } 

                // echo "validation error"; 

            } else { 

                $data = array( 

                    'username' => $this -> input -> post('username'), 

                    'password' => $this -> input -> post('password') 

                ); 

                $result = $this -> AdminModel -> authAdmin($data); 

                if ($result == TRUE) { 

 

                    $username = $this -> input -> post('username'); 

                    $result = $this -> AdminModel -> adminData($username); 

                    if ($result != false) { 

                        $session_data = array( 

                            'firstname' => $result[0] -> firstname, 

                            'lastname' => $result[0] -> lastname 

                        ); 

 

                        $this -> session -> set_userdata('adminData', $session_data); 

                        $this -> session -> set_userdata('isAdmin', true); 

 

                        redirect('AdminController', 'location'); 

 

                    } 

                } else { 

                    $data = array( 

                        'error_message' => 'Invalid Username or Password' 

                    ); 

                    // $this->load->view('login_form', $data); 

                    $this -> load -> view('partials/header'); 

                    $this -> load -> view('LoginView', $data); 

                    $this -> load -> view('partials/footer'); 

 

                } 

            } 

 

        } 

 

        public function logOut() { 

 

            // Removing session data 

            $sess_array = array( 

                'username' => '' 

            ); 

            $this -> session -> unset_userdata('adminData', $sess_array); 

            $this -> session -> set_userdata('isAdmin', false); 

            // $data['message_display'] = 'Successfully Logout'; 

            // $this->load->view('login_form', $data); 

            redirect("HomeController", 'location'); 

        } 

 

    } 

 

    ?> 

 

 

 

Appendix – B (Views) 

 

AdminView.php 

 

This generate admin panel to add new categories and add new books to data base for admin 

<div style="    padding: 0px; 

    margin: 0px;" class="container-fluid"> 

  <div style='min-height: calc(100vh - 5.6vh);justify-content: center;    padding: 0px; 

    margin: 0px;' class="row"> 

 

    <div style="padding-top: 10%; padding-bottom: 8%;" class="col-lg-8 col-md-10"> 

 

      <!--Form without header--> 

      <div style="padding: 90px 20% 90px 20%" class="card"> 

        <div class="accordion md-accordion" id="accordionEx" role="tablist" aria-multiselectable="true"> 

 

          <!-- Accordion card --> 

          <div class="card"> 

 

            <!-- Card header --> 

            <div class="card-header" role="tab" id="headingOne1"> 

              <a data-toggle="collapse" data-parent="#accordionEx" href="#collapseOne1" aria-expanded="false" 

                aria-controls="collapseOne1" class="collapsed"> 

                <h5 class="mb-0"> 

                  Add new Category 

                  <i class="fa fa-angle-down rotate-icon"></i> 

                </h5> 

              </a> 

            </div> 

 

            <!-- Card body --> 

            <div id="collapseOne1" class="collapse" role="tabpanel" aria-labelledby="headingOne1" data-parent="#accordionEx" 

              style=""> 

              <div class="card-body"> 

                <section class="section"> 

 

                  <!-- Horizontal material form --> 

                  <?php echo validation_errors(); ?> 

                  <?php echo form_open_multipart('AdminController/validateNewCategory') ?> 

                  <!-- Grid row --> 

                  <div class="form-group row"> 

                    <!-- Material input --> 

                    <label for="name" class="col-sm-4 col-form-label">Category Name</label> 

                    <div class="col-sm-8"> 

                      <div class="md-form"> 

                        <input id="input-char-counter" name="cName" type="text" length="100" class="form-control"> 

                        <label for="input-char-counter">ex: comic/Biography</label> 

                      </div> 

                    </div> 

                  </div> 

                  <!-- Grid row --> 

 

                  <!-- Grid row --> 

                  <div class="form-group row"> 

                    <!-- Material input --> 

                    <label for="inputPassword3MD" class="col-sm-4 col-form-label">Category Description</label> 

                    <div class="col-sm-8"> 

                      <div class="md-form"> 

                        <textarea name="cDescription" id="textarea-char-counter" class="form-control md-textarea" 

                          length="2000" rows="3"></textarea> 

                        <label for="textarea-char-counter">Type your text</label> 

                      </div> 

                    </div> 

                  </div> 

                  <!-- Grid row --> 

 

                  <!-- Grid row --> 

                  <div class="form-group row"> 

                    <!-- Material input --> 

                    <label for="inputPassword3MD" class="col-sm-4 col-form-label">Category Cover Photo</label> 

                    <div class="col-sm-8"> 

                      <div class="input-group"> 

                        <div class="input-group-prepend"> 

                          <span class="input-group-text" id="inputGroupFileAddon01">Upload</span> 

                        </div> 

                        <div class="custom-file"> 

                          <input type="file" class="custom-file-input" name="userfile" id="inputGroupFile01" 

                            aria-describedby="inputGroupFileAddon01"> 

                          <label class="custom-file-label" for="inputGroupFile01">Choose file</label> 

                        </div> 

                      </div> 

                    </div> 

                  </div> 

                  <!-- Grid row --> 

 

                  <!-- Grid row --> 

                  <div class="form-group row"> 

                    <div class="col-sm-10"> 

                      <button type="submit" class="btn btn-primary btn-md waves-effect waves-light">add</button> 

                    </div> 

                  </div> 

                  <!-- Grid row --> 

                  <?php echo form_close('') ?> 

                  <!-- Horizontal material form --> 

 

                </section> 

              </div> 

            </div> 

          </div> 

          <!-- Accordion card --> 

 

          <!-- Accordion card --> 

          <div class="card"> 

 

            <!-- Card header --> 

            <div class="card-header" role="tab" id="headingTwo2"> 

              <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx" href="#collapseTwo2" aria-expanded="false" 

                aria-controls="collapseTwo2"> 

                <h5 class="mb-0"> 

                  Add new Book 

                  <i class="fa fa-angle-down rotate-icon"></i> 

                </h5> 

              </a> 

            </div> 

 

            <!-- Card body --> 

            <div id="collapseTwo2" class="collapse" role="tabpanel" aria-labelledby="headingTwo2" data-parent="#accordionEx"> 

              <div class="card-body"> 

 

                <section class="section"> 

 

                  <!-- Horizontal material form --> 

                  <?php echo validation_errors(); ?> 

                  <?php echo form_open_multipart('AdminController/validateNewBook') ?> 

                  <!-- Grid row --> 

                  <div class="form-group row"> 

                    <!-- Material input --> 

                    <label for="name" class="col-sm-4 col-form-label">Book Title</label> 

                    <div class="col-sm-8"> 

                      <div class="md-form"> 

                        <input id="input-char-counter" name="bTitle" type="text" length="100" class="form-control"> 

                        <label for="input-char-counter">enter book title</label> 

                      </div> 

                    </div> 

                  </div> 

                  <!-- Grid row --> 

 

                  <!-- Grid row --> 

                  <div class="form-group row"> 

                    <!-- Material input --> 

                    <label for="inputPassword3MD" class="col-sm-4 col-form-label">Book Description</label> 

                    <div class="col-sm-8"> 

                      <div class="md-form"> 

                        <textarea name="bDescription" id="textarea-char-counter" class="form-control md-textarea" 

                          length="2000" rows="3"></textarea> 

                        <label for="textarea-char-counter">do not exceed 1000 characters</label> 

                      </div> 

                    </div> 

                  </div> 

                  <!-- Grid row --> 

 

                  <!-- Grid row --> 

                  <div class="form-group row"> 

                    <!-- Material input --> 

                    <label for="name" class="col-sm-4 col-form-label">Book Author</label> 

                    <div class="col-sm-8"> 

                      <div class="md-form"> 

                        <input id="input-char-counter" name="bAuthor" type="text" length="100" class="form-control"> 

                        <label for="input-char-counter">enter book Author name</label> 

                      </div> 

                    </div> 

                  </div> 

                  <!-- Grid row --> 

 

                  <!-- Grid row --> 

                  <div class="form-group row"> 

                    <!-- Material input --> 

                    <label for="name" class="col-sm-4 col-form-label">Book Price</label> 

                    <div class="col-sm-8"> 

                      <div class="md-form"> 

                        <input id="input-char-counter" name="bPrice" type="text" length="100" class="form-control"> 

                        <label for="input-char-counter">enter book Price</label> 

                      </div> 

                    </div> 

                  </div> 

                  <!-- Grid row --> 

 

                  <!-- Grid row --> 

                  <div class="form-group row"> 

                    <!-- Material input --> 

                    <label for="name" class="col-sm-4 col-form-label">Book Rating</label> 

                    <div class="col-sm-8"> 

                      <div class="d-flex justify-content-center my-4"> 

                        <span class="font-weight-bold indigo-text mr-2 mt-1">0</span> 

 

                        <input class="border-0" name="bRating" type="range" min="0" max="5" /> 

 

                        <span class="font-weight-bold indigo-text ml-2 mt-1">5</span> 

                      </div> 

                    </div> 

                  </div> 

                  <!-- Grid row --> 

 

                  <!-- Grid row --> 

                  <div class="form-group row"> 

                    <!-- Material input --> 

                    <label for="name" class="col-sm-4 col-form-label">Book Category</label> 

                    <div class="col-sm-8"> 

                      <select name="bCategory" class="browser-default custom-select"> 

                        <option selected>Open this select menu</option> 

                        <?php foreach($categories as $category) { ?> 

                        <option value=<?php echo $category->categoryID; ?>> 

                          <?php echo $category->categoryName; ?> 

                        </option> 

                        <?php } ?> 

                      </select> 

                    </div> 

                  </div> 

                  <!-- Grid row --> 

 

                  <!-- Grid row --> 

                  <div class="form-group row"> 

                    <!-- Material input --> 

                    <label for="inputPassword3MD" class="col-sm-4 col-form-label">Category Cover Photo</label> 

                    <div class="col-sm-8"> 

                      <div class="input-group"> 

                        <div class="input-group-prepend"> 

                          <span class="input-group-text" id="inputGroupFileAddon01">Upload</span> 

                        </div> 

                        <div class="custom-file"> 

                          <input type="file" class="custom-file-input" name="userfile" id="inputGroupFile01" 

                            aria-describedby="inputGroupFileAddon01"> 

                          <label class="custom-file-label" for="inputGroupFile01">Choose file</label> 

                        </div> 

                      </div> 

                    </div> 

                  </div> 

                  <!-- Grid row --> 

 

                  <!-- Grid row --> 

                  <div class="form-group row"> 

                    <div class="col-sm-10"> 

                      <button type="submit" class="btn btn-primary btn-md waves-effect waves-light">add</button> 

                    </div> 

                  </div> 

                  <!-- Grid row --> 

                  <?php echo form_close('') ?> 

                  <!-- Horizontal material form --> 

 

                </section> 

 

              </div> 

            </div> 

          </div> 

          <!-- Accordion card --> 

 

        </div> 

      </div> 

    </div> 

  </div> 

 

BookDetailsView.php 

 

This view generate details about individual book and add to cart features , also display recommended books and admin allow to view book visit statistics  

<!--Main layout--> 

<main style="    min-height: calc(100vh - 41.1vh);" class="mt-5 pt-4"> 

  <div class="container dark-grey-text mt-5"> 

 

    <!--Grid row--> 

    <div class="row wow fadeIn"> 

 

      <!--Grid column--> 

      <div style="text-align: center; padding-top: 5%;" class="col-md-6 mb-4"> 

 

        <img src="<?php echo base_url(); ?>application/libraries/img/bookcovers/<?php echo $bookDetails->bookID; ?>.jpg" 

          class="img-fluid" alt=""> 

 

      </div> 

      <!--Grid column--> 

 

      <!--Grid column--> 

      <div class="col-md-6 mb-4"> 

 

        <!--Content--> 

        <div class="p-4"> 

 

          <div class="mb-3"> 

            <a href="<?php echo base_url(); ?>CategoryBookController/categoryBooks/<?php echo $bookDetails->categoryID; ?>"> 

              <span class="badge purple mr-1"> 

                <?php echo $bookDetails->categoryName; ?></span> 

            </a> 

            <a href=""> 

              <span class="badge blue mr-1">New</span> 

            </a> 

            <a href=""> 

              <span class="badge red mr-1">Bestseller</span> 

            </a> 

          </div> 

 

          <h3 class="secondary-heading font-weight-bold"> 

            <?php echo $bookDetails->bookTitle; ?> 

          </h3> 

          <div style="display:flex"> 

            <h5 style="padding-left:1em" class="secondary-heading">- by 

              <?php echo $bookDetails->author; ?> 

            </h5> 

            <!--Rating--> 

            <ul style="color: #ffa000; list-style-type: none; padding: 0; margin-left: 10px;" class="rating"> 

              <?php $x = 1; while($x <= $bookDetails->rating) { ?> 

              <li style="display: inline-block;"> 

                <i class="fa fa-star"></i> 

              </li> 

              <?php $x++; } ?> 

 

              <?php $y = 1; while($y <= 5 - $bookDetails->rating) { ?> 

              <li style="display: inline-block;"> 

                <i class="fa fa-star-o"></i> 

              </li> 

              <?php $y++; } ?> 

            </ul> 

            <!--Rating--> 

 

          </div> 

          <!-- <h5 class="font-weight-bold mt-3"><?php echo $bookDetails->bookTitle; ?></h5> --> 

 

          <p class="lead"> 

            <span class="mr-1"> 

              <del>$ 

                <?php echo $bookDetails->bookPrice + 10; ?></del> 

            </span> 

            <span>$ 

              <?php echo $bookDetails->bookPrice; ?></span> 

          </p> 

 

          <!-- <p class="lead font-weight-bold">Description</p> --> 

 

          <p> 

            <?php echo $bookDetails->bookDescription; ?> 

          </p> 

          <?php if (isset($this->session->userdata['isAdmin']) && ($this->session->userdata['isAdmin'])) { ?> 

 

          <div class="accordion md-accordion" id="accordionEx" role="tablist" aria-multiselectable="true"> 

 

            <!-- Accordion card --> 

            <div class="card"> 

 

              <!-- Card header --> 

              <div class="card-header" role="tab" id="headingOne1"> 

                <a data-toggle="collapse" data-parent="#accordionEx" href="#collapseOne1" aria-expanded="false" 

                  aria-controls="collapseOne1" class="collapsed"> 

                  <h5 class="mb-0"> 

                    Visitor Statistics 

                    <i class="fa fa-angle-down rotate-icon"></i> 

                  </h5> 

                </a> 

              </div> 

 

              <!-- Card body --> 

              <div id="collapseOne1" class="collapse" role="tabpanel" aria-labelledby="headingOne1" data-parent="#accordionEx" 

                style=""> 

                <div class="card-body"> 

                  <ul style="font-size:20px" class="list-group"> 

                    <li style="    border: none;" class="list-group-item d-flex justify-content-between align-items-center"> 

                      Total Visits 

                      <span class="badge badge-primary badge-pill"> 

                        <?php echo $viewedCount;  ?> </span> 

                    </li> 

                    <li style="    border: none;" class="list-group-item d-flex justify-content-between align-items-center"> 

                      visitor Count 

                      <span class="badge badge-primary badge-pill"> 

                        <?php echo $visitorsCount ; ?></span> 

                    </li> 

                    <li style="    border: none;" class="list-group-item d-flex justify-content-between align-items-center"> 

                      Last Visit 

                      <span class="badge badge-primary badge-pill"> 

                        <?php echo $lastViewedDate;  ?></span> 

                    </li> 

                  </ul> 

 

                </div> 

              </div> 

            </div> 

            <!-- Accordion card --> 

          </div> 

 

          <?php }else { ?> 

 

          <?php $attributes = array('class' => 'd-flex justify-content-left'); $hidden = array('bookID' => $bookDetails->bookID, 'bookPrice' => $bookDetails->bookPrice, 'bookTitle' => $bookDetails->bookTitle, 'redirectTo' => 'BookDetailsController/BookDetails/'.$bookDetails->bookID); 

                echo form_open('CartController/addBookToCart', $attributes, $hidden);  ?> 

 

          <!-- Default input --> 

          <input type="number" value="1" min="1" aria-label="Search" name="qty" class="form-control" style="width: 100px"> 

 

          <button class="btn btn-primary btn-md my-0 p" type="submit">Add to cart 

            <i class="fa fa-shopping-cart ml-1"></i> 

          </button> 

 

          <?php echo form_close() ?> 

 

          <?php } ?> 

        </div> 

        <!--Content--> 

 

      </div> 

      <!--Grid column--> 

 

    </div> 

    <!--Grid row--> 

 

    <hr> 

 

    <!--Grid row--> 

    <div class="row d-flex justify-content-center wow fadeIn"> 

 

      <?php if($recomendBook){ ?> 

      <!--Grid column--> 

      <div class="col-md-6 text-center"> 

 

        <h4 class="my-4 h4">Readers Who Viewed This Book Also Viewed</h4> 

 

        <p></p> 

 

      </div> 

      <!--Grid column--> 

      <?php }?> 

    </div> 

    <!--Grid row--> 

 

    <!--Grid row--> 

    <div style="justify-content: center;" class="row wow fadeIn"> 

 

      <?php $i = 0; foreach($recomendBook as $recomendation) { ?> 

 

      <?php if(!($recomendation->bookID === $currentBook) && $i<5){ $i++; ?> 

 

      <!--Grid column--> 

      <div class="col-lg-2 col-md-4 mb-2"> 

 

        <!--Card--> 

        <div style="    min-height: 422px;" class="card wow fadeIn"> 

 

          <!--Card image--> 

          <div style="padding:5px" class="view overlay"> 

            <img style="min-width:160px ; min-height: 250px;" src="<?php echo base_url(); ?>application/libraries/img/bookcovers/<?php echo $recomendation->bookID; ?>.jpg" 

              class="card-img-top" alt=""> 

            <a href="<?php echo base_url(); ?>BookDetailsController/BookDetails/<?php echo $recomendation->bookID; ?>"> 

              <div class="mask rgba-white-slight"></div> 

            </a> 

          </div> 

          <!--Card image--> 

          <!--Card content--> 

          <div style="padding: 10px!important;" class="card-body text-center"> 

            <!--Category & Title--> 

            <h5> 

              <strong> 

                <a style="overflow: hidden; 

                    display: -webkit-box; 

                    -webkit-line-clamp: 2; 

                    -webkit-box-orient: vertical;" 

                  href="<?php echo base_url(); ?>BookDetailsController/BookDetails/<?php echo $recomendation->bookID; ?>" 

                  class="dark-grey-text"> 

                  <?php echo $recomendation->bookTitle; ?> 

                  <span class="badge badge-pill danger-color">NEW</span> 

                </a> 

              </strong> 

            </h5> 

 

            <!--Rating--> 

            <ul style="color: #ffa000; list-style-type: none; padding: 0;" class="rating"> 

              <!-- foreach($categoryBooks as $recomendation) {  --> 

              <?php $x = 1; while($x <= $recomendation->rating) { ?> 

              <li style="display: inline-block;"> 

                <i class="fa fa-star"></i> 

              </li> 

              <?php $x++; } ?> 

 

              <?php $x = 1; while($x <= 5 - $recomendation->rating) { ?> 

              <li style="display: inline-block;"> 

                <i class="fa fa-star-o"></i> 

              </li> 

              <?php $x++; } ?> 

            </ul> 

            <!--Rating--> 

 

            <!-- Card footer --> 

            <div style="background-color: transparent;    display: flex;" class="card-footer px-1"> 

              <span class="float-left font-weight-bold"> 

                <strong> 

                  <?php echo $recomendation->bookPrice; ?>$</strong> 

              </span> 

              <?php if (isset($this->session->userdata['isAdmin']) && ($this->session->userdata['isAdmin'])) { ?> 

 

              <?php }else{ ?> 

              <?php $hidden = array('bookID' => $recomendation->bookID, 'bookPrice' => $recomendation->bookPrice, 'bookTitle' => $recomendation->bookTitle, 'redirectTo' => 'CategoryBookController/categoryBooks/'.$recomendation->categoryID); 

                echo form_open('CartController/addBookToCart', '', $hidden);  ?> 

              <span style="display:flex" class="float-right"> 

                <input type="number" min="1" value="1" aria-label="Search" name="qty" class="form-control" style="width: 45px; padding: 5px 0px 5px 8px; height: 25px; margin-left: 15px;"> 

                <button style="margin: 0px; padding: 0px; background: none!important; box-shadow: 0px 0px 0px transparent; border: 0px solid transparent; text-shadow: 0px 0px 0px transparent; cursor: pointer;" 

                  type="submit"><i sttyle="font-size: 17px;" class="fa fa-shopping-cart grey-text ml-3"></i></button> 

              </span> 

              <?php echo form_close() ?> 

              <?php } ?> 

            </div> 

 

          </div> 

          <!--Card content--> 

 

        </div> 

        <!--Card--> 

 

      </div> 

      <!--Grid column--> 

 

      <?php  } ?> 

      <?php  } ?> 

 

    </div> 

    <!--Grid row--> 

 

  </div> 

</main> 

<!--Main layout--> 

 

CartView.php 

 

This view display items that added to the cart by users and allow to edit the cart items  

<main style="min-height: calc(100vh - 14.1vh);" class="mt-5 pt-4"> 

 

  <!-- Main Container --> 

  <div class="container cart-v1"> 

 

    <section class="section my-5 pb-5"> 

 

      <!-- Shopping Cart table --> 

 

      <?php if($this->cart->contents()){ ?> 

 

      <div class="table-responsive"> 

 

        <table class="table product-table"> 

 

          <!-- Table head --> 

          <thead> 

            <tr> 

              <th></th> 

              <th class="font-weight-bold"> 

                <strong>Book</strong> 

              </th> 

              <th></th> 

              <th class="font-weight-bold"> 

                <strong>Price</strong> 

              </th> 

              <th class="font-weight-bold"> 

                <strong>QTY</strong> 

              </th> 

              <th class="font-weight-bold"> 

                <strong>Amount</strong> 

              </th> 

              <th></th> 

            </tr> 

          </thead> 

          <!-- /.Table head --> 

          <!-- Table body --> 

          <tbody> 

            <!-- item loop --> 

            <?php $i = 1; ?> 

            <?php foreach($this->cart->contents() as $book) { ?> 

            <?php echo form_hidden($i.'[rowid]', $book['rowid']); ?> 

            <tr> 

              <th scope="row"> 

                <img src="<?php echo base_url(); ?>application/libraries/img/bookcovers/<?php echo $book['id']; ?>.jpg" 

                  alt="" class="img-fluid z-depth-0"> 

              </th> 

              <td> 

                <h5 class="mt-3"> 

                  <strong> 

                    <?php echo $book['name']; ?></strong> 

                </h5> 

                <p class="text-muted">show category</p> 

              </td> 

              <td></td> 

              <td>$ 

                <?php echo $this->cart->format_number($book['price']); ?> 

              </td> 

              <td class="text-center text-md-left"> 

                <span class="qty"> 

                  <?php echo $book['qty']; ?> </span> 

                <div class="btn-group ml-2"> 

                  <button onclick="window.location='<?php echo base_url() ?>CartController/updateQty/decrement/<?php echo $book['rowid']; ?>'" 

                    class="btn btn-sm btn-primary btn-rounded waves-effect waves-light">—</button> 

                  <button onclick="window.location='<?php echo base_url() ?>CartController/updateQty/increment/<?php echo $book['rowid']; ?>'" 

                    class="btn btn-sm btn-primary btn-rounded waves-effect waves-light">+</button> 

                </div> 

              </td> 

              <td class="font-weight-bold"> 

                <strong>$ 

                  <?php echo $this->cart->format_number($book['subtotal']); ?></strong> 

              </td> 

              <td> 

                <button onclick="window.location='<?php echo base_url() ?>CartController/updateQty/remove/<?php echo $book['rowid']; ?>'" 

                  type="button" class="btn btn-sm btn-primary waves-effect waves-light" data-toggle="tooltip" 

                  data-placement="top" title="" data-original-title="Remove item">X 

                </button> 

              </td> 

            </tr> 

            <?php } ?> 

            <!-- /.item loop --> 

 

            <!-- Fourth row --> 

            <tr> 

              <td colspan="3"></td> 

              <td> 

                <h4 class="mt-2"> 

                  <strong>Total</strong> 

                </h4> 

              </td> 

              <td class="text-right"> 

                <h4 class="mt-2"> 

                  <strong>$ 

                    <?php echo $this->cart->format_number($this->cart->total()); ?></strong> 

                </h4> 

              </td> 

              <td colspan="3" class="text-right"> 

                <button type="button" class="btn btn-primary btn-rounded waves-effect waves-light">Complete purchase 

                  <i class="fa fa-angle-right right"></i> 

                </button> 

              </td> 

            </tr> 

            <!-- Fourth row --> 

 

          </tbody> 

          <!-- /.Table body --> 

 

        </table> 

 

      </div> 

 

      <!-- Shopping Cart table --> 

      <?php }else{ ?> 

 

      <h3 style="text-align:center" class="h3-responsive font-weight-bold my-5">--------cart is empty,-------</h3> 

      <?php }?> 

 

    </section> 

 

  </div> 

  <!-- /Main Container --> 

</main> 

 

CategoryBookView.php 

 

This view display books under particular category with pagination , this view also allow to add to cart functionalities  

<section style="margin-top: 12vh!important;    min-height: calc(100vh - 41.1vh);" class="team-section text-center my-5"> 

 

  <!-- Section heading --> 

  <h2 class="h1-responsive font-weight-bold my-5"> 

    <?php echo $category->categoryName ;?> Genre</h2> 

  <!-- Section heading --> 

 

  <!-- Section description --> 

  <p class="grey-text w-responsive mx-auto mb-5"> 

    <?php echo $category->categoryDescription ;?> 

  </p> 

  <!-- Section description --> 

  <!--Main layout--> 

  <main> 

    <div class="container"> 

 

      <!--Section: Products v.3--> 

      <section class="text-center mb-4"> 

 

        <!--Grid row--> 

        <div class="row wow fadeIn"> 

          <?php  if($categoryBooks){ ?> 

          <?php foreach($categoryBooks as $book) { ?> 

          <!--Grid column--> 

          <div class="col-lg-3 col-md-6 mb-4"> 

 

            <!--Card--> 

            <div class="card wow fadeIn"> 

 

              <!--Card image--> 

              <div style="padding:5px" class="view overlay"> 

                <img src="<?php echo base_url(); ?>application/libraries/img/bookcovers/<?php echo $book->bookID; ?>.jpg" 

                  class="card-img-top" alt=""> 

                <a href="<?php echo base_url(); ?>BookDetailsController/BookDetails/<?php echo $book->bookID; ?>"> 

                  <div class="mask rgba-white-slight"></div> 

                </a> 

              </div> 

              <!--Card image--> 

 

              <!--Card content--> 

              <div class="card-body text-center"> 

                <!--Category & Title--> 

                <!-- <a href="" class="grey-text"> 

                  <h5><?php echo $book->categoryName; ?></h5> 

                </a> --> 

                <h5> 

                  <strong> 

                    <a style="overflow: hidden; 

                    display: -webkit-box; 

                    -webkit-line-clamp: 2; 

                    -webkit-box-orient: vertical;" 

                      href="<?php echo base_url(); ?>BookDetailsController/BookDetails/<?php echo $book->bookID; ?>" 

                      class="dark-grey-text"> 

                      <?php echo $book->bookTitle; ?> 

                      <span class="badge badge-pill danger-color">NEW</span> 

                    </a> 

                  </strong> 

                </h5> 

 

                <!-- <h4 class="font-weight-bold blue-text"> 

                  <strong><?php echo $book->bookPrice; ?>$</strong> 

                </h4> --> 

 

                <!--Rating--> 

                <ul style="color: #ffa000; list-style-type: none; padding: 0;" class="rating"> 

                  <!-- foreach($categoryBooks as $book) {  --> 

                  <?php $x = 1; while($x <= $book->rating) { ?> 

                  <li style="display: inline-block;"> 

                    <i class="fa fa-star"></i> 

                  </li> 

                  <?php $x++; } ?> 

 

                  <?php $x = 1; while($x <= 5 - $book->rating) { ?> 

                  <li style="display: inline-block;"> 

                    <i class="fa fa-star-o"></i> 

                  </li> 

                  <?php $x++; } ?> 

                </ul> 

                <!--Rating--> 

 

                <!-- Card footer --> 

                <div style="background-color: transparent;" class="card-footer px-1"> 

                  <span class="float-left font-weight-bold"> 

                    <strong> 

                      <?php echo $book->bookPrice; ?>$</strong> 

                  </span> 

                  <?php if (isset($this->session->userdata['isAdmin']) && ($this->session->userdata['isAdmin'])) { ?> 

 

                  <?php }else{ ?> 

                  <?php $hidden = array('bookID' => $book->bookID, 'bookPrice' => $book->bookPrice, 'bookTitle' => $book->bookTitle, 'redirectTo' => 'CategoryBookController/categoryBooks/'.$book->categoryID); 

                echo form_open('CartController/addBookToCart', '', $hidden);  ?> 

                  <span style="display:flex" class="float-right"> 

                    <input type="number" min="1" value="1" aria-label="Search" name="qty" class="form-control" style="width: 45px; padding: 5px 0px 5px 8px; height: 25px; margin-left: 15px;"> 

                    <button style="margin: 0px; padding: 0px; background: none!important; box-shadow: 0px 0px 0px transparent; border: 0px solid transparent; text-shadow: 0px 0px 0px transparent; cursor: pointer;" 

                      type="submit"><i sttyle="font-size: 17px;" class="fa fa-shopping-cart grey-text ml-3"></i></button> 

                  </span> 

                  <?php echo form_close() ?> 

                  <?php } ?> 

                </div> 

 

              </div> 

              <!--Card content--> 

 

            </div> 

            <!--Card--> 

 

          </div> 

          <!--Grid column--> 

          <?php } ?> 

 

          <?php }else{ ?> 

          <p class="grey-text w-responsive mx-auto mb-5">-------sorry!, no books under this genre------</p> 

          <?php } ?> 

 

        </div> 

        <!--Grid row--> 

 

      </section> 

      <!--Section: Products v.3--> 

 

      <!--Pagination--> 

      <nav class="d-flex justify-content-center wow fadeIn"> 

        <ul class="pagination pg-blue"> 

          <?php echo $links; ?> 

        </ul> 

      </nav> 

      <!--Pagination--> 

 

    </div> 

  </main> 

  <!--Main layout--> 

</section> 

 

 

HomeView.php 

 

This view allow user to browse books under categories  

<!DOCTYPE html> 

<html lang="en"> 

 

<head> 

  <style> 

    .view { 

      position: relative; 

      overflow: hidden; 

      cursor: default; 

    } 

 

    .view img, 

    .view video { 

      position: relative; 

      display: block; 

    } 

 

    .row { 

      display: -ms-flexbox; 

      display: flex; 

      -ms-flex-wrap: wrap; 

      flex-wrap: wrap; 

      margin-right: -15px; 

      margin-left: -15px; 

    } 

 

    .card { 

      position: relative; 

      display: -ms-flexbox; 

      display: flex; 

      -ms-flex-direction: column; 

      flex-direction: column; 

      min-width: 0; 

      word-wrap: break-word; 

      background-color: #fff; 

      background-clip: border-box; 

      border: 1px solid rgba(0, 0, 0, .125); 

      border-radius: .25rem; 

    } 

 

    .collection-card .stripe.dark { 

      background-color: rgba(0, 0, 0, .7); 

    } 

 

    .collection-card .stripe.light { 

      background-color: rgba(255, 255, 255, .7); 

    } 

 

    .collection-card .stripe { 

      position: absolute; 

      bottom: 3rem; 

      width: 100%; 

      text-align: center; 

      padding: 1.2rem; 

    } 

 

    .collection-card .stripe.dark a p { 

      color: #eee; 

    } 

 

    .collection-card .stripe.light a p { 

      color: #424242; 

    } 

 

    .collection-card .stripe a p { 

      padding: 0; 

      margin: 0; 

      letter-spacing: .25rem; 

    } 

  </style> 

</head> 

 

<body> 

 

  <!--Carousel Wrapper--> 

  <div id="carousel-example-1z" class="carousel slide carousel-fade pt-4" data-ride="carousel"> 

 

    <!--Indicators--> 

    <ol class="carousel-indicators"> 

      <li data-target="#carousel-example-1z" data-slide-to="0" class="active"></li> 

      <li data-target="#carousel-example-2z" data-slide-to="1"></li> 

      <li data-target="#carousel-example-3z" data-slide-to="2"></li> 

    </ol> 

    <!--/.Indicators--> 

 

    <!--Slides--> 

    <div class="carousel-inner" role="listbox"> 

 

      <!--First slide--> 

      <div class="carousel-item active"> 

        <div class="view" style="background-image: url('<?php echo base_url(); ?>assets/images/carousel/c1.jpg'); background-repeat: no-repeat; background-size: cover;"> 

 

          <!-- Mask & flexbox options--> 

          <div class="mask rgba-black-strong d-flex justify-content-center align-items-center"> 

 

            <!-- Content --> 

            <div class="text-center white-text mx-5 wow fadeIn"> 

              <h1 class="mb-4"> 

                <strong>LOOKING FOR YOUR NEXT READ?</strong> 

              </h1> 

 

              <!-- <p> 

                <strong>Best books from one roof</strong> 

              </p> --> 

 

              <p class="mb-4 d-none d-md-block"> 

                <strong>Get personalized recommendations based on books you already love</strong> 

              </p> 

 

            </div> 

            <!-- Content --> 

 

          </div> 

          <!-- Mask & flexbox options--> 

 

        </div> 

      </div> 

      <!--/First slide--> 

 

      <!--Second slide--> 

      <div class="carousel-item"> 

        <div class="view" style="background-image: url('<?php echo base_url(); ?>assets/images/carousel/c2.jpg'); background-repeat: no-repeat; background-size: cover;"> 

 

          <!-- Mask & flexbox options--> 

          <div class="mask rgba-black-strong d-flex justify-content-center align-items-center"> 

 

            <!-- Content --> 

            <div class="text-center white-text mx-5 wow fadeIn"> 

              <h1 class="mb-4"> 

                <strong>Find and win a another book FREE</strong> 

              </h1> 

 

              <p> 

                <strong>this offer valid only till november</strong> 

              </p> 

 

              <a target="_blank" href="#" class="btn btn-outline-white btn-lg">shop here 

                <i class="fa fa-graduation-cap ml-2"></i> 

              </a> 

            </div> 

            <!-- Content --> 

 

          </div> 

          <!-- Mask & flexbox options--> 

 

        </div> 

      </div> 

      <!--/Second slide--> 

 

      <!--Third slide--> 

      <div class="carousel-item"> 

        <div class="view" style="background-image: url('<?php echo base_url(); ?>assets/images/carousel/c3.jpg'); background-repeat: no-repeat; background-size: cover;"> 

 

          <!-- Mask & flexbox options--> 

          <div class="mask rgba-black-strong d-flex justify-content-center align-items-center"> 

 

            <!-- Content --> 

            <div class="text-center white-text mx-5 wow fadeIn"> 

              <h1 class="mb-4"> 

                <strong>LOOKING FOR YOUR NEXT READ?</strong> 

              </h1> 

 

              <p> 

                <strong>Get personalized recommendations based on books you already love</strong> 

              </p> 

            </div> 

            <!-- Content --> 

 

          </div> 

          <!-- Mask & flexbox options--> 

 

        </div> 

      </div> 

      <!--/Third slide--> 

 

    </div> 

    <!--/.Slides--> 

 

    <!--Controls--> 

    <a class="carousel-control-prev" href="#carousel-example-1z" role="button" data-slide="prev"> 

      <span class="carousel-control-prev-icon" aria-hidden="true"></span> 

      <span class="sr-only">Previous</span> 

    </a> 

    <a class="carousel-control-next" href="#carousel-example-1z" role="button" data-slide="next"> 

      <span class="carousel-control-next-icon" aria-hidden="true"></span> 

      <span class="sr-only">Next</span> 

    </a> 

    <!--/.Controls--> 

 

  </div> 

  <!--/.Carousel Wrapper--> 

 

  <!--Main layout--> 

  <main> 

    <div class="container"> 

 

      <!--Section: category--> 

      <section style="padding: 0px 30px 0px 30px;" class="text-center mb-4"> 

 

        <!--Grid row--> 

        <div class="row wow fadeIn"> 

          <?php $count = 0; foreach($allCategory as $Category) { ?> 

 

          <!--Grid column--> 

          <div style='margin-top:30px' class="col-lg-3 col-md-6 mb-lg-0 mb-4"> 

            <!-- Collection card --> 

            <div class="card collection-card z-depth-1-half card wow fadeIn"> 

              <!-- Card image --> 

              <div class="view zoom"> 

                <img src="<?php echo base_url(); ?>application/libraries/img/category/<?php echo $Category->categoryName; ?>.jpg" 

                  class="img-fluid" alt=""> 

                <?php echo '<div class="' . (++$count%2 ? "stripe dark" : "stripe light") . '">' ?> 

                <a href="<?php echo base_url(); ?>CategoryBookController/categoryBooks/<?php echo $Category->categoryID; ?>"> 

                  <p> 

                    <?php echo $Category->categoryName; ?> 

                    <i class="fa fa-angle-right"></i> 

                  </p> 

                </a> 

              </div> 

            </div> 

            <!-- Card image --> 

          </div> 

          <!-- Collection card --> 

        </div> 

        <!--Grid column--> 

        <?php } ?> 

 

    </div> 

    <!--Grid row--> 

 

    </section> 

    <!--Section: category --> 

 

    </div> 

  </main> 

  <!--Main layout--> 

</body> 

 

</html> 

 

LoginView.php 

 

This view allow admin to logged in to the web site this conatain the login page 

<div class="container-fluid"> 

    <div style='min-height: calc(100vh - 5.6vh);justify-content: center;' class="row"> 

 

        <div style="    padding-top: 12%; 

    padding-bottom: 8%;" class="col-lg-8 col-md-10"> 

 

            <!--Form without header--> 

            <div style="padding: 90px 20% 90px 20%" class="card"> 

                <div class="card-block"> 

 

                    <!--Header--> 

                    <div class="text-center"> 

                        <h3><i class="fa fa-lock"></i> &nbsp; Admin Login:</h3> 

                        <hr class="mt-2 mb-2"> 

                    </div> 

 

                    <!--Body--> 

                    <?php $attributes = array('style' => 'padding-top:100px');  ?> 

                    <?php echo validation_errors(); ?> 

                    <?php echo form_open('LoginController/adminLogin') ?> 

 

                    <?php echo "<div style='text-align: center; color: red;' class='error_msg'>"; 

        if (isset($error_message)) {echo $error_message; 

        }echo "</div>";?> 

 

                    <div class="md-form"> 

                        <i class="fa fa-envelope prefix"></i> 

                        <input type="text" name="username" id="form2" class="form-control"> 

                        <label for="form2">Admin email</label> 

                    </div> 

 

                    <div class="md-form"> 

                        <i class="fa fa-lock prefix"></i> 

                        <input type="password" name="password" id="form4" class="form-control"> 

                        <label for="form4">Admin password</label> 

                    </div> 

 

                    <div class="text-center"> 

                        <button type="submit" style="background:#20c997" class="btn btn-deep">Login</button> 

                    </div> 

 

                    <?php echo form_close() ?> 

 

                </div> 

 

            </div> 

            <!--/Form without header--> 

 

        </div> 

 

    </div> 

</div> 

 

SearchView.php 

 

This view display search result regarding the keyword user enter. And allow add to card and view book details  

<section style="margin-top: 12vh!important;     min-height: calc(100vh - 41.1vh);" class="team-section text-center my-5"> 

 

  <!-- Section heading --> 

  <div> 

    <?php if($searchResult) { ?> 

    <h4 class="h5-responsive  my-5">Showing results for *<b> 

        <?php echo $searchKeyword;?></b>*</h4> 

    <?php } else { ?> 

    <h4 class="h5-responsive  my-5"> No results for *<b> 

        <?php echo $searchKeyword;?></b>*</h4> 

    <?php } ?> 

 

  </div> 

  <!-- Section heading --> 

  <!--Main layout--> 

  <main> 

    <div class="container"> 

 

      <!--Section: Products v.3--> 

      <section class="text-center mb-4"> 

 

        <!--Grid row--> 

        <div class="row wow fadeIn"> 

          <?php foreach($searchResult as $book) { ?> 

          <!--Grid column--> 

          <div class="col-lg-3 col-md-6 mb-4"> 

 

            <!--Card--> 

            <div class="card wow fadeIn"> 

 

              <!--Card image--> 

              <div style="padding:5px" class="view overlay"> 

                <img src="<?php echo base_url(); ?>application/libraries/img/bookcovers/<?php echo $book->bookID; ?>.jpg" 

                  class="card-img-top" alt=""> 

                <a href="<?php echo base_url(); ?>BookDetailsController/BookDetails/<?php echo $book->bookID; ?>"> 

                  <div class="mask rgba-white-slight"></div> 

                </a> 

              </div> 

              <!--Card image--> 

 

              <!--Card content--> 

              <div class="card-body text-center"> 

                <!--Category & Title--> 

                <!-- <a href="" class="grey-text"> 

                  <h5><?php echo $book->categoryName; ?></h5> 

                </a> --> 

                <h5> 

                  <strong> 

                    <a style="overflow: hidden; 

                    display: -webkit-box; 

                    -webkit-line-clamp: 2; 

                    -webkit-box-orient: vertical;" 

                      href="<?php echo base_url(); ?>BookDetailsController/BookDetails/<?php echo $book->bookID; ?>" 

                      class="dark-grey-text"> 

                      <?php echo $book->bookTitle; ?> 

                      <span class="badge badge-pill danger-color">NEW</span> 

                    </a> 

                  </strong> 

                </h5> 

 

                <!--Rating--> 

                <ul style="color: #ffa000; list-style-type: none; padding: 0;" class="rating"> 

                  <!-- foreach($categoryBooks as $book) {  --> 

                  <?php $x = 1; while($x <= $book->rating) { ?> 

                  <li style="display: inline-block;"> 

                    <i class="fa fa-star"></i> 

                  </li> 

                  <?php $x++; } ?> 

 

                  <?php $x = 1; while($x <= 5 - $book->rating) { ?> 

                  <li style="display: inline-block;"> 

                    <i class="fa fa-star-o"></i> 

                  </li> 

                  <?php $x++; } ?> 

                </ul> 

                <!--Rating--> 

 

                <!-- Card footer --> 

                <div style="background-color: transparent;" class="card-footer px-1"> 

                  <span class="float-left font-weight-bold"> 

                    <strong> 

                      <?php echo $book->bookPrice; ?>$</strong> 

                  </span> 

 

                  <?php if (isset($this->session->userdata['isAdmin']) && ($this->session->userdata['isAdmin'])) { ?> 

 

                  <?php }else{ ?> 

 

                  <?php $hidden = array('bookID' => $book->bookID, 'bookPrice' => $book->bookPrice, 'bookTitle' => $book->bookTitle, 'redirectTo' => 'CategoryBookController/categoryBooks/'.$book->categoryID); 

                echo form_open('CartController/addBookToCart', '', $hidden);  ?> 

                  <span style="display:flex" class="float-right"> 

                    <input type="number" min="1" value="1" aria-label="Search" name="qty" class="form-control" style="width: 45px; padding: 5px 0px 5px 8px; height: 25px; margin-left: 15px;"> 

                    <button style="margin: 0px; padding: 0px; background: none!important; box-shadow: 0px 0px 0px transparent; border: 0px solid transparent; text-shadow: 0px 0px 0px transparent; cursor: pointer;" 

                      type="submit"><i sttyle="font-size: 17px;" class="fa fa-shopping-cart grey-text ml-3"></i></button> 

                  </span> 

                  <?php echo form_close() ?> 

 

                  <?php }?> 

                </div> 

 

              </div> 

              <!--Card content--> 

 

            </div> 

            <!--Card--> 

 

          </div> 

          <!--Grid column--> 

          <?php } ?> 

 

        </div> 

        <!--Grid row--> 

 

      </section> 

      <!--Section: Products v.3--> 

 

      <!--Pagination--> 

      <nav class="d-flex justify-content-center wow fadeIn"> 

        <ul class="pagination pg-blue"> 

          <!-- <?php echo $links; ?> --> 

        </ul> 

      </nav> 

      <!--Pagination--> 

 

    </div> 

  </main> 

  <!--Main layout--> 

</section> 

 

Footer.php 

 This view contain the footer of the web page and load the necessary scripts web site needs 

<!--Footer--> 

<footer class="page-footer font-small blue"> 

  <!-- Copyright --> 

 

  <div class="footer-copyright text-center py-3">© 2018 Copyright: 

    <a href="#"> Pavit Buddhhima</a> 

  </div> 

 

</footer> 

<!--/.Footer--> 

 

<!-- SCRIPTS --> 

<!-- JQuery --> 

<script type="text/javascript" src="<?php echo base_url(); ?>application/libraries/js/jquery-3.3.1.min.js"></script> 

<!-- Bootstrap tooltips --> 

<script type="text/javascript" src="<?php echo base_url(); ?>application/libraries/js/popper.min.js"></script> 

<!-- Bootstrap core JavaScript --> 

<script type="text/javascript" src="<?php echo base_url(); ?>application/libraries/js/bootstrap.min.js"></script> 

<!-- MDB core JavaScript --> 

<script type="text/javascript" src="<?php echo base_url(); ?>application/libraries/js/mdb.min.js"></script> 

<!-- Initializations --> 

<script type="text/javascript"> 

  // Animations initialization 

  new WOW().init(); 

</script> 

 

Header.php 

 

This view load the necessary css files and navigation bar of the web page  

<!DOCTYPE html> 

<html> 

 

<head> 

  <meta charset="utf-8"> 

  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> 

  <meta http-equiv="x-ua-compatible" content="ie=edge"> 

  <title>Material Design Bootstrap</title> 

  <!-- Font Awesome --> 

  <link rel="stylesheet" href="<?php echo base_url(); ?>application/libraries/css/font-awesome.min.css"> 

  <!-- Bootstrap core CSS --> 

  <link href="<?php echo base_url(); ?>application/libraries/css/bootstrap.min.css" rel="stylesheet"> 

  <!-- Material Design Bootstrap --> 

  <link href="<?php echo base_url(); ?>application/libraries/css/mdb.min.css" rel="stylesheet"> 

  <!-- Your custom styles (optional) --> 

  <link href="<?php echo base_url(); ?>application/libraries/css/style.min.css" rel="stylesheet"> 

  <style type="text/css"> 

    html, 

    body, 

    header, 

    .carousel { 

      height: 60vh; 

    } 

 

    @media (max-width: 740px) { 

 

      html, 

      body, 

      header, 

      .carousel { 

        height: 100vh; 

      } 

    } 

 

    @media (min-width: 800px) and (max-width: 850px) { 

 

      html, 

      body, 

      header, 

      .carousel { 

        height: 100vh; 

      } 

    } 

  </style> 

</head> 

 

<body> 

  <!-- Navbar --> 

  <nav class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar"> 

    <div class="container"> 

 

      <!-- store name --> 

      <a class="navbar-brand waves-effect" href="#"> 

        <strong class="blue-text">Book Storm</strong> 

      </a> 

 

      <!-- Collapse --> 

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" 

        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> 

        <span class="navbar-toggler-icon"></span> 

      </button> 

 

      <!-- Links --> 

      <div class="collapse navbar-collapse" id="navbarSupportedContent"> 

 

        <!-- Left --> 

        <ul class="navbar-nav mr-auto"> 

          <li class="nav-item active"> 

            <a class="nav-link waves-effect" href="<?php echo base_url(); ?>HomeController">Home 

              <!-- <span class="sr-only">(current)</span> --> 

            </a> 

          </li> 

 

          <?php if (isset($this->session->userdata['isAdmin']) && ($this->session->userdata['isAdmin'])) { 

              

              // <?php if (isset($this->session->userdata['isAdmin'])) { 

  // $firstname = ($this->session->userdata['adminData']['firstname']); 

  // $lastname = ($this->session->userdata['adminData']['lastname']); ?> 

 

          <li class="nav-item"> 

            <a class="nav-link waves-effect" href="<?php echo base_url();?>LoginController/logOut">Admin Dashboard</a> 

          </li> 

          <?php  }else{  ?> 

 

          <!-- <li class="nav-item"> 

     <a class="nav-link waves-effect" href="#" >all categories</a> 

          </li> --> 

 

          <?php } ?> 

          <li class="nav-item"> 

            <a class="nav-link waves-effect" href="#">All Books</a> 

          </li> 

          <li class="nav-item"> 

            <a class="nav-link waves-effect" href="#">About Us</a> 

          </li> 

        </ul> 

 

        <!-- Right --> 

        <ul class="navbar-nav nav-flex-icons"> 

 
 
 
 

          <?php if (isset($this->session->userdata['isAdmin']) && ($this->session->userdata['isAdmin'])) { 

        // $firstname = ($this->session->userdata['adminData']['firstname']); 

        // $lastname = ($this->session->userdata['adminData']['lastname']); ?> 

          <li class="nav-item"> 

            <!-- Collapsible content --> 

            <div class="collapse navbar-collapse" id="navbarSupportedContent"> 

 

              <!-- Search form --> 

              <?php $attributes = array('class' => 'form-inline mr-auto'); 

    echo form_open('HomeController/search', $attributes); ?> 

              <form class="form-inline mr-auto"> 

                <div class="md-form my-0"> 

                  <i class="fa fa-search ml-3" aria-hidden="true"></i> 

                  <input class="form-control" type="text" name="search" placeholder="Search Book/Author" aria-label="Search"> 

                </div> 

              </form> 

 

            </div> 

            <!-- Collapsible content --> 

          </li> 

          <li style="padding-top:9px" class="nav-item"> 

            <a> 

              <?php echo $this->session->userdata['adminData']['firstname']; ?></a> 

          </li> 

 

          <li class="nav-item"> 

            <a href="<?php echo base_url(); ?>LoginController/logOut" class="nav-link waves-effect"> 

              <i class="fa fa-sign-out" aria-hidden="true"></i> 

            </a> 

          </li> 

 

          <!-- <li class="nav-item"> 

     <a class="nav-link waves-effect" href="<?php echo base_url();?>LoginController/logOut"><?php echo $this->session->userdata['isAdmin']; ?></a> 

          </li> --> 

 

          <?php  }else{ ?> 

 

          <li class="nav-item"> 

            <a href="<?php echo base_url(); ?>CartController/viewCart" class="nav-link waves-effect"> 

              <span class="badge red z-depth-1 mr-1"> 

                <?php echo $this->cart->total_items(); ?></span> 

              <i class="fa fa-shopping-cart"></i> 

              <span class="clearfix d-none d-sm-inline-block"> Cart </span> 

            </a> 

          </li> 

 

          <?php } ?> 

          <!-- <li class="nav-item"> 

            <a href="https://github.com/mdbootstrap/bootstrap-material-design" class="nav-link border border-light rounded waves-effect" 

              target="_blank"> 

              <i class="fa fa-github mr-2"></i>MDB GitHub 

            </a> 

          </li> --> 

        </ul> 

 

      </div> 

 

    </div> 

  </nav> 

  <!-- Navbar --> 

 

</body> 

 

</html> 

 

Appendix – C (Models) 

 

AdminModel.php 

 

This model represent the database table ‘admin’ this contain handle administrator details with database 

 

<?php 

 

class AdminModel extends CI_Model { 

 

        public function adminData($username) { 

 

            $this -> db -> select('*'); 

            $this -> db -> from('admin'); 

            $this -> db -> where('username', $username); 

            $this -> db -> limit(1); 

            $query = $this -> db -> get(); 

 

            if ($query -> num_rows() == 1) { 

                return $query -> result(); 

            } else { 

                return false; 

            } 

 

        } 

 

        public function authAdmin($data) { 

 

            $condition = "username =". "'".$data['username']. "' AND ". "password =". "'".$data['password']. "'"; 

            $this -> db -> select('*'); 

            $this -> db -> from('admin'); 

            $this -> db -> where($condition); 

            $this -> db -> limit(1); 

            $query = $this -> db -> get(); 

 

            if ($query -> num_rows() == 1) { 

                return true; 

            } else { 

                return false; 

            } 

        } 

 

    } 

    ?> 

 

BookModel.php 

 

This model manipulate book data related activities with database and this represent ‘book’ table in database 

<?php 

 

class BookModel extends CI_Model { 

 

        public function getAllBooks() { 

 

            $this -> db -> select('*'); 

            $this -> db -> from('books'); 

            $this -> db -> join('category', 'category.categoryID = books.categoryID'); 

            $query = $this -> db -> get(); 

 

            return $query; 

 

        } 

 

        public function booksPerCategory($categoryID) { 

 

            $this -> db -> select('*'); 

            $this -> db -> from('book'); 

            $this -> db -> where('book.categoryID', $categoryID); 

            $query = $this -> db -> get(); 

            return $query -> num_rows(); 

        } 

 

        public function fetchBooksByCategory($limit, $start, $categoryID) { 

 

            $this -> db -> limit($limit, $start); 

            $this -> db -> select('*'); 

            $this -> db -> from('book'); 

            $this -> db -> where('book.categoryID', $categoryID); 

            $this -> db -> join('category', 'category.categoryID = book.categoryID'); 

            $query = $this -> db -> get(); 

 

            if ($query -> num_rows() > 0) { 

                foreach($query -> result() as $row) { 

                    $data[] = $row; 

                } 

                return $data; 

            } 

            return false; 

        } 

 

        public function getBooksByCategory($categoryID) { 

 

            $this -> db -> select('*'); 

            $this -> db -> from('book'); 

            $this -> db -> where('book.categoryID', $categoryID); 

            $this -> db -> join('category', 'category.categoryID = book.categoryID'); 

            $query = $this -> db -> get(); 

 

            return $query; 

 

        } 

 

        public function getBookByID($bookID) { 

 

            $this -> db -> select('*'); 

            $this -> db -> from('book'); 

            $this -> db -> where('bookID', $bookID); 

            $this -> db -> join('category', 'category.categoryID = book.categoryID'); 

            $query = $this -> db -> get(); 

 

            return $query -> row(); 

 

        } 

 

        public function insertNewBook($bookTitle, $bookDescription, $bookCoverPath, $bookPrice, $bookAuthor, $bookCategory) { 

 

            $data = array( 

                'bookTitle' => $bookTitle, 

                'bookDescription' => $bookDescription, 

                'bookPrice' => $bookPrice, 

                'bookCover' => $bookCoverPath, 

                'author'    => $bookAuthor, 

                'categoryID' => $bookCategory); 

            $query = $this -> db -> insert('book', $data); 

        } 

 

        public function getSearchResult($searchKeyWord) { 

            // $query = $this->db->query("SELECT * FROM book WHERE (bookTitle LIKE '%$searchKeyWord%') OR (author LIKE '%$searchKeyWord%') "); 

            $query = $this -> db -> query("SELECT * FROM `book` WHERE  bookTitle like '%$searchKeyWord%' OR author LIKE '%$searchKeyWord%' "); 

 

            return $query -> result(); 

        } 

 

    } 

    ?> 

 

 

 

CategoryModel.php 

 

This  model represent the category table in the database and also manipulate category related functionalities 

<?php 

 

class CategoryModel extends CI_Model { 

 

        public function getAllCategory() { 

 

            $this -> db -> select('*'); 

            $this -> db -> from('category'); 

            $query = $this -> db -> get(); 

 

            return $query; 

 

        } 

 

        public function insertNewCategory($categoryName, $categoryDescription, $bookCoverPath) { 

 

            $data = array( 

                'categoryName' => $categoryName, 

                'categoryDescription' => $categoryDescription, 

                'categoryCover' => $bookCoverPath); 

 

            $query = $this -> db -> insert('category', $data); 

        } 

 

        public function getCategoryByID($categoryID) { 

 

            $this -> db -> select('*'); 

            $this -> db -> from('category'); 

            $this -> db -> where('categoryID', $categoryID); 

            $query = $this -> db -> get(); 

 

            return $query -> row(); 

 

        } 

    } 

    ?> 

 

VisitModel.php 

 

This manipulate data using visit table in the data base regarding user tracking functionalities  

<?php 

 

class VisitModel extends CI_Model { 

 

        public function addVisit($userID, $sessionID, $bookID, $timestamp) { 

 

            // printf("session id: %s\r\n",$timestamp); 

 

            $data = array( 

                'userID' => $userID, 

                'sessionID' => $sessionID, 

                'bookID' => $bookID, 

                'timestamp' => $timestamp 

            ); 

 

            $this -> db -> insert('visit', $data); 

 

        } 

 

        public function getRecomendations($bookID) { 

            $query = $this -> db -> query('SELECT *, COUNT(*) AS visits  FROM visit INNER JOIN book ON visit.bookID = book.bookID WHERE userID IN (SELECT userID FROM visit WHERE bookID = '.$bookID.')  GROUP BY visit.bookID ORDER BY visits DESC LIMIT 6;'); 

            return $query -> result(); 

 

        } 

 

        //retrieve book viewed count by book id 

        public function getBookViewCount($bookID) { 

            $query = $this -> db -> query("SELECT * FROM visit WHERE bookID=".$bookID); 

            return $query -> num_rows(); 

        } 

 

        //retrieve user count by book id 

        public function getBookViewUserCount($bookID) { 

            $query = $this -> db -> query("SELECT bookID, userID FROM visit WHERE bookID = ".$bookID." GROUP BY userID"); 

            return $query -> num_rows(); 

        } 

 

        //retrieve last viewed book details by book id 

        public function getBookLastView($bookID) { 

            $query = $this -> db -> query("SELECT timestamp FROM visit WHERE bookID=$bookID ORDER BY visitID DESC LIMIT 1"); 

            return $query -> row(); 

        } 

 

    } 

    ?> 

 

 
