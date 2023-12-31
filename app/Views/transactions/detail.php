<?php
  $merchantModel = model('M_Merchant');
  $merchantId = model('M_Employee')->getMerchantIdByUserId($userData['id_user']);
  $merchantData = $merchantModel->find($merchantId);
?>

<!-- NILAI PAJAK BELUM SESUAI -->

<div class="content-wrapper bg-white">

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid mt-3">
      <div class="order-info row">
        <p class="col-8 mb-2">
          <b><?= esc($merchantData->nama_usaha); ?></b> <br>
          Kasir : <?= esc($userData['nama']); ?> <br>
          Waktu, Tanggal: <?= $transactions[0]->waktu ?>, <?= $transactions[0]->tanggal ?> 
        </p>
        <p class=" col-4 text-capitalize my-2">
          Jenis Pembayaran: <?= esc($paymentMethod->payment_type) ?><br>
          Jenis Pesanan: <?= esc($transactions[0]->jenis_pesanan) ?>

          <?php if ($transactions[0]->jenis_pesanan == 'dine-in') : ?>
            <br>No.Meja: <?= esc($transactions[0]->no_meja); ?>
          <?php endif; ?>
        </p>
      </div>

      <div class="order-details">
        <h5 class="font-weight-bold">Pesanan</h5>
        <hr class="m-1">

        <div class="row">
          <span class="col-sm-1 mb-2 font-weight-bold">Jumlah</span>
          <span class="col-sm-5 mb-2 font-weight-bold">Nama Produk</span>
          <span class="col-sm-2 mb-2 font-weight-bold">Harga Satuan</span>
          <span class="col-sm-4 mb-2 font-weight-bold">Subtotal</span>

          <?php 
            $total_harga = 0; // Initialize total_harga
            foreach ($transactions as $transaction) : 
              // Calculate subtotal
              $subtotal = $transaction->jumlah * $transaction->product_price;
              $total_harga += $subtotal;

              // Fetch corresponding discount and subtotal from TransactionSubModel
              $transactionSubModel = model('TransactionSubModel');
              $subTransaction = $transactionSubModel
                ->where('id_transaction', $transaction->id_transaction)
                ->where('id_product', $transaction->id_product)
                ->first();
          ?>
          <div class="col-1">x<?= $transaction->jumlah ?></div>
          <div class="col-5"><?= $transaction->product_name ?></div>
          <div class="col-sm-2 text-secondary font-italic">
            <?php if ($subTransaction) : ?>
              Rp <?= $transaction->product_price ?>

              <?php if ($subTransaction->diskon != 0) : ?>
                <br>Rp -<?= $subTransaction->diskon ?> <!-- Assuming diskon is the discount amount -->
              <?php endif; ?>

            <?php else : ?>
              Rp <?= $transaction->product_price ?><br>
              Rp 0
            <?php endif; ?>
          </div>
          <div class="col-sm-4 font-italic">
            <?php if ($subTransaction) : ?>
              Rp <?= $subTransaction->subtotal ?>
            <?php else : ?>
              Rp <?= $subtotal ?>
            <?php endif; ?>
          </div>
          <?php endforeach; ?>

          <div class="col-8 text-secondary mt-3">Subtotal</div>
          <div class="col-4 text-secondary mt-3">Rp <?= $total_harga ?></div>

          <div class="col-8 text-secondary">Diskon</div>
          <div class="col-4 text-secondary">
            <?php
              $totalDiskon = 0;
              foreach ($transactions as $transaction) {
                $subTransaction = $transactionSubModel
                  ->where('id_transaction', $transaction->id_transaction)
                  ->where('id_product', $transaction->id_product)
                  ->first();

                if ($subTransaction) { $totalDiskon += $subTransaction->diskon; }
              }
              echo 'Rp ' . $totalDiskon;
            ?>
          </div>

          <div class="col-8 text-secondary">Pajak</div>
          <div class="col-4 text-secondary">Rp 0</div>

          <div class="col-12">
            <hr class="my-1">
          </div>

          <div class="col-8 font-weight-bold">Total Harga</div>
          <div class="col-4 font-weight-bold">Rp <?= $transactions[0]->total_harga ?></div>
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
        <div class="col-8 my-5">
          <a href="<?= base_url('kasir/transactions') ?>" class="btn btn-sm text-white rumahdev-bg border-0">Kembali</a>
        </div>
        <div class="col-4 my-5">
          <button class="btn btn-sm text-white rumahdev-bg border-0">Cetak Struk</button>
        </div>
      </div>
    </div>
  </section>
  <!-- /.content -->
</div>