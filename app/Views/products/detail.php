

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper bg-white">

    <!-- Main content -->
    <section class="content py-3">
      <div class="container-fluid">      
        <a href="<?= base_url('kasir/products') ?>" class="btn btn-sm text-white rumahdev-bg border-0 mb-3">Kembali</a>
     
        <div class="row">


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
							<img class="rounded mb-3" src="<?php echo base_url('assets/images/produk/' . $product->gambar); ?>" style="width: 50%;">
            </div>


          </div>

<!--           <div class="action">
  					<a href="<?= base_url('kasir/products/edit') ?>" class="btn btn-sm btn-warning mr-2">Edit</a>
  					<button class="btn btn-sm btn-danger deleteButton">Hapus</button>
          </div> -->

        </div>
      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
