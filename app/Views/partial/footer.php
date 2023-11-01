
  <!-- <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.2.0
      <h1>Product List</h1>
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer> -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?=base_url('adminLTE/plugins/jquery/jquery.min.js')?>"></script>
<!-- Bootstrap 4 -->
<script src="<?=base_url('adminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
<!-- DataTables  & Plugins -->
<script src="<?=base_url('adminLTE/plugins/datatables/jquery.dataTables.min.js')?>"></script>
<script src="<?=base_url('adminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')?>"></script>
<script src="<?=base_url('adminLTE/plugins/datatables-responsive/js/dataTables.responsive.min.js')?>"></script>
<script src="<?=base_url('adminLTE/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')?>"></script>
<script src="<?=base_url('adminLTE/plugins/datatables-buttons/js/dataTables.buttons.min.js')?>"></script>
<script src="<?=base_url('adminLTE/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')?>"></script>
<script src="<?=base_url('adminLTE/plugins/jszip/jszip.min.js')?>"></script>
<script src="<?=base_url('adminLTE/plugins/pdfmake/pdfmake.min.js')?>"></script>
<script src="<?=base_url('adminLTE/plugins/pdfmake/vfs_fonts.js')?>"></script>
<script src="<?=base_url('adminLTE/plugins/datatables-buttons/js/buttons.html5.min.js')?>"></script>
<script src="<?=base_url('adminLTE/plugins/datatables-buttons/js/buttons.print.min.js')?>"></script>
<script src="<?=base_url('adminLTE/plugins/datatables-buttons/js/buttons.colVis.min.js')?>"></script>
<!-- AdminLTE App -->
<script src="<?=base_url('adminLTE/dist/js/adminlte.min.js')?>"></script>
<!-- AdminLTE for demo purposes -->
<!-- <script src="<?=base_url('adminLTE/dist/js/demo.js')?>"></script> -->

<!-- Page specific script -->
<script>

  const deleteButtons = document.querySelectorAll('.deleteButton');
  deleteButtons.forEach(button => {
    button.addEventListener('click', function() {
      Swal.fire({
        text: "Apakah kamu yakin ingin menghapus?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Delete'
      }).then((result) => {
        if (result.isConfirmed) {
          Swal.fire(
            '',
            'Berhasil menghapus',
            'success'
          )
        }
      });
    });
  });

  $(document).ready(function () {
      $('#example1').DataTable({
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
      });
  });

  // $(function () {
  //   $("#example1").DataTable({
  //     "responsive": true, "lengthChange": false, "autoWidth": false,
  //     "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
  //   }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  //   $('#example2').DataTable({
  //     "paging": true,
  //     "lengthChange": false,
  //     "searching": false,
  //     "ordering": true,
  //     "info": true,
  //     "autoWidth": false,
  //     "responsive": true,
  //   });
  // });
</script>



<!-- <script type="text/javascript">
  const deleteButtons = document.querySelectorAll('.deleteButton');

  deleteButtons.forEach(button => {
    button.addEventListener('click', function() {
      const productId = button.getAttribute('data-product-id');
      Swal.fire({
        text: "Apakah kamu yakin ingin menghapus?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Delete'
      }).then((result) => {
        if (result.isConfirmed) {
          fetch('/delete-product.php', {
            method: 'POST',
            body: JSON.stringify({ product_id: productId }),
            headers: {
              'Content-Type': 'application/json'
            }
          })
          .then(response => response.json())
          .then(data => {
            if (data.success) {
              Swal.fire(
                '',
                'Berhasil menghapus',
                'success'
              );
            } else {
              Swal.fire(
                '',
                'Gagal menghapus',
                'error'
              );
            }
          })
          .catch(error => {
            console.error(error);
            Swal.fire(
              '',
              'Terjadi kesalahan',
              'error'
            );
          });
        }
      });
    });
  });
</script> -->



</body>
</html>
