<div class="container-fluid">
    <div style='min-height: calc(100vh - 5.6vh);justify-content: center;' class="row">




        <!-- // ddddddddddddddddddddddddd -->
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

                <!--Footer-->
                <!-- <div class="modal-footer">
        <div class="options">
            <p>Not a member? <a href="#">Sign Up</a></p>
            <p>Forgot <a href="#">Password?</a></p>
        </div>
    </div> -->

            </div>
            <!--/Form without header-->

        </div>


    </div>
</div>