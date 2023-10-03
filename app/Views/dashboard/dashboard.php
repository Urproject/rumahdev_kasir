<!DOCTYPE html>
<html lang="en">
<head>
  <?= $this->include('templates/head'); ?>
  <title>RumahDev - Kasir Dashboard</title>
</head>

<body>

<div class="d-flex flex-column p-3 bg-light" style="width: 260px; height: 100vh;">
  <a href="#" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-decoration-none">
    <img class="me-3" style="height: 40px;" src="<?= base_url('assets/images/logo-rd2.png'); ?>">
    <span class="fs-3 fw-bold rumahdev-color mt-auto">KASIR</span>
  </a>
  <hr>

  <ul class="nav nav-pills flex-column flex-grow-1 mb-auto">
    <li class="nav-item">
      <a href="#" class="nav-link link-light rumahdev-bg" aria-current="page">
        <span class="me-3" style="font-size: 12px;"><i class="fa-solid fa-house"></i></span>
        Dashboard
      </a>
    </li>
    <li>
      <a href="#" class="nav-link link-dark">
        <span class="me-3" style="font-size: 17px;"><i class="fa-solid fa-file-lines"></i></span>
        Riwayat
      </a>
    </li>
    <li>
      <a href="#" class="nav-link link-dark">
        <span class="me-3" style="font-size: 15px;"><i class="fa-solid fa-bars"></i></span>
        Menu
      </a>
    </li>
  </ul>
  <hr>

  <ul class="nav nav-pills flex-column mb-auto">
    <li>
      <a href="#" class="nav-link link-dark">
        <span class="me-3" style="font-size: 14px;"><i class="fa-solid fa-gear"></i></span>
        Setting
      </a>
    </li>
    <li>
      <a href="#" class="nav-link link-dark">
        <span class="me-3" style="font-size: 14px;"><i class="fa-solid fa-right-from-bracket"></i></span>
        Logout
      </a>
    </li>
  </ul>
</div>




</body>
</html>
