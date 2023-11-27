<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper bg-white">

  <!-- Main content -->
  <section class="content">

    <div class="container-fluid">  
      <?php if (!empty($user)) { ?>

        <from>
        <div class="row mt-3">
          <div class="col-md-6">

            <div class="form-group">
              <label>Nama Lengkap</label>
              <input type="text" class="form-control" value="<?php echo $user->nama; ?>" style="width: 80%;">
            </div>
            <div class="form-group">
              <label>Username</label>
              <input type="text" class="form-control" value="<?php echo $user->username; ?>" style="width: 80%;">
            </div>
            <div class="form-group">
              <label>Password</label>
              <input type="text" class="form-control" value="<?php echo $user->password; ?>" style="width: 80%;">
            </div>
            <div class="form-group">
              <label>Email</label>
              <input type="text" class="form-control" value="<?php echo $user->email; ?>" style="width: 80%;">
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
              <textarea class="form-control" style="width: 80%;" rows="3"><?php echo $user->alamat; ?></textarea>
            </div>

            <div class="my-3">
              <label>Foto Profil</label><br>
              <img class="rounded mb-3" width="200"
              alt="<?php echo base_url('assets/images/user/' . $user->foto); ?>" 
              src="<?php echo base_url('assets/images/user/' . $user->foto); ?>">
              <div class="custom-file" style="width: 80%;">
                <input type="file" class="custom-file-input" id="validatedCustomFile" required style="cursor: pointer;">
                <label class="custom-file-label" for="validatedCustomFile">Ganti foto profil...</label>
                <div class="invalid-feedback">Example invalid custom file feedback</div>
              </div>
            </div>

            <button  type="submit" class="btn btn-sm rumahdev-bg border-0 text-white mr-2">Update</button>
            <a href="<?= base_url('kasir/users') ?>" class="btn btn-sm btn-danger border-0">Batalkan</a>

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