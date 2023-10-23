<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper bg-white">

  <!-- Main content -->
  <section class="content">

    <div class="container-fluid">  
      <a href="<?= base_url('home/users') ?>" class="btn btn-sm text-white rumahdev-bg border-0 my-3">Kembali</a>
      <?php if (!empty($user)) { ?>

        <div class="row">
          <div class="col-md-6">

            <div class="form-group">
              <label>Nama Lengkap</label>
              <input type="text" class="form-control" value="<?php echo $user->nama; ?>" disabled style="width: 80%;">
            </div>
            <div class="form-group">
              <label>Username</label>
              <input type="text" class="form-control" value="<?php echo $user->username; ?>" disabled style="width: 80%;">
            </div>
            <div class="form-group">
              <label>Email</label>
              <input type="text" class="form-control" value="<?php echo $user->email; ?>" disabled style="width: 80%;">
            </div>
            <div class="form-group">
              <label>Nomor Handphone</label>
              <input type="text" class="form-control" value="<?php echo $user->no_hp; ?>" disabled style="width: 80%;">
            </div>
            <div class="form-group">
              <label>Jenis Kelamin</label>
              <input type="text" class="form-control" value="<?php echo $user->gender; ?>" disabled style="width: 80%;">
            </div>
          </div>


          <div class="col-md-6">
            <div class="form-group">
              <label>Alamat Lengkap</label>
              <textarea class="form-control" style="width: 80%;" rows="3" disabled><?php echo $user->alamat; ?></textarea>
            </div>

            <div>
              <label>Foto Profil</label><br>
              <img class="rounded mb-3" width="200"
              alt="<?php echo base_url('assets/images/user/' . $user->foto); ?>" 
              src="<?php echo base_url('assets/images/user/' . $user->foto); ?>">
            </div>

            <button class="btn btn-warning mt-3 mr-2">Edit</button>
            <button class="btn btn-danger mt-3">Hapus</button>

          </div>

        </div>

        <?php } else { ?>
          <p>User not found.</p>
        <?php } ?>

      </div>

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->