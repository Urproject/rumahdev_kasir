

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper bg-white">

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid my-3">      

        <div class="row">

				<?php foreach ($products as $product) { ?>

          <div class="col-md-6">
            <div class="form-group">
              <label>Nama Produk</label>
              <input type="text" class="form-control" value="<?php echo $product->nama; ?>" style="width: 80%;">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Harga Produk</label>
              <input type="text" class="form-control" value="Rp <?php echo $product->harga; ?>" style="width: 80%;">
            </div>
            <div class="form-group">
              <label>Sisa Stok</label>
              <input type="text" class="form-control" value="<?php echo $product->stok; ?>" style="width: 80%;">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Kategori</label>
              <input type="text" class="form-control" value="<?php echo $product->kategori; ?>" style="width: 80%;">
            </div>
            <div class="form-group">
              <label>Deskripsi Produk</label>
              <textarea class="form-control" style="width: 80%;" rows="4"><?php echo $product->deskripsi; ?></textarea>
            </div>
          </div>


          <div class="col-md-6">
            <div class="form-group">
            <div class="form-group">
              <label for="exampleFormControlSelect1">Diskon</label>
              <select class="form-control" value="<?php echo $product->jenis_diskon; ?>" style="width: 80%;">
                <option>Harga</option>
                <option>Persentase</option>
              </select>
            </div>

            <div class="form-group">
              <label>Banyak Diskon</label>
              <input type="text" class="form-control" value="<?php echo $product->nilai_diskon; ?>" style="width: 80%;">
            </div>

            <div>
              <label>Gambar Produk</label><br>
							<img class="rounded mb-3" src="<?php echo base_url('assets/images/produk/' . $product->gambar); ?>">
              <div class="custom-file" style="width: 80%;">
                <input type="file" class="custom-file-input" id="validatedCustomFile" required>
                <label class="custom-file-label" for="validatedCustomFile">Ganti gambar produk...</label>
                <div class="invalid-feedback">Example invalid custom file feedback</div>
              </div>
            </div>

				<?php } ?>

          </div>

					<button class="btn btn-sm rumahdev-bg border-0 text-white mr-2">Simpan</button>
					<a href="<?= base_url('kasir/products') ?>" class="btn btn-sm btn-danger border-0">Batalkan</a>

        </div>
      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
