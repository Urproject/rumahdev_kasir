<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="keywords" content="rumahdev, kasir">
  <meta name="author" content="RumahDev">
  
  <title><?= $titleTab ?></title> 

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="icon" href="<?= base_url('assets/images/logo-rd.png'); ?>" type="image/png">
</head>
<body>

<div class="container row">
    <div class="col-md-8">
        <div class="order-info row mt-3">
            <p class="col-12 mb-2">
                <b><?= esc($merchantData->nama_usaha) ?></b> <br>
                Kasir: <?= esc($userData['nama']) ?> <br>
                Waktu, Tanggal: <?= $transactions[0]->waktu ?>, <?= $transactions[0]->tanggal ?> <br>
                <span class="text-capitalize my-2">
                    Jenis Pembayaran: <?= esc($paymentMethod->payment_type) ?><br>
                    Jenis Pesanan: <?= esc($transactions[0]->jenis_pesanan) ?>

                    <?= ($transactions[0]->jenis_pesanan == 'dine-in') ? '<br>No.Meja: ' . esc($transactions[0]->no_meja) : '' ?>
                </span>
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
                $totalHarga = 0;
                foreach ($transactions as $transaction) :
                    $subtotal = $transaction->jumlah * $transaction->product_price;
                    $totalHarga += $subtotal;

                    $subTransaction = model('TransactionSubModel')
                        ->where('id_transaction', $transaction->id_transaction)
                        ->where('id_product', $transaction->id_product)
                        ->first();
                    ?>
                    <div class="col-1">x<?= $transaction->jumlah ?></div>
                    <div class="col-5"><?= $transaction->product_name ?></div>
                    <div class="col-sm-2 text-secondary font-italic">
                        <?= ($subTransaction) ?
                            'Rp ' . $transaction->product_price . (($subTransaction->diskon != 0) ? '<br>Rp -' . $subTransaction->diskon : '') :
                            'Rp ' . $transaction->product_price . '<br>Rp 0' ?>
                    </div>
                    <div class="col-sm-4 font-italic">
                        <?= ($subTransaction) ? 'Rp ' . $subTransaction->subtotal : 'Rp ' . $subtotal ?>
                    </div>
                <?php endforeach; ?>

                <?php $totalDiskon = 0; ?>
                <div class="col-8 text-secondary mt-3">Subtotal</div>
                <div class="col-4 text-secondary mt-3">Rp <?= $totalHarga ?></div>

                <div class="col-8 text-secondary">Diskon</div>
                <div class="col-4 text-secondary">
                    <?php
                    foreach ($transactions as $transaction) {
                        $subTransaction = model('TransactionSubModel')
                            ->where('id_transaction', $transaction->id_transaction)
                            ->where('id_product', $transaction->id_product)
                            ->first();

                        if ($subTransaction) {
                            $totalDiskon += $subTransaction->diskon;
                        }
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
    </div>
</div>

</body>
</html>
