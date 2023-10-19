

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Main content -->
    <section class="content bg-white">

<!-- Your view file -->
<div class="order-info">
    <p>Waktu, Tanggal: <?= $transactions[0]->waktu ?>, <?= $transactions[0]->tanggal ?></p>
</div>
<div class="order-details">
    <?php 
        $total_harga = 0; // Initialize total_harga

        foreach ($transactions as $transaction) : 
            // Calculate subtotal
            $subtotal = $transaction->jumlah * $transaction->product_price;
            $total_harga += $subtotal;

    ?>
        <p>
            <span><?= $transaction->jumlah ?></span>
            <span><?= $transaction->product_name ?></span> <!-- Display product name instead of id_product -->
            <span><?= $transaction->product_price ?></span> <!-- Display product price (product_price) -->
            <span><?= $subtotal ?></span> <!-- Display subtotal -->
        </p>
    <?php endforeach; ?>
    <p>
        <span>Total Harga: <?= $total_harga ?></span> <!-- Display total_harga -->
    </p>
</div>




        <div class="row" style="height: 10000px;">

        	<h1>Konfirmasi Pesanan</h1>
        </div>
        <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
