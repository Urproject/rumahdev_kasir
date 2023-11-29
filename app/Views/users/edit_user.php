<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper bg-white">

  <!-- Main content -->
  <section class="content">

    <div class="container-fluid">  
      <?php if (!empty($user)) { ?>

      <?php
      $failedNotification = session()->getFlashdata('failed');
      if ($failedNotification) { echo '<div class="alert alert-danger">' . $failedNotification . '</div>'; }
      ?>

      <?php
      $successNotification = session()->getFlashdata('success');
      if ($successNotification) { echo '<div class="alert alert-success">' . $successNotification . '</div>'; }
      ?>

        <form method="post" action="<?= base_url('/kasir/users/editAction') ?>"enctype="multipart/form-data">
        <div class="row mt-3">
          <div class="col-md-6">
            <input name="id_user" value="<?php echo $user->id_user; ?>" hidden>

            <div class="form-group">
              <label>Nama Lengkap</label>
              <input name="nama" type="text" class="form-control" value="<?php echo $user->nama; ?>" style="width: 80%;">
            </div>
            <div class="form-group">
              <label>Username</label>
              <input name="username" type="text" class="form-control" value="<?php echo $user->username; ?>" style="width: 80%;">
            </div>
            <div class="form-group">
              <label>Password</label>
              <input name="password" type="text" class="form-control" value="<?php echo $user->password; ?>" style="width: 80%;">
            </div>

            <div class="my-3">
              <label>Foto Profil</label><br>
              <?php
              $profilePicture = 'assets/images/user/' . $user->foto;
              $defaultPicture = 'assets/images/user/default-profile.jpg'; // Change the extension if needed

              // Check if the profile picture exists, if not, use the default picture
              if (file_exists($profilePicture)) {
                  $imgSrc = base_url($profilePicture);
              } else {
                  $imgSrc = base_url($defaultPicture);
              }
              ?>
              <img class="rounded mb-3" width="200"
              alt="User Image" 
              src="<?= $imgSrc ?>">
              <div class="custom-file" style="width: 80%;">
                <input name="foto" type="file" class="custom-file-input" id="validatedCustomFile" style="cursor: pointer;">
                <label class="custom-file-label" for="validatedCustomFile">Ganti foto profil...</label>
                <div class="invalid-feedback">Example invalid custom file feedback</div>
              </div>
            </div>

            <button  type="submit" class="btn btn-sm rumahdev-bg border-0 text-white mr-2 mb-3">Simpan</button>
            <a href="<?= base_url('kasir/users') ?>" class="btn btn-sm btn-danger border-0 mb-3">Batalkan</a>

          </div>
          
        </div>
        </form>

        <?php } else { ?>
          <p>User not found.</p>
        <?php } ?>

      </div>

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->