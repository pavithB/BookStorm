
  <!--Main layout-->
  <main style="    min-height: calc(100vh - 41.1vh);" class="mt-5 pt-4">
    <div class="container dark-grey-text mt-5">

      <!--Grid row-->
      <div class="row wow fadeIn">

        <!--Grid column-->
        <div style="text-align: center; padding-top: 5%;" class="col-md-6 mb-4">

          <img src="<?php echo base_url(); ?>assets/images/bookCovers/<?php echo $bookDetails->bookCover; ?>" class="img-fluid" alt="">

        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-md-6 mb-4">

          <!--Content-->
          <div class="p-4">

            <div class="mb-3">
              <a href="<?php echo base_url(); ?>CategoryBookController/categoryBooks/<?php echo $bookDetails->categoryID; ?>">
                <span class="badge purple mr-1"><?php echo $bookDetails->categoryName; ?></span>
              </a>
              <a href="">
                <span class="badge blue mr-1">New</span>
              </a>
              <a href="">
                <span class="badge red mr-1">Bestseller</span>
              </a>
            </div>

            <h3 class="secondary-heading font-weight-bold"><?php echo $bookDetails->bookTitle; ?></h3>
            <div style="display:flex">
                    <h5 style="padding-left:1em" class="secondary-heading">- by <?php echo $bookDetails->author; ?>
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
                <del>$ <?php echo $bookDetails->bookPrice + 10; ?></del>
              </span>
              <span>$<?php echo $bookDetails->bookPrice; ?></span>
            </p>

            <!-- <p class="lead font-weight-bold">Description</p> -->

            <p><?php echo $bookDetails->bookDescription; ?></p>
            <?php if (isset($this->session->userdata['isAdmin']) && ($this->session->userdata['isAdmin'])) { ?>
                    
              <div class="accordion md-accordion" id="accordionEx" role="tablist" aria-multiselectable="true">

<!-- Accordion card -->
<div class="card">

  <!-- Card header -->
  <div class="card-header" role="tab" id="headingOne1">
    <a data-toggle="collapse" data-parent="#accordionEx" href="#collapseOne1" aria-expanded="false" aria-controls="collapseOne1" class="collapsed">
      <h5 class="mb-0">
        Visitor Statistics
        <i class="fa fa-angle-down rotate-icon"></i>
      </h5>
    </a>
  </div>

  <!-- Card body -->
  <div id="collapseOne1" class="collapse" role="tabpanel" aria-labelledby="headingOne1" data-parent="#accordionEx" style="">
    <div class="card-body">
      <ul style="font-size:20px" class="list-group">
  <li   style="    border: none;" class="list-group-item d-flex justify-content-between align-items-center">
  Total Visits
    <span class="badge badge-primary badge-pill"><?php echo $viewedCount;  ?> </span>
  </li>
  <li style="    border: none;" class="list-group-item d-flex justify-content-between align-items-center">
  visitor Count
    <span class="badge badge-primary badge-pill"><?php echo $visitorsCount ; ?></span>
  </li>
  <li style="    border: none;" class="list-group-item d-flex justify-content-between align-items-center">
  Last Visit
    <span class="badge badge-primary badge-pill"><?php echo $lastViewedDate;  ?></span>
  </li>
</ul>

    </div>
  </div>
</div>
<!-- Accordion card -->
</div>

            <?php }else { ?>

             <?php $attributes = array('class' => 'd-flex justify-content-left'); $hidden = array('bookID' => $bookDetails->bookID, 'bookPrice' => $bookDetails->bookPrice, 'bookTitle' => $bookDetails->bookTitle, 'bookCover' => $bookDetails->bookCover, 'redirectTo' => 'BookDetailsController/BookDetails/'.$bookDetails->bookID);
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
            <div style= "    min-height: 422px;" class="card wow fadeIn">

              <!--Card image-->
              <div style="padding:5px" class="view overlay">
                <img style="min-width:160px ; min-height: 250px;" src="<?php echo base_url(); ?>assets/images/bookCovers/<?php echo $recomendation->bookCover; ?>" class="card-img-top" alt="">
                <a href="<?php echo base_url(); ?>BookDetailsController/BookDetails/<?php echo $recomendation->bookID; ?>">
                  <div class="mask rgba-white-slight"></div>
                </a>
              </div>
              <!--Card image-->

              <!--Card content-->
              <div style="padding: 10px!important;" class="card-body text-center">
                <!--Category & Title-->
                <!-- <a href="" class="grey-text">
                  <h5><?php echo $recomendation->categoryName; ?></h5>
                </a> -->
                <h5>
                  <strong>
                    <a style="overflow: hidden;
                    display: -webkit-box;
                    -webkit-line-clamp: 2;
                    -webkit-box-orient: vertical;" href="<?php echo base_url(); ?>BookDetailsController/BookDetails/<?php echo $recomendation->bookID; ?>" class="dark-grey-text"><?php echo $recomendation->bookTitle; ?>
                      <span class="badge badge-pill danger-color">NEW</span>
                    </a>
                  </strong>
                </h5>

                <!-- <h4 class="font-weight-bold blue-text">
                  <strong><?php echo $recomendation->bookPrice; ?>$</strong>
                </h4> -->



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
                <strong><?php echo $recomendation->bookPrice; ?>$</strong>
              </span>
              <?php if (isset($this->session->userdata['isAdmin']) && ($this->session->userdata['isAdmin'])) { ?>
                           

              <?php }else{ ?>
              <?php $hidden = array('bookID' => $recomendation->bookID, 'bookPrice' => $recomendation->bookPrice, 'bookTitle' => $recomendation->bookTitle, 'bookCover' => $recomendation->bookCover, 'redirectTo' => 'BookDetailsController/BookDetails/'.$bookDetails->bookID);
                echo form_open('CartController/addBookToCart', '', $hidden);  ?>
              <span style="display:flex" class="float-right">
                  <input type="number" min="1" value="1" aria-label="Search" name="qty" class="form-control" style="width: 45px; padding: 5px 0px 5px 8px; height: 25px; margin-left: 15px;">
                  <button style="margin: 0px; padding: 0px; background: none!important; box-shadow: 0px 0px 0px transparent; border: 0px solid transparent; text-shadow: 0px 0px 0px transparent; cursor: pointer;" type="submit"><i sttyle="font-size: 17px;" class="fa fa-shopping-cart grey-text ml-3"></i></button>
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
