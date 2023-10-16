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
        <input class="form-control rounded" type="text" placeholder="Atur Password" aria-label="password">
        <button class="btn" type="button" style="margin-left: -45px;">
          <i class="text-secondary fa-solid fa-eye"></i>
          <!-- <i class="fa-solid fa-eye-slash"></i> -->
        </button>
      </div>

      <div class="input-group mx-auto my-3" style="width: 80%;">
        <input class="form-control rounded" type="text" placeholder="Konfirmasi Password" aria-label="password">
        <button class="btn" type="button" style="margin-left: -45px;">
          <i class="text-secondary fa-solid fa-eye"></i>
          <!-- <i class="fa-solid fa-eye-slash"></i> -->
        </button>
      </div>

      <a href="<?= base_url('daftar-next') ?>"><button class="btn rumahdev-bg text-white mb-3" style="width: 200px;">Selanjutnya</button></a>
      <br>

      <a href="<?= base_url('login') ?>" class="text-center rumahdev-color">Sudah mendaftar? Login</a>

    </div>

  </div>

</body>
</html>
