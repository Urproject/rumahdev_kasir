
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button">
          <i class="fas fa-bars rumahdev-color" style="color: darkcyan;"></i>
        </a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <!-- <a href="#" class="nav-link></a> -->
        <h4 class="nav-link rumahdev-color" style="color: darkcyan;"><?= $titlePage ?></h4>
      </li>
      <!-- <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li> -->
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <div class="user-panel d-flex" data-toggle="dropdown" style="cursor: pointer;">
          <div class="image my-auto mr-2">
            <img src="<?=base_url('adminLTE/dist/img/user2-160x160.jpg')?>" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info my-auto">
            <span class="d-block text-dark">Iqbal Ramadhan</span>
            <span class="d-block text-dark">iqbalramadhan@gmail.com</span>
          </div>
        </div>

        <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
          <a href="<?= base_url('kasir/profil/user') ?>" class="dropdown-item">
            <i class="mr-2 fas fa-user"></i> Profil Akun
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="mr-2 fas fa-users"></i> Profil Merchant
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="mr-2 fas fa-sign-out-alt"></i> Logout
          </a>
        </div>
      </li>

    </ul>
  </nav>
  <!-- /.navbar -->