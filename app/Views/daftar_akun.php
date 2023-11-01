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
      
      <a href="<?= base_url('daftar') ?>" class="text-center rumahdev-color">Sebelumnya</a>

      <div class="input-group mx-auto my-3" style="width: 80%;">
        <input class="form-control rounded" type="text" placeholder="Buat username" aria-label="username">
      </div>

      <div class="input-group mx-auto my-3" style="width: 80%;">
        <input class="form-control rounded" type="text" placeholder="Alamat" aria-label="alamat">
      </div>

      <div class="input-group mx-auto my-3" style="width: 80%;">
        <select class="form-select text-secondary" aria-label="gender">
          <option selected="true" hidden>Jenis Kelamin</option>
          <option value="1">Pria</option>
          <option value="2">Wanita</option>
        </select>
      </div>

      <a href="<?= base_url('daftar/merchant') ?>"><button class="btn rumahdev-bg text-white mb-3" style="width: 200px;">Daftar</button></a>
      <br>

    </div>

  </div>

</body>
</html>
