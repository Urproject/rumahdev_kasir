
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
              <li class="breadcrumb-item"><a href="<?= base_url('kasir/dashboard') ?>">Dashboard </a></li>
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
                    <th>Waktu, Tanggal</th>
                    <th>Kasir</th>
                    <th>Jenis Pesanan</th>
                    <th>Pembayaran</th>
                    <th>Total</th>
                    <th>Action</th>
                  </tr>
                  </thead>

                  <tbody>
                    <?php if (!empty($transactions)): ?>
                      <?php $counter = 1; ?>
                      <?php foreach ($transactions as $t): ?>
                        <tr>
                          <td><?php echo $counter; ?></td>
                          <td>
                            <?php
                            setlocale(LC_TIME, 'id_ID');
                            $timeTimestamp = strtotime($t->waktu);
                            $dateTimestamp = strtotime($t->tanggal);
                            $formattedTime = strftime('%H.%M', $timeTimestamp);
                            $formattedDate = strftime('%d %B %Y', $dateTimestamp);
                            echo $formattedTime . ', ' . $formattedDate;
                            ?>
                          </td>

                          <td><?php echo $t->nama; ?></td>
                          <td><?php echo $t->jenis_pesanan; ?></td>
                          <td><?php echo $t->payment_type; ?></td>
                          <td><?php echo $t->total_harga; ?></td>
                          <td>
                            <?php if ($t->status_pesanan == 1): ?>
                              <button style="all: unset; cursor: pointer;">
                                <a href="<?= base_url('kasir/confirm') ?>">
                                  <span class="right badge badge-primary rumahdev-bg"><i class="fas fa-hourglass-half"></i></span>
                                </a>
                              </button>
                              <button style="all: unset; cursor: pointer;">
                                <a href="<?= base_url('kasir/transactions/edit?id=' . $t->id_transaction) ?>">
                                  <span class="right badge badge-warning"><i class="fas fa-edit"></i></span>
                                </a>
                              </button>
                              <button style="all: unset; cursor: pointer;" class="deleteButton">
                                <span class="right badge badge-danger"><i class="fas fa-trash"></i></span>
                              </button>
                            <?php else: ?>
                              <button style="all: unset; cursor: pointer;">
                                <a href="<?= base_url('kasir/transactions/detail?id=' . $t->id_transaction) ?>">
                                  <span class="right badge badge-primary rumahdev-bg"><i class="far fa-eye"></i>
                                  </span>
                                </a>
                              </button>
                              <button style="all: unset; cursor: pointer;">
                                <span class="right badge badge-success"><i class="fas fa-print"></i></span>
                              </button>
                            <?php endif; ?>
                          </td>
                        </tr>
                        <?php $counter++; ?>
                      <?php endforeach; ?>
                    <?php else: ?>
                      <td colspan="6">Belum ada transaksi.</td>
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
