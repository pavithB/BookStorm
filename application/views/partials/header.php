<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>BookStorm</title>
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