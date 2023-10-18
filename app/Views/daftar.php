<!DOCTYPE html>
<html lang="en">
<head>
  <?= $this->include('templates/head'); ?>
  <title>RumahDev - Kasir Daftar</title>
</head>

<body>

  <div class="d-flex justify-content-center align-items-center rumahdev-bg" style="width: 100%; height: 100vh;">

    <div class="col-md-4 text-center bg-light pt-4 pb-5 rounded">

      <img style="width: 50%;" src="<?= base_url('assets/images/logo-rd2.png'); ?>">
      <h3 class="fw-normal mt-4">
        Daftar <span class="fw-bold text-uppercase">RumahDev</span> Kasir
      </h3>

      <div class="input-group mx-auto my-3" style="width: 80%;">
        <input class="form-control rounded" type="text" placeholder="Nama Lengkap" aria-label="nama">
      </div>

      <div class="input-group mx-auto my-3" style="width: 80%;">
        <input class="form-control rounded" type="text" placeholder="Email" aria-label="email">
      </div>

      <div class="input-group mx-auto my-3" style="width: 80%;">
        <div class="input-group mb-3">
          <input id="password-field" type="password" class="form-control"
            placeholder="Atur Password" aria-label="password">
            <button class="btn rounded-end btn btn-secondary" type="button">
                  <h6 toggle="#password-field" class="fa fa-eye fa-lg show-hide"></h6>
            </button>
        </div>
      </div>

      <div class="input-group mx-auto my-3" style="width: 80%;">
        <div class="input-group mb-3">
          <input id="password-field2" type="password" class="form-control"
            placeholder="Konfirmasi Password" aria-label="password">
            <button class="btn rounded-end btn btn-secondary" type="button">
                  <h6 toggle="#password-field2" class="fa fa-eye fa-lg show-hide"></h6>
            </button>
        </div>
      </div>


      <a href="<?= base_url('daftar-next') ?>"><button class="btn rumahdev-bg text-white mb-3" style="width: 200px;">Selanjutnya</button></a>
      <br>

      <a href="<?= base_url('login') ?>" class="text-center rumahdev-color">Sudah mendaftar? Login</a>

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
