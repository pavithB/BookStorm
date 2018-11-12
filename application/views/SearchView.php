
<section style="margin-top: 12vh!important;     min-height: calc(100vh - 41.1vh);" class="team-section text-center my-5">

<!-- Section heading -->
<div>
<?php if($searchResult) { ?>
<h4 class="h5-responsive  my-5">Showing results for *<b><?php echo $searchKeyword;?></b>*</h4>
<?php } else { ?>
  <h4 class="h5-responsive  my-5"> No results for *<b><?php echo $searchKeyword;?></b>*</h4>
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
                <img src="<?php echo base_url(); ?>application/libraries/img/bookcovers/<?php echo $book->bookID; ?>.jpg" class="card-img-top" alt="">
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
                    -webkit-box-orient: vertical;" href="<?php echo base_url(); ?>BookDetailsController/BookDetails/<?php echo $book->bookID; ?>" class="dark-grey-text"><?php echo $book->bookTitle; ?>
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
                <strong><?php echo $book->bookPrice; ?>$</strong>
              </span>

              <?php if (isset($this->session->userdata['isAdmin']) && ($this->session->userdata['isAdmin'])) { ?>
             

             <?php }else{ ?>

              <?php $hidden = array('bookID' => $book->bookID, 'bookPrice' => $book->bookPrice, 'bookTitle' => $book->bookTitle, 'redirectTo' => 'CategoryBookController/categoryBooks/'.$book->categoryID);
                echo form_open('CartController/addBookToCart', '', $hidden);  ?>
              <span style="display:flex" class="float-right">
                  <input type="number" min="1" value="1" aria-label="Search" name="qty" class="form-control" style="width: 45px; padding: 5px 0px 5px 8px; height: 25px; margin-left: 15px;">
                  <button style="margin: 0px; padding: 0px; background: none!important; box-shadow: 0px 0px 0px transparent; border: 0px solid transparent; text-shadow: 0px 0px 0px transparent; cursor: pointer;" type="submit"><i sttyle="font-size: 17px;" class="fa fa-shopping-cart grey-text ml-3"></i></button>
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