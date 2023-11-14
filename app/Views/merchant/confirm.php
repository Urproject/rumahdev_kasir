<?php
$merchantModel = new \App\Models\M_Merchant();
$merchantId = model('M_Employee')->getMerchantIdByUserId($userData['id_user']);
$merchantData = $merchantModel->find($merchantId);
?>

<div class="content-wrapper bg-white">
  <section class="content">
    <div class="container-fluid my-3">

      <div class="row">

        <div class="col-md-6">
          <p>
            <b><?= esc($merchantData->nama_usaha); ?></b> <br>
            Kasir : <?= esc($userData['nama']); ?> <br>
            Waktu, Tanggal: <?= $transactions[0]->waktu ?>, <?= $transactions[0]->tanggal ?>
          </p>
        </div>

        <div class="col-md-2">
          <label for="paymentDropdown">Jenis Pembayaran</label>
          <select id="paymentDropdown" class="form-control">
            <option value="Cash">Cash</option>
            <option value="QRIS">QRIS</option>
            <option value="Transfer">Transfer</option>
            <option value="VA">Virtual Account</option>
          </select>
        </div>

        <div class="col-md-4 mb-3">
          <label for="nominal">Nominal Bayar</label>
          <div class="input-group" style="width: 200px;">
            <input type="number" class="form-control rounded mr-2" id="nominalInput" placeholder="Rp 0">
            <button class="btn btn-sm text-white rumahdev-bg border-0" onclick="calculateChange()">OK</button>
          </div>
          <span id="errorSpan" style="color: red; font-size: 14px; font-style: italic; display: none;">Nominal bayar tidak boleh lebih kecil dari total harga.</span>
        </div>

      </div> 

      <div class="order-details mb-5">
        <h5 class="font-weight-bold">Pesanan</h5>
        <hr class="my-1">

        <div class="row">
          <div class="col-1 d-none mb-2 font-weight-bold">Jumlah</div>
          <div class="col-5 d-none mb-2 font-weight-bold">Nama Produk</div> 
          <div class="col-2 d-none mb-2 font-weight-bold">Harga Satuan</div> 
          <div class="col-4 d-none mb-2 font-weight-bold">Subtotal</div> 

          <?php 
          $total_harga = 0; // Initialize total_harga

          foreach ($transactions as $transaction) : 
            // Calculate subtotal
            $subtotal = $transaction->jumlah * $transaction->product_price;
            $total_harga += $subtotal;
          ?>
          <div class="col-1">x<?= $transaction->jumlah ?></div>
          <div class="col-5"><?= $transaction->product_name ?></div>
          <div class="col-sm-2 text-secondary font-italic">Rp <?= $transaction->product_price ?></div>
          <div class="col-sm-4">Rp <?= $subtotal ?></div> 
          <?php endforeach; ?>

          <div class="col-8 text-secondary mt-3">Subtotal</div>
          <div class="col-4 text-secondary mt-3">Rp <?= $total_harga ?></div>

          <div class="col-8 text-secondary">Diskon</div>
          <div class="col-4 text-secondary">Rp 0</div>

          <div class="col-8 text-secondary">Pajak</div>
          <div class="col-4 text-secondary">Rp 0</div>

          <div class="col-12">
            <hr class="my-1">
          </div>

          <div class="col-8 font-weight-bold">Total Harga</div>
          <div class="col-4 font-weight-bold">Rp <?= $total_harga ?></div>
	        <div class="col-8 font-weight-bold">Nominal Bayar </div>
	        <div class="col-4 font-weight-bold" id="nominalDisplay">Rp 0</div>
	        <div class="col-8 font-weight-bold">Kembalian </div>
	        <div class="col-4 font-weight-bold" id="kembalianDisplay">Rp 0</div>
        </div>
      </div> 

      <div class="actions row">
        <br>
        <!-- <form>
          <div class="form-group">
            <label for="buktiBayar">Bukti Bayar</label>
            <input type="file" class="form-control-file" id="buktiBayar">
          </div>
        </form> -->
        <div class="col-md-8 my-3">
          <a href="<?= base_url('kasir/order') ?>">
            <button class="btn btn-sm text-white rumahdev-bg-hijau border-0">
              Pesanan Baru
            </button>
          </a>
        </div>
        <div class="col-md-4 mb-3">
          <a href="<?= base_url('kasir/order') ?>" class="btn btn-sm btn-warning text-white border-0 mr-2">
            <i class="fas fa-edit"></i>
            Ubah
          </a>
          <button class="btn btn-sm text-white rumahdev-bg-biru border-0">Selesaikan</button>
        </div>
      </div> 

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
  var totalHarga = parseInt('<?= $total_harga ?>', 10) || 0;
  if (nominalValue < totalHarga) {
    toggleErrorSpan(true);
    return; }
  toggleErrorSpan(false); 

  var kembalian = nominalValue - totalHarga;
  document.getElementById('nominalDisplay').innerText = 'Rp ' + nominalValue;
  document.getElementById('kembalianDisplay').innerText = 'Rp ' + kembalian;
}
</script>