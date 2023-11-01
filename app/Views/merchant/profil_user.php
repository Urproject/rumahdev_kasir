
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper bg-white">

  <!-- Main content -->
  <section class="content">

    <div class="container-fluid row mt-3">
      <?php if (!empty($user)) { ?>

      <div class="col-md-12 bg-white mb-3">
        <h3 class="font-weight-bold">Profil Akun</h3>
      </div>

      <div class="col-md-6">

        <div class="row mb-3">
          <div class="col-2 my-auto">
            <img class="rounded w-100 border"
            alt="<?php echo base_url('assets/images/user/' . $user->foto); ?>" 
            src="<?php echo base_url('assets/images/user/' . $user->foto); ?>">
          </div>
          <div class="col-10 my-auto">
            <p>
              <b><?php echo $user->nama; ?></b> <br> 
              <?php echo $user->username; ?> <br>
            </p>
          </div>
        </div>

        <div class="form-group">
          <label>Email</label>
          <input type="text" class="form-control" value="<?php echo $user->email; ?>" disabled>
        </div>
        <div class="form-group">
          <label>Nomor Handphone</label>
          <input type="text" class="form-control" value="<?php echo $user->no_hp; ?>" disabled>
        </div>


        <div class="form-group">
          <label>Jenis Kelamin</label>
          <input type="text" class="form-control" value="<?php echo $user->gender; ?>" disabled>
        </div>
        <div class="form-group">
          <label>Alamat Lengkap</label>
          <textarea class="form-control" rows="3" disabled><?php echo $user->alamat; ?></textarea>
        </div>

        <a href="<?= base_url('kasir/users/edit?id=1') ?>">
          <button class="btn btn-primary rumahdev-bg my-3 text-white float-right">Edit Profil</button>
        </a>
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
