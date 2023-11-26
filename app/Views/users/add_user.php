
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">  
      
      <div class="row">
        <div class="col-md-6">

          <form method="post" action="<?= base_url('/kasir/users/action') ?>" enctype="multipart/form-data">
            <div class="form-group">
              <label>Nama Lengkap</label>
              <input type="text" class="form-control" style="width: 80%;" name="nama">
            </div>
            <div class="form-group">
              <label>Username</label>
              <input type="text" class="form-control" style="width: 80%;" name="username">
            </div>
            <div class="form-group">
              <label>Password</label>
              <input type="text" class="form-control" style="width: 80%;" name="password">
            </div>


            <div class="form-group">
              <label for="foto_profil">Foto Profil</label><br>
              <input type="file" name="foto_profil">
            </div>

            <button type="submit" class="btn btn-sm text-white rumahdev-bg border-0 my-4 mr-2">Simpan</button>
            <a href="<?= base_url('kasir/users') ?>" class="btn btn-sm btn-danger border-0">Batalkan</a>
          <form>
            
        </div>
      </div>

    </div>
  </section>
</div>