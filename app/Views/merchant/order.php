<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<div class="content-wrapper">
  <!-- Main content -->
  <section class="content bg-white">
    <div class="row">

      <!-- MIDDLE-->
      <div class="col-md-8 mx-0 py-3" style="min-height: 100vh;">

        <div class="container-fluid">
          <div class="row mb-2">

            <div class="col-md-12 mb-3">
              <div class="input-group">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                  <i class="fas fa-bars rumahdev-color" style="color: darkcyan;"></i>
                </a>
                <input class="form-control rounded" type="text" name="search" placeholder="Search" aria-label="search">
                <button class="btn" type="button" style="margin-left: -40px; z-index: 1;">
                  <i class="text-secondary fas fa-search"></i>
                </button>
              </div>
            </div> <!-- col-md-12 side menu icon dan search -->

            <div class="col-md-12 mb-3">
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
            </div> <!-- col-md-12 dropdown kategori -->

          </div>
        </div><!-- /.container-fluid -->

        <div class="row">
          <?php if (isset($products) && !empty($products)): ?>
            <?php foreach ($products as $product): ?>
              <div class="col-sm-4 mb-3">

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
                      <button class="btn btn-sm rumahdev-bg text-white rounded-circle add-to-order-btn"
                        data-product-id="<?php echo $product->id_product; ?>" 
                        data-product-name="<?php echo $product->nama; ?>" 
                        data-product-price="<?php echo $product->harga; ?>"
                        data-product-gambar="<?php echo $product->gambar; ?>"
                        id="product-<?php echo $product->id_product; ?>">
                        <i class="fas fa-plus"></i>
                      </button>
                    </div>
                  </div> <!-- row h-100 -->
                </div> <!-- card h-100 -->

              </div> <!-- col-md-4 -->
            <?php endforeach; ?>
          <?php else: ?>
            <p>Belum ada produk.</p>
          <?php endif; ?>
        </div> <!-- row -->

      </div>
      <!-- /.col MIDDLE -->

      <!-- RIGHT SIDE -->
      <div class="col-md-4 mx-0 shadow d-flex flex-column" style="min-height: 100vh;">
        <div class="nav-item dropdown mr-3">
          <div class="user-panel d-flex mt-2" data-toggle="dropdown" style="cursor: pointer;">

            <div class="image my-auto mr-2">
              <?php
              $profilePicture = 'assets/images/user/' . esc($userData['foto']);
              $defaultPicture = 'assets/images/user/default-profile.jpg'; // Change the extension if needed

              // Check if the profile picture exists, if not, use the default picture
              if (file_exists($profilePicture)) {
                  $imgSrc = base_url($profilePicture);
              } else {
                  $imgSrc = base_url($defaultPicture);
              }
              ?>
              <img src="<?= $imgSrc ?>" class="img-circle border" alt="User Image">
            </div>

            <div class="info my-auto">
              <span class="d-block text-dark"><?= esc($merchantData->nama_usaha); ?></span>
              <span class="d-block text-dark"><?= esc($userData['username']); ?></span>
            </div>
            <div class="my-auto ml-auto">
              <i class="fas fa-ellipsis-v"></i>
            </div>
          </div>

          <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
            <a href="<?= base_url('kasir/profil/user') ?>" class="dropdown-item">
              <i class="mr-2 fas fa-user"></i> Profil Akun
            </a>
            <div class="dropdown-divider"></div>
            <a href="<?= base_url('kasir/profil/merchant') ?>" class="dropdown-item">
              <i class="mr-2 fas fa-users"></i> Profil Merchant
            </a>
            <div class="dropdown-divider"></div>
            <a href="<?= base_url('logout') ?>" class="dropdown-item">
              <i class="mr-2 fas fa-sign-out-alt"></i> Logout
            </a>
          </div>
        </div>
        <hr>

        <div class="order-menu flex-grow-1">
          <h5 class="font-weight-bold">Order Menu</h5>

          <div class="row">
            <div class="col-8 form-jenis-pesanan mb-3">
              <label for="paymentDropdown mb-0">Jenis Pesanan</label>
              <select id="paymentDropdown" class="form-control">
                <option value="dine-in">Dine In</option>
                <option value="take-away">Take Away</option>
              </select>
            </div>

            <div class="col-4 form-jenis-pesanan mb-3" id="noMejaDropdownContainer">
              <label for="noMejaDropdown mb-0">No. Meja</label>
              <select id="noMejaDropdown" class="form-control">
                <option value="No. Meja">No. Meja</option>
                <option value="1">1</option>
                <option value="2">2</option>
              </select>
            </div>
          </div>

          <div id="order-list"> <!-- Add an ID to the order list div -->
            <!-- Selected products will be displayed here -->
          </div>

          <p id="empty-message">Belum ada produk ditambahkan ke order.</p>
        </div> <!-- order-menu -->

        <button id="prosesPesananBtn" class="btn text-white rumahdev-bg border-0 mb-2" style="width: 100%;">
          Proses Pesanan
        </button>

      </div>
      <!-- /.col RIGHT SIDE -->

    </div>
    <!-- /.row -->

  </section> <!-- /.content -->
