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


<p>
  <br><span style="font-weight: bold;"><?= esc($merchantData->nama_usaha) ?></span>
  <br>Kasir: <?= esc($userData['nama']) ?>
  <br>Waktu, Tanggal: <?= $transactions[0]->waktu ?>, <?= $transactions[0]->tanggal ?>
  <span style="text-transform: capitalize;">
    <br>Jenis Pembayaran: <?= esc($paymentMethod->payment_type) ?>
    <br>Jenis Pesanan: <?= esc($transactions[0]->jenis_pesanan) ?>
    <br>No. Meja: <?= ($transactions[0]->jenis_pesanan == 'dine-in') ? esc($transactions[0]->no_meja) : '' ?>
  </span>
</p>

<h4>Pesanan</h4>
<hr>

<table>
  <tr>
    <td style="font-weight: bold; width: 50px;">Jumlah</td>
    <td style="font-weight: bold;">Nama Produk</td>
    <td style="font-weight: bold; text-align: right;">Harga Satuan</td>
    <td style="font-weight: bold; text-align: right;">Subtotal</td>
  </tr>


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

  <tr>
    <td>x<?= $transaction->jumlah ?></td>
    <td><?= $transaction->product_name ?></td>
    <td style="text-align: right; color: gray; font-style: italic;">
      <?= ($subTransaction) ?
        'Rp ' . $transaction->product_price . (($subTransaction->diskon != 0) ? '
        <br>Rp -' . $subTransaction->diskon : '') :'Rp ' . $transaction->product_price . '<br>Rp 0' 
      ?>
    </td>
    <td style="text-align: right; font-style: italic;"><?= ($subTransaction) ? 'Rp ' . $subTransaction->subtotal : 'Rp ' . $subtotal ?></td>
  </tr>

  <?php endforeach; ?>

  <?php $totalDiskon = 0; ?>

  <hr>

  <tr style="color: grey;">
    <td>Subtotal</td>
    <td></td>
    <td></td>
    <td style="text-align: right;">Rp <?= $totalHarga ?></td>
  </tr>

  <tr style="color: grey;">
    <td>Diskon</td>
    <td></td>
    <td></td>
    <td style="text-align: right;">
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
    </td>
  </tr>

  <?php
    $userId = session()->get('id_user');
    $merchantId = model('M_Employee')->getMerchantIdByUserId($userId);
    $settingData = model('M_Merchant')->find($merchantId);
  ?>
  <tr style="color: grey;">
    <td>Pajak</td>
    <td></td>
    <td></td>
    <td style="text-align: right;">
      <?php
        if ($settingData->pajak == 1) {
          $pajak = 11 / 100 * $totalHarga;
        echo 'Rp ' . $pajak;
        } else {
        echo 'Rp 0';
        }
      ?>
    </td>
  </tr>

  <tr>
    <td colspan="2">Total Harga</td>
    <td></td>
    <td style="text-align: right;">Rp <?= $transactions[0]->total_harga ?></td>
  </tr>

</table>

</body>
</html>
