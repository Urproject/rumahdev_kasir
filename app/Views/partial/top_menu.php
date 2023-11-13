<?php
  $merchantModel = new \App\Models\M_Merchant();
  $merchantId = model('M_Employee')->getMerchantIdByUserId($userData['id_user']);
  $merchantData = $merchantModel->find($merchantId);
?>


<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light shadow-sm">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button">
          <i class="fas fa-bars rumahdev-color" style="color: darkcyan;"></i>
        </a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <h4 class="nav-link rumahdev-color" style="color: darkcyan;"><?= esc($titlePage); ?></h4>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown mr-4">
        <div class="user-panel d-flex" data-toggle="dropdown" style="cursor: pointer;">

          <div class="image my-auto">
            <img src="<?= base_url('assets/images/user/' . esc($userData['foto'])); ?>" class="img-circle border" alt="User Image">
          </div>
          <div class="info my-auto">
            <span class="d-block text-dark"><?= esc($merchantData->nama_usaha); ?></span>
            <span class="d-block text-dark"><?= esc($userData['username']); ?></span>
          </div>



          <div class="menu my-auto">
            <i class="fas fa-ellipsis-v ml-5"></i>
          </div>
        </div>

        <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
          <a href="<?= base_url('kasir/profil/user?id=' . 1) ?>" class="dropdown-item">
            <i class="mr-2 fas fa-user"></i> Profil Akun
          </a>
          <div class="dropdown-divider"></div>
          <a href="<?= base_url('kasir/profil/merchant') ?>" class="dropdown-item">
            <i class="mr-2 fas fa-users"></i> Profil Merchant
          </a>
          <div class="dropdown-divider"></div>
          <a href="<?= base_url('logout') ?>" class="dropdown-item">
            <i class="mr-2 fas fa-sign-out-alt"></i> Logout
          </a>
        </div>
      </li>

    </ul>
  </nav>
  <!-- /.navbar -->