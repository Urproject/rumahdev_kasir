

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper bg-white">

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">      
        <a href="<?= base_url('home/products') ?>" class="btn btn-sm text-white rumahdev-bg border-0 my-3">Kembali</a>
     
        <div class="row">

				<?php foreach ($products as $product) { ?>

          <div class="col-md-6">
            <div class="form-group">
              <label>Nama Produk</label>
              <input type="text" class="form-control" disabled value="<?php echo $product->nama; ?>" style="width: 80%;">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Harga Produk</label>
              <input type="text" class="form-control" disabled value="Rp <?php echo $product->harga; ?>" style="width: 80%;">
            </div>
            <div class="form-group">
              <label>Sisa Stok</label>
              <input type="text" class="form-control" disabled value="<?php echo $product->stok; ?>" style="width: 80%;">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Kategori</label>
              <input type="text" class="form-control" disabled value="<?php echo $product->kategori; ?>" style="width: 80%;">
            </div>
            <div class="form-group">
              <label>Deskripsi Produk</label>
              <textarea class="form-control" disabled style="width: 80%;" rows="4"><?php echo $product->deskripsi; ?></textarea>
            </div>
          </div>


          <div class="col-md-6">
            <div class="form-group">
            <div class="form-group">
              <label for="exampleFormControlSelect1">Diskon</label>
              <select class="form-control" disabled value="<?php echo $product->jenis_diskon; ?>" style="width: 80%;">
                <option>Harga</option>
                <option>Persentase</option>
              </select>
            </div>

            <div class="form-group">
              <label>Banyak Diskon</label>
              <input type="text" class="form-control" disabled value="<?php echo $product->nilai_diskon; ?>" style="width: 80%;">
            </div>

            <div>
              <label>Gambar Produk</label><br>
							<img class="rounded mb-3" src="<?php echo base_url('assets/images/produk/' . $product->gambar); ?>">
            </div>

				<?php } ?>

          </div>

					<button class="btn btn-sm btn-warning mr-2">Edit</button>
					<button class="btn btn-sm btn-danger">Hapus</button>

        </div>
      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
