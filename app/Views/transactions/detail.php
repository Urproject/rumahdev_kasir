

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper bg-white">

    <!-- Main content -->
    <section class="content">

			<div class="container-fluid">
				<div class="order-info">
						<a href="<?= base_url('kasir/transactions') ?>" class="btn btn-sm text-white rumahdev-bg border-0 my-3">Kembali</a>
				    <p>Waktu, Tanggal: <?= $transactions[0]->waktu ?>, <?= $transactions[0]->tanggal ?></p>
						<p class="mb-1">Jenis Pembayaran: <?= $transactions[0]->id_method ?> Cash</p>
						<p class="mb-1">Jenis Pesanan: <?= $transactions[0]->jenis_pesanan ?></p>
				</div>

				<div class="order-details">
					<h5 class="font-weight-bold">Pesanan</h5>
					<hr class="m-1">
					
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
		        <!-- <div class="col-8"></div>   -->
		        <!-- <div class="col-4 text-secondary"><i>-diskon</i></div>  -->

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
						<div class="col-4 font-weight-bold">Rp 0</div>
						<div class="col-8 font-weight-bold">Kembalian </div>
						<div class="col-4 font-weight-bold">Rp 0</div>
				  </div>
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
					<div class="col-sm-8"></div>
					<div class="col-sm-4">
						<br><br>
						<button class="btn btn-sm text-white rumahdev-bg border-0">Cetak Struk</button>
					</div>
				</div>

			</div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
