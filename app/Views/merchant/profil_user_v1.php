
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper bg-white">

  <!-- Main content -->
  <section class="content">

    <div class="container-fluid row mt-3">
      <?php if (!empty($userData)) { ?>

      <div class="col-md-12 bg-white mb-3">
        <h3 class="font-weight-bold">Profil Akun</h3>
      </div>

      <div class="col-md-6">

        <div class="row mb-3">
          <div class="col-2 my-auto">
            <?php
            $profilePicture = 'assets/images/user/' . esc($userData['foto']);
            $defaultPicture = 'assets/images/user/default-profile.jpg'; // Change the extension if needed

            // Check if the profile picture exists, if not, use the default picture
            if (file_exists($profilePicture)) {
                $imgSrc = base_url($profilePicture);
            } else {
                $imgSrc = base_url($defaultPicture);
            }
            ?>
            <img src="<?= $imgSrc ?>" class="rounded w-100 border" alt="User Image">

          </div>
          <div class="col-10 my-auto">
            <p>
              <b><?= $userData['nama']; ?></b> <br> 
              <?= $userData['username']; ?>
            </p>
          </div>
        </div>

        <div class="form-group">
          <label>Email</label>
          <input type="text" class="form-control" value="<?= $userData['email']; ?>" disabled>
        </div>

        <div class="form-group">
          <label>Nomor Handphone</label>
          <input class="form-control" value="<?= $userData['no_hp']; ?>" disabled>
        </div>

        <div class="form-group">
          <label>Jenis Kelamin</label>
          <input class="form-control" value="<?= $userData['gender']; ?>" disabled>
        </div>

        <div class="form-group">
          <label>Alamat Lengkap</label>
          <textarea class="form-control" disabled><?= $userData['alamat']; ?></textarea>
        </div>

        <!-- <a href="<?= base_url('kasir/users/edit?id=' . esc($userData['id_user'])) ?>">
          <button class="btn btn-primary rumahdev-bg my-3 text-white float-right">Edit Profil</button>
        </a> -->
      </div>

      <div class="col-md-6">
      </div>

      <?php } else { ?>
        <p>User not found.</p>
      <?php } ?>

        
        </div>
      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
