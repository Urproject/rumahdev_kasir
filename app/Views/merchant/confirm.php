

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper bg-white">

    <!-- Main content -->
    <section class="content">

			<div class="container-fluid">
				<div class="row">

					<div class="col-md-12 mt-3">
				  	<p>Waktu, Tanggal: <?= $transactions[0]->waktu ?>, <?= $transactions[0]->tanggal ?></p>
					</div>

					<div class="col-md-4 mb-3">
				    <label for="paymentDropdown">Jenis Pembayaran</label>
				    <select id="paymentDropdown" class="form-control">
			        <option value="Cash">Cash</option>
			        <option value="QRIS">QRIS</option>
			        <option value="Transfer">Transfer</option>
			        <option value="VA">Virtual Account</option>
				    </select>
					</div>

					<div class="col-md-8 mb-3">
						<label for="nominal">Nominal Bayar</label>
				    <div class="input-group" style="width: 300px;">
					    <input type="text" class="form-control rounded mr-2" id="nominal" placeholder="Rp 0">
							<button class="btn text-white rumahdev-bg border-0">OK</button>
				    </div>
					</div>

				</div> 

				
 				<div class="order-details mb-5">
					<h5 class="font-weight-bold">Pesanan</h5>
					<hr class="my-1">

			    <div class="row">

						<?php 
					    $total_harga = 0; // Initialize total_harga

					    foreach ($transactions as $transaction) : 
				        // Calculate subtotal
				        $subtotal = $transaction->jumlah * $transaction->product_price;
				        $total_harga += $subtotal;
						?>
		        
		        <div class="col-1">x<?= $transaction->jumlah ?></div>
		        <div class="col-7"><?= $transaction->product_name ?></div> 
		        <div class="col-4">Rp <?= $subtotal ?></div> 
		        <!-- <div class="col-8"></div>   -->
		        <!-- <div class="col-4 text-secondary"><i>-diskon</i></div>  -->

						<?php endforeach; ?>

						<div class="col-8 text-secondary mt-3">Subtotal</div>
						<div class="col-4 text-secondary mt-3">Rp 40000</div>

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
						<div class="col-4 font-weight-bold">Rp 40000</div>
						<div class="col-8 font-weight-bold">Kembalian </div>
						<div class="col-4 font-weight-bold">Rp 0</div>
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
					<div class="col-8">
						<a href="<?= base_url('kasir/order') ?>" class="col-12 my-3">
							<button class="btn text-white rumahdev-bg-hijau border-0">
								Pesanan Baru
							</button>
						</a>
					</div>
					<div class="col-md-4">
						<a href="<?= base_url('kasir/order') ?>" class="btn btn-warning text-white border-0 mr-2">
							<i class="fas fa-edit"></i>
							Ubah
						</a>
						<button class="btn text-white rumahdev-bg-biru border-0">Selesaikan</button>
					</div>
				</div> 

			</div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
