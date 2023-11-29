
<div class="content-wrapper bg-white">
  <section class="content">

    <div class="container-fluid row my-3">
      <div class="col-12">
        <a href="<?= base_url('kasir/users') ?>" class="btn btn-sm text-white rumahdev-bg border-0 mb-3">Kembali</a>
      </div>

      <?php if (!empty($userData)) { ?>

      <div class="col-md-12 bg-white">
        <h4 class="font-weight-bold">Detail Profil Akun</h4>
      </div>

      <div class="col-md-6">
        <div class="row mb-3">
          <div class="col-4 my-auto">
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
            <img src="<?= $imgSrc ?>" class="rounded w-100 border-0" alt="User Image">

          </div>
          <div class="col-8 my-auto">
          </div>
        </div>

        <div class="form-group">
          <label>Nama Lengkap</label>
          <input type="text" class="form-control" value="<?php echo $user->nama; ?>" disabled>
        </div>

        <div class="form-group">
          <label>Username</label>
          <input type="text" class="form-control" value="<?php echo $user->username; ?>" disabled>
        </div>

        <div class="form-group">
          <label>Password</label>
          <input type="text" class="form-control" value="<?php echo $user->password; ?>" disabled>
        </div>

        <div class="float-right">
          <button class="btn btn-sm btn-warning my-3 mr-2">
          <a href="<?= base_url('kasir/users/edit?id=' . $user->id_user) ?>" class="text-white">Edit</a>
          </button>
          <button class="btn btn-sm btn-danger my-3 deleteButton">Hapus</button>
        </div>

      </div>

      <?php } else { ?>
        <p>User not found.</p>
      <?php } ?>

        
    </div>
    
  </section>
</div>
