<main style = "min-height: calc(100vh - 14.1vh);" class="mt-5 pt-4">

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
                  <img src="<?php echo base_url(); ?>assets/images/bookCovers/<?php echo $book['bookCover']; ?>" alt="" class="img-fluid z-depth-0">
                </th>
                <td>
                  <h5 class="mt-3">
                    <strong><?php echo $book['name']; ?></strong>
                  </h5>
                  <p class="text-muted">show category</p>
                </td>
                <td></td>
                <td>$<?php echo $this->cart->format_number($book['price']); ?></td>
                <td class="text-center text-md-left">
                  <span class="qty"><?php echo $book['qty']; ?> </span>
                  <div class="btn-group ml-2">
                    <button onclick="window.location='<?php echo base_url() ?>CartController/updateQty/decrement/<?php echo $book['rowid']; ?>'" class="btn btn-sm btn-primary btn-rounded waves-effect waves-light">—</button>
                    <button onclick="window.location='<?php echo base_url() ?>CartController/updateQty/increment/<?php echo $book['rowid']; ?>'" class="btn btn-sm btn-primary btn-rounded waves-effect waves-light">+</button>
                  </div>
                </td>
                <td class="font-weight-bold">
                  <strong>$<?php echo $this->cart->format_number($book['subtotal']); ?></strong>
                </td>
                <td>
                  <button onclick="window.location='<?php echo base_url() ?>CartController/updateQty/remove/<?php echo $book['rowid']; ?>'" type="button" class="btn btn-sm btn-primary waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="" data-original-title="Remove item">X
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
                    <strong>$<?php echo $this->cart->format_number($this->cart->total()); ?></strong>
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