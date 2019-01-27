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
                        <input id="new-category-name" name="cName" type="text" length="100" class="form-control">
                        <label for="new-category-name">ex: comic/Biography</label>
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
                        <textarea name="cDescription" id="new-category-description" class="form-control md-textarea"
                          length="2000" rows="3"></textarea>
                        <label for="new-category-description">Type your text</label>
                      </div>
                    </div>
                  </div>
                  <!-- Grid row -->

                  <!-- Grid row -->
                  <div class="form-group row">
                    <!-- Material input -->
                    <label for="new-category-upload" class="col-sm-4 col-form-label">Category Cover Photo</label>
                    <div class="col-sm-8">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                        </div>
                        <div class="custom-file">
                          <input type="file" size="20" class="custom-file-input" name="userfile" id="new-category-upload"
                            aria-describedby="inputGroupFileAddon01">
                          <label class="custom-file-label" for="new-category-upload">Choose file</label>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- Grid row -->

                  <!-- Grid row -->
                  <div class="form-group row">
                    <div class="col-sm-10">
                      <button type="submit" value="upload" class="btn btn-primary btn-md waves-effect waves-light">add</button>
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
                        <input id="new-book-title" name="bTitle" type="text" length="100" class="form-control">
                        <label for="new-book-title">enter book title</label>
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
                        <textarea name="bDescription" id="new-book-description" class="form-control md-textarea"
                          length="2000" rows="3"></textarea>
                        <label for="new-book-description">do not exceed 1000 characters</label>
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
                        <input id="new-book-author" name="bAuthor" type="text" length="100" class="form-control">
                        <label for="new-book-author">enter book Author name</label>
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
                        <input id="new-book-price" name="bPrice" type="number" min="1" step="any" length="100" class="form-control">
                        <label for="new-book-price">enter book Price</label>
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
                        <option value=<?php echo $category->categoryID; ?>><?php echo $category->categoryName; ?> </option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <!-- Grid row -->

                  <!-- Grid row -->
                  <div class="form-group row">
                    <!-- Material input -->
                    <label for="new-book-upload" class="col-sm-4 col-form-label">Book Cover Photo</label>
                    <div class="col-sm-8">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                        </div>
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" name="userfile" id="new-book-upload"
                            aria-describedby="inputGroupFileAddon01">
                          <label class="custom-file-label" for="new-book-upload">Choose file</label>
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
  <!-- <script> $(document).ready(function() { $('input#input_text, textarea#textarea1').characterCounter(); });</script> -->