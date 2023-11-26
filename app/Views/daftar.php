
<div class="row py-5 rumahdev-bg">
  <div class="col-md-4 bg-light rounded mx-auto">
    <div class="text-center mt-3">
      <img style="width: 100px;" src="<?= base_url('assets/images/logo-rd2.png'); ?>">
      <h3 class="fw-normal">
        Daftar <span class="fw-bold text-uppercase rumahdev-color">RumahDev</span> Kasir
      </h3>
    </div>

    <div class="row py-3">
      <div class="col-md-12 mx-auto text-center">
        <form method="post" action="<?= base_url('daftar/action') ?>">
          <input type="hidden" name="step" value="1">

          <div class="input-group mb-3 mx-auto" style="width:80%;">
            <label for="nama" hidden>Nama Lengkap</label>
            <input name="nama" id="nama" class="form-control rounded" type="text" placeholder="Nama Lengkap" aria-label="nama">
          </div>

          <div class="input-group my-3 mx-auto" style="width:80%;">
            <label for="username" hidden>Username</label>
            <input name="username" id="username" class="form-control rounded" type="text" placeholder="Atur Username" aria-label="username">
          </div>

          <div class="input-group my-3 mx-auto" style="width:80%;">
            <label for="email" hidden>Email</label>
            <input name="email" id="email" class="form-control rounded" type="text" placeholder="Email" aria-label="email">
          </div>

          <div class="input-group my-3 mx-auto" style="width:80%;">
            <div class="input-group">
              <label for="password-field" hidden>Password</label>
              <input name="password" id="password-field" type="password" class="form-control rounded-left" placeholder="Atur Password" aria-label="password">
                <button class="btn btn-sm btn-secondary rounded-0" type="button" style="border-left: none; border-color: #d3d3d3; background-color: white;">
                  <span toggle="#password-field" class="fa fa-eye fa-lg show-hide" style="color: #808080;"></span>
                </button>
            </div>
          </div>

          <div class="input-group my-3 mx-auto" style="width:80%;">
            <div class="input-group">
              <label for="password-field2" hidden>Konfirmasi Password</label>
              <input name="password2" id="password-field2" type="password" class="form-control rounded-left" placeholder="Konfirmasi Password" aria-label="password">
                <button class="btn btn-sm btn-secondary rounded-0" type="button" style="border-left: none; border-color: #d3d3d3; background-color: white;">
                  <span toggle="#password-field2" class="fa fa-eye fa-lg show-hide" style="color: #808080;"></span>
                </button>
            </div>
          </div>

          <div class="input-group my-3 mx-auto" style="width:80%;">
            <label for="gender" hidden>Jenis Kelamin</label>
            <select name="gender" id="gender" class="form-control rounded text-secondary" aria-label="gender">
              <option selected="true" hidden>Jenis Kelamin</option>
              <option value="pria">Pria</option>
              <option value="wanita">Wanita</option>
            </select>
          </div>

          <div class="input-group my-3 mx-auto" style="width:80%;">
            <label for="alamat" hidden>Alamat</label>
            <textarea name="alamat" id="alamat" rows="3" class="form-control" placeholder="Alamat"></textarea>
          </div>

          <button type="submit" class="btn rumahdev-bg text-white my-3" style="width: 200px;">Selanjutnya</button>
          <!-- <a href="<?= base_url('daftar/merchant') ?>" class="btn rumahdev-bg text-white my-3" style="width: 200px;">Selanjutnya</a> -->
          <br>

        </form>

        <a href="<?= base_url('login') ?>" class="text-center rumahdev-color">Sudah mendaftar? Login</a>

      </div>
    </div>
  </div>
</div>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
</script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js'></script>
<script>
    $(".show-hide").click(function () {

        $(this).toggleClass("fa-eye fa-eye-slash");
        var input = $($(this).attr("toggle"));
        if (input.attr("type") == "password") {
            input.attr("type", "text");
        } else {
            input.attr("type", "password");
        }
    });
    
</script>

</body>
</html>