</div> <!-- /.content-wrapper -->

<script type="text/javascript">
  $(document).ready(function () {
    $("#noMejaDropdownContainer").show();
    $("#paymentDropdown").change(function () {
      var selectedValue = $(this).val();
        if (selectedValue === "take-away") {
        $("#noMejaDropdownContainer").hide();
      } else {
        $("#noMejaDropdownContainer").show();
      }
    });
  });

var baseUrl = "<?php echo base_url(); ?>";

$(document).ready(function () {
  // Define an empty array to store the selected products
  const selectedProducts = [];

  // Handle the click event on the "Add to Order" button
  $(".add-to-order-btn").click(function () {
    const productId = $(this).data("product-id");

    // Check if the product is already in the order
    const existingProduct = selectedProducts.find((product) => product.id === productId);

    if (existingProduct) {
      // If the product already exists, increment the quantity
      existingProduct.quantity++;
    } else {
      // If it's a new product, add it to the array
      const productName = $(this).data("product-name");
      const productPrice = $(this).data("product-price");
      const productImage = $(this).data("product-gambar");

      selectedProducts.push({
        id: productId,
        name: productName,
        image: productImage,
        price: productPrice,
        quantity: 1,
      });
    }

    // Update the right-side order list
    updateOrderList();
  });

  // Attach click event to the "Proses Pesanan" button
  $("#prosesPesananBtn").click(function () {

   console.log("Button Clicked");
    // Call the function to send selected products data to the controller
    sendOrderDataToController(selectedProducts);
  });

  // Function to update the right-side order list
  function updateOrderList() {
    const orderList = $("#order-list");
    const emptyMessage = $("#empty-message");

    if (selectedProducts.length === 0) {
      emptyMessage.show();
      orderList.hide();
    } else {
      emptyMessage.hide();
      orderList.show();
      orderList.empty();

      selectedProducts.forEach((product) => {
        const imageUrl = baseUrl + 'assets/images/produk/' + product.image;

        orderList.append(`

            <div class="row my-2">
              <div class="col-2 my-auto">
                <img class="rounded" src="${imageUrl}" style="width: 100%;">
              </div>

              <div class="col-7 my-auto">
                <p class="m-0 font-weight-bold">${product.name}</p>
                <p class="m-0">Rp ${product.price}</p>
              </div>

              <div class="col-3 my-auto">
                <div class="row pr-2">
                  <div class="col-4">
                    <span class="right badge rounded text-white rumahdev-bg minus-qty" data-product-id="${product.id}" style="cursor: pointer;">
                      <i class="fas fa-minus"></i>
                    </span>
                  </div>
                  <div class="col-4">
                    <p class="text-center">${product.quantity}</p>
                  </div>
                  <div class="col-4">
                    <span class="right badge rounded text-white rumahdev-bg plus-qty" data-product-id="${product.id}" style="cursor: pointer;">
                      <i class="fas fa-plus"></i>
                    </span>
                  </div>
                </div> <!-- row price+qty -->
              </div>
            </div>

        `);
      });

      // Attach click events to the +/- buttons
      $(".minus-qty").click(function () {
        const productId = $(this).data("product-id");
        const product = selectedProducts.find((p) => p.id === productId);
        if (product) {
          product.quantity--;
          if (product.quantity === 0) {
            // Remove the product if quantity is zero
            selectedProducts.splice(selectedProducts.indexOf(product), 1);
          }
          updateOrderList();
        }
      });

      $(".plus-qty").click(function () {
        const productId = $(this).data("product-id");
        const product = selectedProducts.find((p) => p.id === productId);
        if (product) {
          product.quantity++;
          updateOrderList();
        }
      });

    }
  }

  function sendOrderDataToController(selectedProducts) {
      var formData = {
          jenis_pesanan: $("#paymentDropdown").val(),
          no_meja: $("#noMejaDropdown").val(),
          selectedProducts: selectedProducts,
      };

      console.log("Sending order data to controller:", formData);

      $.ajax({
          type: "POST",
          url: baseUrl + "kasir/order/add",
          data: JSON.stringify(formData),
          contentType: 'application/json',
          success: function (response) {
              console.log('Ajax Success:', response);

            // Check if the response contains id_transaction
            if (response.id_transaction) {
                // Redirect to the confirmation page with id_transaction
                window.location.href = baseUrl + 'kasir/transactions/confirm?id=' + response.id_transaction;
            } else {
                console.error('id_transaction not found in the response');
            }


          },
          error: function (error) {
              console.error(error);
          },
      });
  }

});
</script>
