<!DOCTYPE html>
<html lang="en">
<head>
  <?= $this->include('templates/head'); ?>
  <title>RumahDev - Kasir Login</title>
</head>

<body>
<!-- <a href="<?= base_url('home/dashboard') ?>">DASHBOARD</a> -->

  <div class="d-flex justify-content-center align-items-center rumahdev-bg" style="width: 100%; height: 100vh;">

    <div class="col-md-4 text-center bg-light pt-4 pb-5 rounded">

      <img style="width: 50%;" src="<?= base_url('assets/images/logo-rd2.png'); ?>">
      <h3 class="fw-normal mt-4">
        Login <span class="fw-bold text-uppercase">RumahDev</span> Kasir
      </h3>

      <div class="input-group mx-auto my-3" style="width: 80%;">
        <input class="form-control rounded" type="text" placeholder="Masukkan Username" aria-label="username">
        <button class="btn" type="button" style="margin-left: -40px;">
          <i class="text-secondary fa-solid fa-user"></i>
        </button>
      </div>

      <div class="input-group mx-auto my-3" style="width: 80%;">
        <input class="form-control rounded" type="text" placeholder="Masukkan Password" aria-label="password">
        <button class="btn" type="button" style="margin-left: -45px;">
          <i class="text-secondary fa-solid fa-eye"></i>
          <!-- <i class="fa-solid fa-eye-slash"></i> -->
        </button>
      </div>

      <button class="btn rumahdev-bg text-white" style="width: 200px;">Login</button>

    </div>

  </div>

</body>
</html>
