

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper bg-white">

    <!-- Main content -->
    <section class="content">

			<div class="container-fluid">
				<div class="order-info">
				    <p>Waktu, Tanggal: <?= $transactions[0]->waktu ?>, <?= $transactions[0]->tanggal ?></p>
				</div>

				<div class="row">
					<div class="col-md-8 mb-3">
						<p class="mb-1">Jenis Pembayaran:</p>
						<button class="btn btn-sm btn-outline-secondary text-white rumahdev-bg mr-1">Cash</button>
						<button class="btn btn-sm btn-outline-secondary mr-1">QRIS</button>
						<button class="btn btn-sm btn-outline-secondary mr-1">Transfer</button>
						<button class="btn btn-sm btn-outline-secondary mr-1">VA</button>
					</div>

					<div class="col-md-4 mb-3">
						<p class="mb-1">Jenis Pesanan:</p>
						<button class="btn btn-sm btn-outline-secondary text-white rumahdev-bg mr-1">Dine In</button>
						<button class="btn btn-sm btn-outline-secondary mr-1">Take Away</button>
					</div>

				  <div class="form-group col-6">
				  	<div class="row">
					    <label for="nominal" class="col-sm-3 col-form-label">Nominal Bayar:</label>
					    <div class="col-sm-4">
					      <input type="text" class="form-control-sm" id="nominal" placeholder="Rp 0">
					    </div>
					    <div class="col-sm-1">
								<button class="btn btn-sm text-white rumahdev-bg border-0">OK</button>
							</div>
						</div>
				  </div>
				</div>

				
				<div class="order-details">
					<h5 class="font-weight-bold">Pesanan</h5><hr class="m-1">
			    <div class="row">

						<?php 
					    $total_harga = 0; // Initialize total_harga

					    foreach ($transactions as $transaction) : 
				        // Calculate subtotal
				        $subtotal = $transaction->jumlah * $transaction->product_price;
				        $total_harga += $subtotal;
						?>
		        
		        <div class="col-md-1">x<?= $transaction->jumlah ?></div>
		        <div class="col-md-7"><?= $transaction->product_name ?></div> 
		        <div class="col-md-4">Rp <?= $subtotal ?></div> 

						<?php endforeach; ?>

						<div class="col-sm-8 text-secondary mt-3">Subtotal</div>
						<div class="col-sm-4 text-secondary mt-3">Rp 40.000</div>
						<div class="col-sm-8 text-secondary">Diskon</div>
						<div class="col-sm-4 text-secondary">Rp 0</div>
						<div class="col-sm-8 text-secondary">Pajak</div>
						<div class="col-sm-4 text-secondary">Rp 0</div>

						<div class="col-sm-12">
							<hr class="m-1">
						</div>

						<div class="col-sm-8 font-weight-bold">Total Harga</div>
						<div class="col-sm-4 font-weight-bold">Rp <?= $total_harga ?></div>
						<div class="col-sm-8 font-weight-bold">Nominal Bayar </div>
						<div class="col-sm-4 font-weight-bold">Rp 40.000</div>
						<div class="col-sm-8 font-weight-bold">Kembalian </div>
						<div class="col-sm-4 font-weight-bold">Rp 0</div>
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
						<button class="btn btn-sm btn-danger border-0">Batalkan</button>
						<button class="btn btn-sm text-white rumahdev-bg border-0">Cetak Struk</button>
					</div>
				</div>

			</div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
