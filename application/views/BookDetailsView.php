
  <!--Main layout-->
  <main class="mt-5 pt-4">
    <div class="container dark-grey-text mt-5">

      <!--Grid row-->
      <div class="row wow fadeIn">

        <!--Grid column-->
        <div style="text-align: center; padding-top: 5%;" class="col-md-6 mb-4">

          <img src="<?php echo base_url(); ?>application/libraries/img/bookcovers/<?php echo $bookDetails->bookID; ?>.jpg" class="img-fluid" alt="">

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
            
 <?php $attributes = array('class' => 'd-flex justify-content-left'); $hidden = array('bookID' => $bookDetails->bookID, 'bookPrice' => $bookDetails->bookPrice, 'bookTitle' => $bookDetails->bookTitle, 'redirectTo' => 'BookDetailsController/BookDetails/'.$bookDetails->bookID);
                echo form_open('CartController/addBookToCart', $attributes, $hidden);  ?>

              <!-- Default input -->
              <input type="number" value="1" min="1" aria-label="Search" name="qty" class="form-control" style="width: 100px">
              
              <button class="btn btn-primary btn-md my-0 p" type="submit">Add to cart
                <i class="fa fa-shopping-cart ml-1"></i>
              </button>

              <?php echo form_close() ?>

          </div>
          <!--Content-->

        </div>
        <!--Grid column-->

      </div>
      <!--Grid row-->

      <hr>

      <!--Grid row-->
      <div class="row d-flex justify-content-center wow fadeIn">

        <!--Grid column-->
        <div class="col-md-6 text-center">

          <h4 class="my-4 h4">Recomendation</h4>

          <p>users who look this book also view theese books</p>

        </div>
        <!--Grid column-->

      </div>
      <!--Grid row-->

      <!--Grid row-->
      <div class="row wow fadeIn">

        <?php foreach($recomendBook as $recomendation) { ?>

          <?php if(!($recomendation->bookID === $currentBook)){ ?>
            <!--Grid column-->
            <div class="col-lg-4 col-md-12 mb-4">

            <img src="<?php echo base_url(); ?>application/libraries/img/bookcovers/<?php echo $recomendation->bookID; ?>.jpg" class="img-fluid" alt="">

            </div>
            <!--Grid column-->

            <?php  } ?>
        <?php  } ?>

      </div>
      <!--Grid row-->

    </div>
  </main>
  <!--Main layout-->
