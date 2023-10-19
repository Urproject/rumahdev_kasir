

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-primary shadow">
    <!-- Brand Logo -->
    <a href="<?= base_url('home/dashboard') ?>" class="brand-link">
      <img src="<?= base_url('assets/images/logo-rd2.png'); ?>" alt="AdminLTE Logo" class="brand-image">
      <span class="brand-text font-weight-bold text-rumahdev">KASIR APP</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?=base_url('adminLTE/dist/img/user2-160x160.jpg')?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="<?= base_url('home/dashboard') ?>" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('home/products') ?>" class="nav-link">
              <i class="nav-icon fas fa-utensils"></i>
              <p>Produk</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('home/users') ?>" class="nav-link">
              <i class="nav-icon fas fa-user-alt"></i>
              <p>Akun</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('home/transactions') ?>" class="nav-link">
              <i class="nav-icon fas fa-history"></i>
              <p>Riwayat</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('home/settings') ?>" class="nav-link">
              <i class="nav-icon fas fa-cog"></i>
              <p>
                Setting
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('home/settings/discount') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Diskon & Pajak</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('home/settings/payment') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Payment</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
