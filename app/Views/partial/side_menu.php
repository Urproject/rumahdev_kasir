

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-primary shadow">
    <!-- Brand Logo -->
    <a href="<?= base_url('kasir/order') ?>" class="brand-link pt-4">
      <img src="<?= base_url('assets/images/logo-rd2.png'); ?>" alt="AdminLTE Logo" class="brand-image">
      <span class="brand-text font-weight-bold text-rumahdev">KASIR APP</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="<?= base_url('kasir/order') ?>" class="nav-link">
              <i class="nav-icon fas fa-shopping-basket"></i>
              <p>Order</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('kasir/products') ?>" class="nav-link">
              <i class="nav-icon fas fa-utensils"></i>
              <p>Produk</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('kasir/users') ?>" class="nav-link">
              <i class="nav-icon fas fa-user-alt"></i>
              <p>Akun</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('kasir/transactions') ?>" class="nav-link">
              <i class="nav-icon fas fa-history"></i>
              <p>Riwayat</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cog"></i>
              <p>
                Setting
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('kasir/settings/discount') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>General</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('kasir/settings/payment') ?>" class="nav-link">
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
