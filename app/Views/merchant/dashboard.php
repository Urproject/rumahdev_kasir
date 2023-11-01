
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content bg-white">

      <div class="row">

        <!-- CONTENT -->
        <div class="col-sm-8 mx-0 py-3">

            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-12 mb-3">
                  <div class="input-group">
                  <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                    <i class="fas fa-bars rumahdev-color" style="color: darkcyan;"></i>
                  </a>
                    <input class="form-control rounded" type="text" placeholder="Search" aria-label="search">
                    <button class="btn" type="button" style="margin-left: -40px; z-index: 1;">
                      <i class="text-secondary fas fa-search"></i>
                    </button>
                  </div>
                </div> <!-- col-sm-12 side menu icon dan search -->

                <div class="col-sm-12 mb-3">
                  <select id="categoryDropdown" class="form-control" style="font-size: 16px;">
                    <option value="">-- Semua Kategori --</option>
                    <?php
                    $lastkategori = null;
                    foreach ($products as $product) {
                        $currentkategori = $product->kategori;
                        if ($currentkategori != $lastkategori) {
                            echo '<option value="' . $currentkategori . '">' . $currentkategori . '</option>';
                            $lastkategori = $currentkategori;
                        }
                    }
                    ?>
                  </select>
                </div> <!-- col-sm-12 dropdown kategori -->


                <div class="col-sm-12">
                  <h5 class="font-weight-bold">Semua Produk</h5>
                </div>
              </div>
            </div><!-- /.container-fluid -->

          <div class="row">

            <?php if (isset($products) && !empty($products)): ?>
              <?php foreach ($products as $product): ?>
                <div class="col-md-4 mb-3">
                    <div class="card h-100">
                        <div class="row h-100">
                            <div class="col-3 h-100">
                                <img src="<?php echo base_url('assets/images/produk/' . $product->gambar); ?>" class="card-img img-fluid rounded-left" style="height: 100%; object-fit: cover;">
                            </div>
                            <div class="col-6 my-auto">
                                <p class="font-weight-bold m-0"><?php echo $product->nama; ?></p>
                                <span class="">Rp <?php echo $product->harga; ?></span>
                            </div>
                            <div class="col-3 my-auto">
                                <button class="btn btn-sm rumahdev-bg text-white rounded-circle">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div> <!-- col-md-4 -->
              <?php endforeach; ?>
            <?php else: ?>
              <p>Belum ada produk.</p>
            <?php endif; ?>

          </div> <!-- row -->
        </div>
        <!-- /.col CONTENT -->


        <!-- RIGHT SIDE -->
        <div class="col-sm-4 mx-0 shadow">

        <!-- <div class="user-panel d-flex" data-toggle="dropdown" style="cursor: pointer;">
          <div class="image my-auto">
            <img src="<?php echo base_url('assets/images/user/' . 'iqbal.jpg'); ?>" 
            class="img-circle border" alt="User Image">
          </div>
          <div class="info my-auto">
            <span class="d-block text-dark">Iqbal Ramadhan</span>
            <span class="d-block text-dark">iqbal123@gmail.com</span>
          </div>
        </div> -->


          <div class="nav-item dropdown">
            <div class="user-panel d-flex mt-2" data-toggle="dropdown" style="cursor: pointer;">
              <div class="image my-auto mr-2">
                <img src="<?php echo base_url('assets/images/user/' . 'iqbal.jpg'); ?>" 
                class="img-circle border" alt="User Image">
              </div>
              <div class="info my-auto">
                <span class="d-block text-dark">Iqbal Ramadhan</span>
                <span class="d-block text-dark">iqbal123@gmail.com</span>
              </div>
              <div class="my-auto ml-auto mr-3">
                <i class="fas fa-angle-down"></i>
              </div>
            </div>


            <div class="dropdown-menu dropdown-menu-md">
              <a href="<?= base_url('kasir/profil/user') ?>" class="dropdown-item">
                <i class="mr-2 fas fa-user"></i> Profil Akun
              </a>
              <div class="dropdown-divider"></div>
              <a href="<?= base_url('kasir/profil/merchant') ?>" class="dropdown-item">
                <i class="mr-2 fas fa-users"></i> Profil Merchant
              </a>
              <div class="dropdown-divider"></div>
              <a href="<?= base_url('login') ?>" class="dropdown-item">
                <i class="mr-2 fas fa-sign-out-alt"></i> Logout
              </a>
            </div>
          </div>
          <hr>

          <div class="order-menu flex-grow-1">
            <h5 class="font-weight-bold">Order Menu</h5>

            <div class="row">

              <div class=" col-8 form-jenis-pesanan mb-3">
                <label for="paymentDropdown" hidden>Jenis Pesanan</label>
                <select id="paymentDropdown" class="form-control">
                  <option value="dine-in">Dine In</option>
                  <option value="take-away">Take Away</option>
                </select>
              </div> <!-- form-jenis-pesanan -->

              <div class=" col-4 form-jenis-pesanan mb-3">
                <label for="paymentDropdown" hidden>No. Meja</label>
                <select id="paymentDropdown" class="form-control">
                  <option value>No. Meja</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="3">4</option>
                </select>
              </div> <!-- form-jenis-pesanan -->
            </div>

            <?php if (isset($products) && !empty($products)): ?>
              <?php foreach ($products as $product): ?>

              <div class="row my-2">
                <div class="col-2 my-auto">
                  <img class="rounded" src="<?php echo base_url('assets/images/produk/' . $product->gambar); ?>" style="width: 100%;">
                </div>
                <div class="col-7 my-auto">
                  <p class="m-0 font-weight-bold"><?php echo $product->nama; ?></p>
                  <p class="m-0">Rp <?php echo $product->harga; ?></p>
                </div>
                <div class="col-3 my-auto">

                  <div class="row pr-2">
                    <div class="col-4">
                      <span class="right badge rounded text-white rumahdev-bg" style="cursor: pointer;">
                        <i class="fas fa-minus"></i>
                      </span>
                    </div>
                    <div class="col-4">
                      <p class="text-center">2</p>
                    </div>
                    <div class="col-4">
                      <span class="right badge rounded text-white rumahdev-bg" style="cursor: pointer;">
                        <i class="fas fa-plus"></i>
                      </span>
                    </div>
                  </div> <!-- row price+qty -->


                </div>
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

          </div>
            <button class="btn text-white rumahdev-bg border-0 mb-2" onclick="goConfirm()" style="width: 100%;">
              Proses Pesanan
            </button>

        </div>
        <!-- /.col RIGHT SIDE -->

      </div>
      <!-- /.row -->


    </section> <!-- /.content -->
  </div> <!-- /.content-wrapper -->


<script>
function goConfirm() {
  window.location.href = "<?= base_url('kasir/confirm') ?>"; // Replace with your desired URL
}
</script>