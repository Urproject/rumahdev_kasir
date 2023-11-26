<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <form method="post" action="<?= base_url('/kasir/products/action') ?>" enctype="multipart/form-data">
        <input type="hidden" name="id_merchant" value="1">

        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="product_name">Nama Produk</label>
              <input type="text" class="form-control" id="product_name" name="product_name" style="width: 80%;">
            </div>
            <div class="form-group">
              <label for="product_price">Harga Produk</label>
              <input type="text" class="form-control" id="product_price" name="product_price" style="width: 80%;">
            </div>
            <div class="form-group">
              <label for="product_stock">Sisa Stok</label>
              <input type="text" class="form-control" id="product_stock" name="product_stock" style="width: 80%;">
            </div>
            <div class="form-group">
              <label for="product_category">Kategori</label>
              <input type="text" class="form-control" id="product_category" name="product_category" style="width: 80%;">
            </div>
            <div class="form-group">
              <label for="product_description">Deskripsi Produk</label>
              <textarea class="form-control" id="product_description" name="product_description" style="width: 80%;" rows="3"></textarea>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              <label for="discount_type">Diskon</label>
              <select class="form-control" id="discount_type" name="discount_type" style="width: 80%;">
                <option value="price">Harga</option>
                <option value="percent">Persentase</option>
              </select>
            </div>

            <div class="form-group">
              <label for="discount_amount">Banyak Diskon</label>
              <input type="text" class="form-control" id="discount_amount" name="discount_amount" style="width: 80%;">
            </div>
            
            <div class="form-group">
              <label for="product_image">Gambar Produk</label><br>
              <input type="file" name="product_image">
              <!-- <div class="custom-file" style="width: 80%;">
                <input type="file" class="custom-file-input" id="product_image" name="product_image" required>
                <label class="custom-file-label" for="product_image">Choose file...</label>
                <div class="invalid-feedback">Example invalid custom file feedback</div>
              </div> -->
            </div>


            <button class="btn btn-sm text-white rumahdev-bg border-0 my-4" type="submit">Tambah</button>
            <a href="<?= base_url('kasir/products') ?>" class="btn btn-sm btn-danger border-0">Batalkan</a>
          </div>
        </div>
      </form>
    </div>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
