<!DOCTYPE html>
<html lang="en">
<head>
  <?= $this->include('templates/head'); ?>
  <title>RumahDev - Kasir Login</title>
</head>

<body>

  <div class="d-flex justify-content-center align-items-center rumahdev-bg" style="width: 100%; height: 100vh;">

    <div class="col-md-4 text-center bg-light pt-4 pb-5 rounded">

      <img style="width: 50%;" src="<?= base_url('assets/images/logo-rd2.png'); ?>">
      <h3 class="fw-normal mt-4">
        Reset Password
      </h3>

    <p class="ml-0">Masukkan Email anda untuk reset password</p>

    <p class="m-3"style="border: solid 1px #aaa; background: #ffc0cb; padding: 15px; -moz-border-radius: 15px; -khtml-border-radius: 15px; -webkit-border-radius: 15px; 
    border-radius: 15px; margin: 0; text-align: justify; line-height: 23px; color: black; font-size: 15px; height: 80px; width: 423px;">Kami sudah mengirim surel yang berisi tautan untuk mereset kata sandi Anda!</p>

      <div class="input-group mx-auto my-3" style="width: 80%;">
        <input class="form-control rounded" type="text" placeholder="Masukkan E-mail" aria-label="username">
        <button class="btn" type="button" style="margin-left: -40px;">
            <i class="text-secondary fa-solid fa-envelope" style="color: #000000;"></i>
        </button>
      </div>

      <button class="btn rumahdev-bg text-white mb-3" style="width: 200px;">Kirim</button>
      <br>

      <a href="<?= base_url('login') ?>" class="text-center rumahdev-color"><i class="fa-solid fa-arrow-left" style="color: #008F87;"></i> Kembali Ke Halaman Login</a>

      

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
