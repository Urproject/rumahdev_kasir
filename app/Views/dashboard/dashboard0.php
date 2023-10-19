<!DOCTYPE html>
<html lang="en">
<head>
  <?= $this->include('templates/head'); ?>
  <title>RumahDev - Kasir Dashboard</title>
</head>

<body>


<div class="container-fluid row p-0" style="">

  <!-- left sidebar -->
  <div class="col-md-2 bg-white shadow">
    <div class="d-flex flex-column p-3" style="height: 100vh;">
      <a href="<?= base_url('home/dashboard0') ?>" class="mb-3 mb-md-0 me-md-auto ms-4 text-decoration-none">
        <img class="me-2" style="height: 40px;" src="<?= base_url('assets/images/logo-rd2.png'); ?>">
        <br>
        <span class="fs-5 fw-bold rumahdev-color mt-auto">KASIR APP</span>
      </a>
      <hr>

      <ul class="nav nav-pills flex-column flex-grow-1 mb-auto">
        <li class="nav-item position-center" style="text-align:center">
        <i class="fa-solid fa-circle-exclamation fa-3x" style="color: #00a987;"></i>
        <br>
        <br>
        <span class="fs-8 fw-bold rumahdev-color mt-auto">Menu tidak tersedia karena belum mendaftarkan toko, segera daftarkan! </span>
        <br>
        <br>
        <a href="<?= base_url('home/profil0')?>" class="nav-link rumahdev-color">
        <button type="button" class="btn rumahdev-btn">Ajukan</button>
        </a>
        </li>
      </ul>
      <hr>

      <ul class="nav nav-pills flex-column mb-auto">
        <li>
          <a href="<?= base_url('home/profil0') ?>" class="nav-link rumahdev-color">
            <span class="me-3" style="font-size: 14px;"><i class="fa-solid fa-right-from-bracket"></i></span>
            Logout
          </a>
        </li>
      </ul>
    </div>
  </div> <!-- left sidebar -->

  <div class="col-md-10 bg-white">
    <nav class="navbar navbar-light bg-light">
    <span class="navbar-brand mb-0 ms-3 rumahdev-color fs-3 fw-bold">RumahDev Kasir App</span>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li class="fw-bold"> Meina Lisa</li>
      <li> meinalisaa02</li>
		</ul>
		
    </nav>

    <div class="row-md-10 ms-3 bg-white">
    <p class="fs-5">Selamat datang di aplikasi <b> Sistem Kasir RumahDev!</b></p>
    <p class="fs-5"><b> Daftarkan merchant!</b></p>
    <p class="lh-sm">Belum ada menu tersedia karena kamu belum mendaftarkan tokomu.<br> Ayo segera daftarkan sekarang!</p>
    <a href="<?= base_url('')?>" class="nav-link rumahdev-color">
        <button type="button" class="btn rumahdev-btn">Ajukan Sebagai Merchant</button>
    </a>
    <br>
    <p class="fs-5"><b> Sudah ada merchant?</b></p>
    <input class="form-group col-md-6" type="text" placeholder="Nama toko"> 
    <br>
    <br>
    <input class="form-group col-md-6" type="text" placeholder="Email pemilik">
    <br>
    <br>
    <a href="<?= base_url('')?>" class="nav-link rumahdev-color">
        <button type="button" class="btn rumahdev-btn">Minta Approval</button>
    </a>

  </div>
  </div>
  

</body>
</html>
