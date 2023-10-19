
  <!-- <?= $this->include('templates/head'); ?>  -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Daftar Riwayat Transaksi</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('home/dashboard') ?>">Dashboard </a></li>
              <li class="breadcrumb-item active">Transaksi</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <div class="card">
              
              <div class="card-body">


                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Tanggal</th>
                    <th>Kasir</th>
                    <th>Jenis Pesanan</th>
                    <th>Pembayaran</th>
                    <th>Total</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php if (isset($transactions) && !empty($transactions)): ?>
                    <?php foreach ($transactions as $t): ?>
                      <tr>
                        <td><?php echo $t->id_transaction; ?></td>
                        <td><?php echo $t->tanggal; ?>&nbsp;<?php echo $t->waktu; ?></td>
                        <td><?php echo $t->id_user; ?></td>
                        <td><?php echo $t->jenis_pesanan; ?></td>
                        <td><?php echo $t->id_method; ?></td>
                        <td><?php echo $t->total_harga; ?></td>
                        <td>
                          <button style="all: unset; cursor: pointer;">
                            <span class="right badge badge-primary rumahdev-bg"><i class="far fa-eye"></i></span>
                          </button>
                          <button style="all: unset; cursor: pointer;">
                          <span class="right badge badge-warning"><i class="fas fa-print"></i></span>
                          </button>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                  <?php else: ?>
                    <td colspan="6">Belum ada transaksi.</p>
                  <?php endif; ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>#</th>
                    <th>Tanggal</th>
                    <th>Kasir</th>
                    <th>Jenis Pesanan</th>
                    <th>Pembayaran</th>
                    <th>Total</th>
                    <th>Action</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
