
  <!-- <?= $this->include('templates/head'); ?>  -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
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
                    <th>Email</th>
                    <th>Alamat</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php if (isset($users) && !empty($users)): ?>
                    <?php foreach ($users as $product): ?>
                      <tr>
                        <td><?php echo $product->id_user; ?></td>
                        <td><?php echo $product->nama; ?></td>
                        <td><?php echo $product->username; ?></td>
                        <td><?php echo $product->email; ?></td>
                        <td><?php echo $product->alamat; ?></td> 
                        <td>
                          <button style="all: unset; cursor: pointer;">
                            <a href="<?= base_url('kasir/users/detail?id=1') ?>">
                              <span class="right badge badge-primary rumahdev-bg"><i class="far fa-eye"></i></span>
                            </a>
                          </button>
                          <button style="all: unset; cursor: pointer;">
                          <span class="right badge badge-warning"><i class="fas fa-edit"></i></span>
                          </button>
                          <button style="all: unset; cursor: pointer;">
                          <span class="right badge badge-danger"><i class="fas fa-trash"></i></span>
                          </button>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                  <?php else: ?>
                    <td colspan="6">No users found.</p>
                  <?php endif; ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Alamat</th>
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
