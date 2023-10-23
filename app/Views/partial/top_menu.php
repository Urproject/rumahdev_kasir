
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
        <h4 href="#" class="nav-link rumahdev-color" style="color: darkcyan;"><?= $titlePage ?></h4>
      </li>
      <!-- <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li> -->
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

      <li>
        <div class="user-panel d-flex">
          <div class="image my-auto">
            <a href="<?= base_url('home/profil0') ?>">
              <img src="<?=base_url('adminLTE/dist/img/user2-160x160.jpg')?>" class="img-circle elevation-2" alt="User Image">
            </a>
          </div>
          <div class="info">
            <a href="<?= base_url('merchant/profil') ?>" class="d-block text-dark">Alexander Pierce</a>
            <a href="<?= base_url('merchant/profil') ?>" class="d-block text-dark">alexanderpierce@gmail.com</a>
          </div>
        </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->