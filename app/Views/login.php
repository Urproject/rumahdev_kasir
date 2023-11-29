
  <div class="d-flex justify-content-center align-items-center rumahdev-bg" style="height: 100vh;">

    <div class="col-md-4 text-center bg-light py-3 rounded">

      <img style="width: 25%;" src="<?= base_url('assets/images/logo-rd2.png'); ?>">
      <h3 class="fw-normal mt-1 mb-3">
        Login <span class="fw-bold text-uppercase rumahdev-color">RumahDev</span> Kasir
      </h3>


      <form method="POST" action="<?= base_url('login/action'); ?>">

        <div class="input-group mx-auto mb-2 mt-1" style="width: 80%;">
          <label for="username" hidden>Username</label>
          <input type="text" name="username" id="username" class="form-control rounded" placeholder="Masukkan Username" aria-label="username">
        </div>

        <div class="input-group mx-auto mt-3" style="width: 80%;">
          <div class="input-group">
            <label for="password" hidden>Password</label>
            <input name="password" id="password" type="password" class="form-control rounded-left" placeholder="Masukkan Password" aria-label="password">
            <button class="btn btn-sm btn-secondary rounded-0" type="button" style="border-left: none; border-color: #d3d3d3; background-color: white;">
              <span toggle="#password" class="fa fa-eye fa-lg show-hide" style="color: #808080;"></span>
            </button>
          </div>
        </div>

      <?php if (!empty(session()->getFlashdata('gagal'))) { ?>
        <div class="text-danger my-2" style="font-size: 14px;">
          <?php echo session()->getFlashdata('gagal') ?>
        </div>
      <?php } ?>

      <?php if (!empty(session()->getFlashdata('success'))) { ?>
        <div class="text-success my-2" style="font-size: 14px;">
          <?php echo session()->getFlashdata('success') ?>
        </div>
      <?php } ?>

        <button class="btn rumahdev-bg text-white my-3" style="width: 200px;">Login</button>
      </form>
      
      <!-- <a href="<?= base_url('login/lupa_password') ?>" class="text-center rumahdev-color mt-3"> Lupa password?</a> -->
      <br>
      <a href="<?= base_url('daftar') ?>" class="text-center rumahdev-color">Belum punya akun? Daftar</a>
    </div>

  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
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
