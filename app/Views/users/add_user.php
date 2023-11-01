
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">  
        <!-- <div class="row">
          <div class="col-sm-1 d-flex align-items-center justify-content-center">
            <button class="btn btn-sm btn-outline-secondary rounded-circle" style="width: 50%;">1</button>
          </div>
          <p class="col m-0 p-0">
            <span class="font-weight-bold">Permintaan Karyawan </span>
            <br>Terima atau hapus permintaan
          </p>
        </div>

        <h5 class="font-weight-bold mt-3">Tambahkan Manual</h5> -->
        
        <div class="row">
          <div class="col-md-6">

            <div class="form-group">
              <label>Nama Lengkap</label>
              <input type="text" class="form-control" style="width: 80%;">
            </div>
            <div class="form-group">
              <label>Username</label>
              <input type="text" class="form-control" style="width: 80%;">
            </div>
            <div class="form-group">
              <label>Password</label>
              <input type="text" class="form-control" style="width: 80%;">
            </div>
            <div class="form-group">
              <label>Email</label>
              <input type="text" class="form-control" style="width: 80%;">
            </div>
            <div class="form-group">
              <label>Nomor Handphone</label>
              <input type="text" class="form-control" style="width: 80%;">
            </div>
            <div class="form-group">
              <label for="exampleFormControlSelect1">Jenis Kelamin</label>
              <select class="form-control" id="exampleFormControlSelect1" style="width: 80%;">
                <option>Pria</option>
                <option>Wanita</option>
              </select>
            </div>
          </div>


          <div class="col-md-6">
            <div class="form-group">
              <label>Alamat Lengkap</label>
              <textarea class="form-control" style="width: 80%;" rows="3"></textarea>
            </div>

            <div>
              <label>Foto Profil</label><br>
              <div class="custom-file" style="width: 80%;">
                <input type="file" class="custom-file-input" id="validatedCustomFile">
                <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                <div class="invalid-feedback">Example invalid custom file feedback</div>
              </div>
            </div>

            <button class="btn btn-sm text-white rumahdev-bg border-0 my-4 mr-2">Simpan</button>
            <a href="<?= base_url('kasir/users') ?>" class="btn btn-sm btn-danger border-0">Batalkan</a>
          </div>

        </div>
      </div>


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
