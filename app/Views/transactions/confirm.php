<?php
$merchantModel = model('M_Merchant');
$merchantId = model('M_Employee')->getMerchantIdByUserId($userData['id_user']);
$merchantData = $merchantModel->find($merchantId);
$discountEnabled = $merchantData->diskon == 1;
$taxEnabled = $merchantData->pajak == 1;
?>

<div class="content-wrapper bg-white">
  <section class="content">
    <div class="container-fluid my-3">
      <form method="POST" action="/kasir/transactions/add">
        <input hidden name="id_transaction" value="<?= $transactions[0]->id_transaction ?>">
        <input hidden name="tanggal" value="<?= $transactions[0]->tanggal ?>">
        <input hidden name="waktu" value="<?= $transactions[0]->waktu ?>">
        <input hidden name="no_meja" value="<?= $transactions[0]->no_meja ?>">
        <input hidden name="jenis_pesanan" value="<?= $transactions[0]->jenis_pesanan ?>">

        <div class="row">
          <div class="col-md-6">
            <p>
              <b><?= esc($merchantData->nama_usaha); ?></b> <br>
              <span class="text-capitalize">Kasir: <?= esc($userData['nama']); ?> </span><br>
              Waktu, Tanggal: <?= $transactions[0]->waktu ?>, <?= $transactions[0]->tanggal ?> <br>
              <span class="text-capitalize">Jenis Pesanan: <?= $transactions[0]->jenis_pesanan ?></span>

              <?php if ($transactions[0]->jenis_pesanan == 'dine-in') : ?>
                . No. Meja: <?= esc($transactions[0]->no_meja); ?>
              <?php endif; ?>
            </p>
          </div>

          <div class="col-md-2">
            <label for="paymentDropdown">Jenis Pembayaran</label>
            <select id="paymentDropdown" class="form-control" name="id_method">
              <?php foreach ($paymentMethods as $paymentMethod) : ?>
                <option value="<?= esc($paymentMethod->id_method); ?>">
                  <?= esc($paymentTypes[$paymentMethod->id_method]); ?>
                </option>
              <?php endforeach; ?>
            </select>
          </div>

          <div class="col-md-4 mb-3">
            <label for="nominal">Nominal Bayar</label>
            <div class="input-group" style="width: 200px;">
              <input type="number" class="form-control rounded mr-2" id="nominalInput" placeholder="Rp 0">
              <a class="btn btn-sm text-white rumahdev-bg border-0" onclick="calculateChange()">OK</a>
            </div>
            <span id="errorSpan" style="color: red; font-size: 14px; font-style: italic; display: none;">Nominal bayar tidak boleh lebih kecil dari total harga.</span>
          </div>
        </div>

        <div class="order-details mb-5">
          <h5 class="font-weight-bold">Pesanan</h5>
          <hr class="my-1">

          <div class="row">
            <span class="col-sm-1 mb-2 font-weight-bold">Jumlah</span>
            <span class="col-sm-5 mb-2 font-weight-bold">Nama Produk</span>
            <span class="col-sm-2 mb-2 font-weight-bold">Harga Satuan</span>
            <span class="col-sm-4 mb-2 font-weight-bold">Subtotal</span>

            <?php
            $total_harga = 0; // Initialize total_harga
            $discountedTotal = 0; // Initialize discounted total

            foreach ($transactions as $transaction) :
              // Calculate subtotal
              $subtotal = $transaction->jumlah * $transaction->product_price;
              $total_harga += $subtotal;

              // Calculate discount
              $discount = 0; // Initialize discount variable

              // Retrieve discount information from product_info
              if ($transaction->product_info->jenis_diskon == 'percent') {
                $discount = ($transaction->product_info->nilai_diskon / 100) * $subtotal;
              } elseif ($transaction->product_info->jenis_diskon == 'price') {
                $discount = $transaction->product_info->nilai_diskon * $transaction->jumlah;
              }

              // Calculate discounted price for each product
              $discountedPrice = $subtotal - $discount;

              // Add discounted price to the discounted total
              $discountedTotal += $discountedPrice;
            ?>
              <div class="col-1">x<?= $transaction->jumlah ?></div>
              <div class="col-5"><?= $transaction->product_name ?></div>
              <input type="hidden" name="products[<?= $transaction->id_product ?>][id_product]" 
                value="<?= $transaction->id_product ?>">
              <input type="hidden" name="products[<?= $transaction->id_product ?>][jumlah]" 
                value="<?= $transaction->jumlah ?>">

              <div class="col-sm-2 text-secondary font-italic">
                Rp <?= $transaction->product_price ?><br>
                <?php if ($discount > 0 && $discountEnabled): ?>
                  Rp -<?= $discount ?>
                  <input type="hidden" name="products[<?= $transaction->id_product ?>][diskon]" 
                    value="<?= $discount ?>">
                <?php else: ?>
                  <input type="hidden" name="products[<?= $transaction->id_product ?>][diskon]" 
                    value="0">
                <?php endif; ?>
              </div>

              <div class="col-sm-4">
                <span class="font-italic">
                  <?php if ($discountEnabled): ?>
                    Rp <?= $discountedPrice ?>
                    <input type="hidden" name="products[<?= $transaction->id_product ?>][subtotal]" 
                      value="<?= $discountedPrice ?>">
                  <?php else: ?>
                    Rp <?= $subtotal ?> <!-- Show the actual price if discount is off -->
                    <input type="hidden" name="products[<?= $transaction->id_product ?>][subtotal]" 
                      value="<?= $subtotal ?>">
                  <?php endif; ?>
                </span>
              </div>
            <?php endforeach; ?>

            <div class="col-8 text-secondary mt-3">Subtotal</div>
            <div class="col-4 text-secondary mt-3">
              <?php if ($discountEnabled): ?>
                <input hidden name="total_diskon" value="<?= $total_harga - $discountedTotal ?>">
                Rp <?= $total_harga - ($total_harga - $discountedTotal) ?>
              <?php else: ?>
                <input hidden name="total_diskon" value="0">
                Rp <?= $total_harga ?> <!-- Set to total_harga if discount is off -->
              <?php endif; ?>
            </div>

            <?php if ($taxEnabled): ?>
              <div class="col-8 text-secondary">Pajak</div>
              <input hidden name="total_pajak" value="<?= ($total_harga - ($total_harga - $discountedTotal)) * 11 / 100 ?>">
              <div class="col-4 text-secondary">Rp <?= ($total_harga - ($total_harga - $discountedTotal)) * 11 / 100 ?></div>
            <?php else: ?>
              <input hidden name="total_pajak" value="0">
            <?php endif; ?>

            <div class="col-12">
              <hr class="my-1">
            </div>

            <div class="col-8 font-weight-bold">Total Harga</div>

            <div class="col-4 font-weight-bold">
              <?php if ($discountEnabled): ?>
                <?php
                $discountedTotal = 0;

                foreach ($transactions as $transaction) {
                  $subtotal = $transaction->jumlah * $transaction->product_price;
                  $discount = 0;

                  // Retrieve discount information from product_info
                  if ($transaction->product_info->jenis_diskon == 'percent') {
                    $discount = ($transaction->product_info->nilai_diskon / 100) * $subtotal;
                  } elseif ($transaction->product_info->jenis_diskon == 'price') {
                    $discount = $transaction->product_info->nilai_diskon * $transaction->jumlah;
                  }

                  // Calculate discounted price for each product
                  $discountedPrice = $subtotal - $discount;
                  $discountedTotal += $discountedPrice;
                }
                ?>

                <?php if ($taxEnabled): ?>
                  Rp <?= $discountedTotal + ($discountedTotal * 11 / 100) ?>
                  <input hidden name="total_harga" value="<?= $discountedTotal + ($discountedTotal * 11 / 100) ?>">
                <?php else: ?>
                  Rp <?= $discountedTotal ?>
                  <input hidden name="total_harga" value="<?= $discountedTotal ?>">
                <?php endif; ?>

              <?php else: ?>
                <?php if ($taxEnabled): ?>
                  Rp <?= $total_harga + ($total_harga * 11 / 100) ?> <!-- Include tax if discount is off and tax is on -->
                  <input hidden name="total_harga" value="<?= $total_harga + ($total_harga * 11 / 100) ?>">
                <?php else: ?>
                  Rp <?= $total_harga ?> <!-- No discount and tax, show the original total -->
                  <input hidden name="total_harga" value="<?= $total_harga ?>">
                <?php endif; ?>
              <?php endif; ?>
            </div>

            <div class="col-8 font-weight-bold">Nominal Bayar</div>
            <div class="col-4 font-weight-bold" id="nominalDisplay">Rp 0</div>
            <div class="col-8 font-weight-bold">Kembalian</div>
            <div class="col-4 font-weight-bold" id="kembalianDisplay">Rp 0</div>
          </div>
        </div>

        <div class="actions row">
          <div class="col-md-8 mb-3">
            <a href="<?= base_url('kasir/order') ?>">
              <button class="btn btn-sm text-white rumahdev-bg-hijau border-0">
                Pesanan Baru
              </button>
            </a>
          </div>
          <div class="col-md-4 mb-3">
            <button type="submit" class="btn btn-sm text-white rumahdev-bg-biru border-0 mr-2">
              <i class="fas fa-check"></i>
              Selesaikan
            </button>
            <a href="<?= base_url('kasir/transactions/edit?id=' . esc($transactions[0]->id_transaction)) ?>" class="btn btn-sm btn-warning text-white border-0">
              <i class="fas fa-edit"></i>
              Ubah
            </a>
            <!-- <a href="<?= base_url('kasir/order') ?>" class="btn btn-sm btn-danger text-white border-0">
              <i class="fas fa-trash-alt"></i>
              Batalkan
            </a> -->
          </div>
        </div>
      </form>
    </div>
  </section>
</div>


<script>
  function toggleErrorSpan(show) {
    var errorSpan = document.getElementById('errorSpan');
    errorSpan.style.display = show ? 'inline' : 'none';
  }

  function calculateChange() {
    var nominalInput = document.getElementById('nominalInput').value;
    var nominalValue = parseInt(nominalInput.replace('Rp ', '').replace(',', ''), 10) || 0;

    // Calculate the final total harga after applying discount and tax
    var totalHarga = <?php echo $discountEnabled ? $discountedTotal : $total_harga; ?>;
    totalHarga += <?php echo $taxEnabled ? ($discountedTotal * 11/100) : 0; ?>;

    if (nominalValue < totalHarga) {
      toggleErrorSpan(true);
      return;
    }
    toggleErrorSpan(false);

    var kembalian = nominalValue - totalHarga;
    document.getElementById('nominalDisplay').innerText = 'Rp ' + nominalValue;
    document.getElementById('kembalianDisplay').innerText = 'Rp ' + kembalian;
  }
</script>
