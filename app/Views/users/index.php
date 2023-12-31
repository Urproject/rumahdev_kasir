
  <!-- <?= $this->include('templates/head'); ?>  -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">

        <?php
        $successNotification = session()->getFlashdata('success');
        if ($successNotification) { echo '<div class="alert alert-success">' . $successNotification . '</div>'; }
        ?>

        <?php
        $failedNotification = session()->getFlashdata('failed');
        if ($failedNotification) { echo '<div class="alert alert-danger">' . $failedNotification . '</div>'; }
        ?>

        <div class="row mb-2">
          <div class="col-sm-6">
            <a href="<?= base_url('kasir/users/add') ?>" class="btn btn-sm rumahdev-bg text-white" 
              style="font-size: 16px;">
              <i class="fas fa-plus"></i>&nbsp;&nbsp;&nbsp;Tambah
            </a>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('kasir/dashboard') ?>">Dashboard </a></li>
              <li class="breadcrumb-item active">Akun</li>
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
                    <th>Nama</th>
                    <th>Username</th>
                    <!-- <th>Email</th>
                    <th>Alamat</th>
 -->                    <th>Action</th>
                  </tr>
                  </thead>
                  
                  <tbody>
                    <?php if (isset($users) && !empty($users)): ?>
                      <?php $rowNumber = 1; ?>
                      <?php foreach ($users as $user): ?>
                        <tr>
                          <td><?= $rowNumber++; ?></td>
                          <td><?= $user->nama; ?></td>
                          <td><?= $user->username; ?></td>
                          <!-- <td><?= $user->email; ?></td>
                          <td><?= $user->alamat; ?></td>  -->
                          <td>
                            <button style="all: unset; cursor: pointer;">
                              <a href="<?= base_url('kasir/users/detail?id=' . $user->id_user); ?>">
                                <span class="right badge badge-primary rumahdev-bg"><i class="far fa-eye"></i></span>
                              </a>
                            </button>
                            <button style="all: unset; cursor: pointer;">
                              <a href="<?= base_url('kasir/users/edit?id=' . $user->id_user) ?>">
                                <span class="right badge badge-warning"><i class="fas fa-edit"></i></span>
                              </a>
                            </button>
                            <!-- <button style="all: unset; cursor: pointer;" class="deleteButton">
                              <span class="right badge badge-danger"><i class="fas fa-trash"></i></span>
                            </button>  -->
                          </td>
                        </tr>
                      <?php endforeach; ?>
                    <?php else: ?>
                      <td colspan="4" class="text-center">Belum ada akun.</td>
                    <?php endif; ?>
                  </tbody>

                  
                  <tfoot>
                  <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <!-- <th>Email</th>
                    <th>Alamat</th> -->
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