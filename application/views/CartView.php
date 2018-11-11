<main class="mt-5 pt-4">

    <!-- Main Container -->
    <div class="container cart-v1">

      <section class="section my-5 pb-5">

        <!-- Shopping Cart table -->
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
                  <img src="<?php echo base_url(); ?>application/libraries/img/bookcovers/<?php echo $book['id']; ?>.jpg" alt="" class="img-fluid z-depth-0">
                </th>
                <td>
                  <h5 class="mt-3">
                    <strong><?php echo $book['name']; ?></strong>
                  </h5>
                  <p class="text-muted">show category</p>
                </td>
                <td></td>
                <td><?php echo $book['price']; ?></td>
                <td class="text-center text-md-left">
                  <span class="qty"><?php echo $book['qty']; ?> </span>
                  <div class="btn-group radio-group ml-2" data-toggle="buttons">
                    <label class="btn btn-sm btn-primary btn-rounded waves-effect waves-light">
                      <input type="radio" name="options" id="option1">—
                    </label>
                    <label class="btn btn-sm btn-primary btn-rounded waves-effect waves-light">
                      <input type="radio" name="options" id="option2">+
                    </label>
                  </div>
                </td>
                <td class="font-weight-bold">
                  <strong><?php echo $book['price']; ?></strong>
                </td>
                <td>
                  <button type="button" class="btn btn-sm btn-primary waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="" data-original-title="Remove item">X
                  </button>
                </td>
              </tr>
              <?php } ?>
              <!-- /.item loop -->

            </tbody>
            <!-- /.Table body -->

          </table>

        </div>
        <!-- Shopping Cart table -->

      </section>

    </div>
    <!-- /Main Container -->

  </main>