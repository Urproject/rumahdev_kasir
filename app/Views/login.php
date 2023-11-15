<!DOCTYPE html>
<html lang="en">
<head>
  <?= $this->include('templates/head'); ?>
  <title>RumahDev - Kasir Login</title>
</head>

<body>

  <div class="d-flex justify-content-center align-items-center rumahdev-bg" style="width: 100%; height: 100vh;">

    <div class="col-md-4 text-center bg-light py-3 rounded">

      <img style="width: 25%;" src="<?= base_url('assets/images/logo-rd2.png'); ?>">
      <h3 class="fw-normal mt-3">
        Login <span class="fw-bold text-uppercase rumahdev-color">RumahDev</span> Kasir
      </h3>


      <p>
         <?php if (!empty(session()->getFlashdata('gagal'))) { ?>
            <div class="alert alert-warning mx-auto p-1" style="width: 80%;">
               <?php echo session()->getFlashdata('gagal') ?>
            </div>
         <?php } ?>
      </p>


      <form method="POST" action="<?= base_url('login/action'); ?>">

        <div class="input-group mx-auto mb-2" style="width: 80%;">
          <label for="username" hidden>Username</label>
          <input type="text" name="username" id="username" class="form-control rounded" placeholder="Masukkan Username" aria-label="username">
          <!-- <button class="btn" type="button" style="margin-left: -40px;">
            <i class="text-secondary fa-solid fa-user"></i>
          </button> -->
        </div>

        <div class="input-group mx-auto my-3" style="width: 80%;">
          <div class="input-group">
            <label for="password" hidden>Password</label>
            <input name="password" id="password" type="password" class="form-control"
              placeholder="Masukkan Password" aria-label="password">
              <button class="btn rounded-end btn btn-secondary" type="button" style="border-left: none; border-color: #d3d3d3; background-color: white;">
                    <h6 toggle="#password" class="fa fa-eye fa-lg show-hide rounded-end" style="color: #808080;"></h6>
              </button>
          </div>
        </div>

       
        
        <button class="btn rumahdev-bg text-white mb-3" style="width: 200px;">Login</button>
      <form>

      <br>
      <a href="<?= base_url('login/lupa_password') ?>" class="text-center rumahdev-color mt-3"> Lupa password?</a>
      <br>

      <a href="<?= base_url('daftar') ?>" class="text-center rumahdev-color">Belum punya akun? Daftar</a>

    </div>

  </div>

  
    <!-- Option 1: Bootstrap Bundle with Popper -->
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
