
<div class="content-wrapper bg-white">
  <section class="content">

    <div class="container-fluid row mt-3">
      <?php if (!empty($userData)) { ?>

      <div class="col-md-12 bg-white">
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
            <img src="<?= $imgSrc ?>" class="rounded w-100 border-0" alt="User Image">

          </div>
          <div class="col-10 my-auto">
          </div>
        </div>

        <div class="form-group">
          <label>Nama</label>
          <input type="text" class="form-control" value="<?= $userData['nama']; ?>" disabled>
        </div>

        <div class="form-group">
          <label>Username</label>
          <input type="text" class="form-control" value="<?= $userData['username']; ?>" disabled>
        </div>

        <div class="form-group">
          <label>Email</label>
          <input type="text" class="form-control" value="<?= $userData['email']; ?>" disabled>
        </div>
      </div>

      <?php } else { ?>
        <p>User not found.</p>
      <?php } ?>

        
    </div>
    
  </section>
</div>