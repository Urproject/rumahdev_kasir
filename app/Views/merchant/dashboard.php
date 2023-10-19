

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Main content -->
    <section class="content bg-white">
        <div class="row">

          <div class="col-sm-8 mx-0 py-3">

                <div class="container-fluid">
                  <div class="row mb-2">
                    <div class="col-sm-12 mb-3">
                      <div class="input-group" style="width: 50%;">
                      <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                        <i class="fas fa-bars rumahdev-color" style="color: darkcyan;"></i>
                      </a>
                        <input class="form-control rounded" type="text" placeholder="Search" aria-label="search">
                        <button class="btn" type="button" style="margin-left: -40px; z-index: 1;">
                          <i class="text-secondary fas fa-search"></i>
                        </button>
                      </div>
                    </div>

                    <div class="col-sm-12 mb-3">
                      <?php
                        $lastkategori = null;
                        foreach ($products as $product) {
                          $currentkategori = $product->kategori;
                          if ($currentkategori != $lastkategori) {
                            echo '<button class="btn btn-sm btn-outline-secondary mr-2" style="font-size: 16px;">' . $currentkategori . '</button>';
                            $lastkategori = $currentkategori;
                          }
                        }
                      ?>
                    </div>

                    <div class="col-sm-12">
                      <h5 class="font-weight-bold">Semua Produk</h5>
                    </div>
                  </div>
                </div><!-- /.container-fluid -->


                <div class="row">

                <?php if (isset($products) && !empty($products)): ?>
                  <?php foreach ($products as $product): ?>

                    <div class="col-md-4 px-2 mb-3">
                      <div class="card">
                        <img src="<?php echo base_url('assets/images/produk/' . $product->gambar); ?>" class="card-img-top rounded-top" alt="Foto Produk" style="height: 200px;">
                        <div class="card-body">
                          <div class="row">
                            <div class="col-10">
                              <span class="font-weight-bold"><?php echo $product->nama; ?></span><br>
                              <span>Rp <?php echo $product->harga; ?></span>
                            </div>
                            <div class="col-2 my-auto ms-auto">
                              <button class="btn btn-sm rumahdev-bg text-white rounded-circle my-auto" 
                              style="">
                                <i class="fa fa-plus"></i>
                              </button>
                            </div> <!-- col-2 -->
                          </div> <!-- row -->
                        </div> <!-- card-body -->
                      </div> <!-- card -->
                    </div> <!-- col-md-4 -->

                  <?php endforeach; ?>
                <?php else: ?>
                  <p>No products found.</p>
                <?php endif; ?>

                </div> <!-- row -->


          </div>
          <!-- /.col -->


          <div class="col-sm-4 mx-0 shadow">
            <div class="user-panel mt-2 d-flex">
              <div class="image my-auto">
                <img src="<?=base_url('adminLTE/dist/img/user2-160x160.jpg')?>" class="img-circle elevation-2" alt="User Image">
              </div>
              <div class="info">
                <a href="#" class="d-block text-dark">Alexander Pierce</a>
                <a href="#" class="d-block text-dark">alexanderpierce@gmail.com</a>
              </div>
            </div>
            <hr>

            <div class="order-menu flex-grow-1">
              <h5 class="font-weight-bold">Order Menu</h5>
              <?php if (isset($products) && !empty($products)): ?>
                <?php foreach ($products as $product): ?>

              <div class="row">
                <div class="col-2">
                  <img class="rounded my-auto" src="<?php echo base_url('assets/images/produk/' . $product->gambar); ?>" style="width: 100%; height: 80%;">
                </div>
                <div class="col-md-10">
                  <span><?php echo $product->nama; ?></span>
                  <div class="row">
                    <div class="col-8">
                      <p><?php echo $product->harga; ?></p>
                    </div>
                    <div class="col-1">
                      <span class="right badge badge-secondary rounded" style="cursor: pointer;">
                        <i class="fas fa-minus"></i>
                      </span>
                    </div>
                    <div class="col-1">
                      <p class="text-center">2</p>
                    </div>
                    <div class="col-1">
                      <span class="right badge badge-secondary rounded" style="cursor: pointer;">
                        <i class="fas fa-plus"></i>
                      </span>
                    </div>
                  </div> <!-- row price+qty -->
                </div> <!-- col-md-10 produk/price -->
              </div> <!-- row product -->

                <?php endforeach; ?>
              <?php else: ?>
                <p>Belum ada order.</p>
              <?php endif; ?>

            </div> <!-- order-menu -->


            <div class="order-price my-3">
              <div class="row text-secondary">
                <div class="col-8">
                  <span>Subtotal</span>
                </div>
                <div class="col-4">
                  <span>Rp 60.000</span>
                </div>
              </div>
              <div class="row text-secondary">
                <div class="col-8">
                  <span>Diskon</span>
                </div>
                <div class="col-4">
                  <span>Rp 60.000</span>
                </div>
              </div>
              <div class="row text-secondary">
                <div class="col-8">
                  <span>Pajak</span>
                </div>
                <div class="col-4">
                  <span>Rp 60.000</span>
                </div>
              </div>
              <hr>
              <div class="row font-weight-bold" style="font-size: 18px;">
                <div class="col-8">
                  <span>Total</span>
                </div>
                <div class="col-4">
                  <span>Rp 60.000</span>
                </div>
              </div>

              <div class="row">
                <div class="col-12 d-flex justify-content-center" id="processPayment">
                  <button class="btn btn-sm rumahdev-bg text-white mt-3" style="font-size: 18px; width: 100%;">
                    Proses Pembayaran
                  </button>
                </div>
              </div>
            </div>


          </div>
          <!-- /.col -->

        </div>
        <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<script>
  document.getElementById("processPayment").addEventListener("click", function() {
    window.location.href = "<?= base_url('home/confirm') ?>"; // Replace with your desired URL
  });
</script>