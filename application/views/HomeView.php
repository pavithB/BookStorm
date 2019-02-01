<!DOCTYPE html>
<html lang="en">

<head>
  <style>
    .view {
  position: relative;
  overflow: hidden;
  cursor: default;
}

.view img, .view video {
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
  border: 1px solid rgba(0,0,0,.125);
  border-radius: .25rem;
}

.collection-card .stripe.dark {
  background-color: rgba(0,0,0,.7);
}

.collection-card .stripe.light {
    background-color: rgba(255,255,255,.7);
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

              <!-- <a target="_blank" href="#" class="btn btn-outline-white btn-lg">View All Categories
                <i class="fa fa-graduation-cap ml-2"></i>
              </a> -->
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
                <strong>Read all and win a another book FREE</strong>
              </h1>

              <p>
                <strong>this offer valid only in november</strong>
              </p>

              <a target="_blank" href="<?php echo base_url(); ?>CategoryBookController/categoryBooks/1" class="btn btn-outline-white btn-lg">check it out!
                <i class="fa fa-book ml-2"></i>
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

              <!-- <p class="mb-4 d-none d-md-block">
                <strong>The most comprehensive tutorial for the Bootstrap 4. Loved by over 500 000 users. Video and written versions
                  available. Create your own, stunning website.</strong>
              </p> -->

              <!-- <a target="_blank" href="#" class="btn btn-outline-white btn-lg">Start free tutorial
                <i class="fa fa-graduation-cap ml-2"></i>
              </a> -->
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
                        <img style="
    max-height: 240px;" src="<?php echo base_url(); ?>assets/images/categoryCovers/<?php echo $Category->categoryCover; ?>" class="img-fluid" alt="">
                         <?php echo '<div class="' . (++$count%2 ? "stripe dark" : "stripe light") . '">' ?>
                          <a href="<?php echo base_url(); ?>CategoryBookController/categoryBooks/<?php echo $Category->categoryID; ?>">
                            <p><?php echo $Category->categoryName; ?>
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