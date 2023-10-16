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
      <a href="<?= base_url('home/dashboard0') ?>" class="mb-3 mb-md-0 me-md-auto text-decoration-none">
        <img class="me-2" style="height: 40px;" src="<?= base_url('assets/images/logo-rd2.png'); ?>">
        <br>
        <span class="fs-5 fw-bold rumahdev-color mt-auto">KASIR APP</span>
      </a>
      <hr>

      <ul class="nav nav-pills flex-column flex-grow-1 mb-auto">
        <li class="nav-item">
          <a href="<?= base_url('home/dashboard0') ?>" class="nav-link link-dark" aria-current="page">
            <span class="me-3" style="font-size: 12px;"><i class="fa-solid fa-house"></i></span>
            Dashboard
          </a>
        </li>
      </ul>
      <hr>

      <ul class="nav nav-pills flex-column mb-auto">
        <li>
          <a href="<?= base_url('home/profil0') ?>" class="nav-link link-dark">
            <span class="me-3" style="font-size: 14px;"><i class="fa-solid fa-right-from-bracket"></i></span>
            Logout
          </a>
        </li>
      </ul>
    </div>
  </div> <!-- left sidebar -->

</div>


</body>
</html>
