
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row">

          <div class="col-md-6">
            <div class="form-group">
              <label for="exampleInputEmail1">Nama Produk</label>
              <input type="text" class="form-control" id="exampleInputEmail1" style="width: 80%;">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Harga Produk</label>
              <input type="text" class="form-control" id="exampleInputPassword1" style="width: 80%;">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Sisa Stok</label>
              <input type="text" class="form-control" id="exampleInputEmail1" style="width: 80%;">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Kategori</label>
              <input type="text" class="form-control" id="exampleInputPassword1" style="width: 80%;">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Deskripsi Produk</label>
              <textarea class="form-control" id="exampleInputEmail1" style="width: 80%;" rows="3"></textarea>
            </div>
          </div>


          <div class="col-md-6">
            <div class="form-group">
            <div class="form-group">
              <label for="exampleFormControlSelect1">Diskon</label>
              <select class="form-control" id="exampleFormControlSelect1" style="width: 80%;">
                <option>Harga</option>
                <option>Persentase</option>
              </select>
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Banyak Diskon</label>
              <input type="text" class="form-control" id="exampleInputEmail1" style="width: 80%;">
            </div>

            <div>
              <label for="exampleInputEmail1">Gambar Produk</label>
              <div class="custom-file" style="width: 80%;">
                <input type="file" class="custom-file-input" id="validatedCustomFile" required>
                <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                <div class="invalid-feedback">Example invalid custom file feedback</div>
              </div>
            </div>

            <button class="btn text-white rumahdev-bg border-0 my-4">Tambah</button>
            <a href="<?= base_url('kasir/products') ?>" class="btn btn-danger border-0">Batalkan</a>
          </div>

        </div>
      </div>


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
