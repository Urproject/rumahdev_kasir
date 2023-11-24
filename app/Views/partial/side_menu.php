

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
            <?php if ($titlePage == 'Dashboard Merchant'): ?>
            <a href="<?= base_url('kasir/order') ?>" class="nav-link active rumahdev-bg-link">

            <?php else: ?>
            <a href="<?= base_url('kasir/order') ?>" class="nav-link">

            <?php endif; ?>
              <i class="nav-icon fas fa-shopping-basket"></i>
              <p>Order</p>
            </a>
          </li>


          <li class="nav-item">
            <?php if ($titlePage == 'Data Produk'): ?>
            <a href="<?= base_url('kasir/products') ?>" class="nav-link active rumahdev-bg-link">

            <?php else: ?>
            <a href="<?= base_url('kasir/products') ?>" class="nav-link">

            <?php endif; ?>
              <i class="nav-icon fas fa-utensils"></i>
              <p>Produk</p>
            </a>
          </li>


          <?php if ($level == 1): ?>
            <li class="nav-item">
              <?php if ($titlePage == 'Data Akun'): ?>
              <a href="<?= base_url('kasir/users') ?>" class="nav-link active rumahdev-bg-link">

              <?php else: ?>
              <a href="<?= base_url('kasir/users') ?>" class="nav-link">

              <?php endif; ?>
                <i class="nav-icon fas fa-user-alt"></i>
                <p>Akun</p>
              </a>
            </li>
          <?php endif; ?>

          <li class="nav-item">
            <?php if ($titlePage == 'Data Transaksi'): ?>
            <a href="<?= base_url('kasir/transactions') ?>" class="nav-link active rumahdev-bg-link">

            <?php else: ?>
            <a href="<?= base_url('kasir/transactions') ?>" class="nav-link">

            <?php endif; ?>
              <i class="nav-icon fas fa-history"></i>
              <p>Riwayat</p>
            </a>
          </li>

          <?php if ($level == 1): ?>
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
                <?php if ($titlePage == 'Setting General'): ?>
                <a href="<?= base_url('kasir/settings/discount') ?>" class="nav-link active text-white rumahdev-bg-link">

                <?php else: ?>
                <a href="<?= base_url('kasir/settings/discount') ?>" class="nav-link">

                <?php endif; ?>
                  <i class="far fa-circle nav-icon"></i>
                  <p>General</p>
                </a>
              </li>
              
              <li class="nav-item">
                <?php if ($titlePage == 'Setting Payment'): ?>
                <a href="<?= base_url('kasir/settings/payment') ?>" class="nav-link active text-white rumahdev-bg-link">

                <?php else: ?>
                <a href="<?= base_url('kasir/settings/payment') ?>" class="nav-link">

                <?php endif; ?>
                  <i class="far fa-circle nav-icon"></i>
                  <p>Payment</p>
                </a>
              </li>

            </ul>
          </li>
          <?php endif; ?>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
