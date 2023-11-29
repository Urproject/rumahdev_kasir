<?php
$baseURL = base_url();
$filePDF = $baseURL . 'assets/images/merchant/' . esc($merchantData->file_izin);
$fileNPWP = $baseURL . 'assets/images/merchant/' . esc($merchantData->file_npwp);
$fileKTP = $baseURL . 'assets/images/merchant/' . esc($merchantData->file_ktp);
?>


<div class="content-wrapper">
  <section class="content bg-white">  
    <div class="container-fluid row my-3">

      <div class="col-md-6">
        <h5 class="font-weight-bold">Informasi Usaha</h5>

        <div class="form-group my-3" style="width: 90%;">
          <label for="nama_usaha">Nama Usaha (Merk/Brand)</label>
          <input disabled name="nama_usaha" id="nama_usaha" class="form-control rounded" type="text" aria-label="nama_usaha" value="<?= esc($merchantData->nama_usaha); ?>">
        </div>

        <div class="form-group my-3" style="width: 90%;">
          <label for="jenis_usaha">Jenis Usaha</label>
          <input disabled name="jenis_usaha" id="jenis_usaha" class="form-control rounded" type="text" aria-label="jenis_usaha" value="<?= esc($merchantData->jenis_usaha); ?>">
        </div>

        <div class="form-group my-3" style="width: 90%;">
          <label for="no_telepon">Nomor Telepon</label>
          <input disabled name="no_telepon" id="no_telepon" class="form-control rounded" type="text" aria-label="no_telepon" value="<?= esc($merchantData->no_telepon); ?>">
        </div>

        <div class="form-group">
          <label for="alamat_usaha">Alamat Usaha</label>
          <textarea disabled name="alamat_usaha" id="alamat_usaha" class="form-control" rows="3" style="width: 90%;"><?= esc($merchantData->alamat); ?></textarea>
        </div>
      </div>

      <div class="col-md-6">
        <h5 class="font-weight-bold">Data Perusahaan</h5>

        <div class="form-group my-3" style="width: 90%;">
          <label for="no_izin">Nomor Izin Usaha (NIB/SIUP/TDUP)</label>
          <input disabled name="no_izin" id="no_izin" class="form-control rounded" type="text" aria-label="no_izin" value="<?= esc($merchantData->no_izin); ?>">
        </div>

        <div class="form-group my-3" style="width: 90%;">
          <label for="file_izin">File Izin Usaha</label><br>
          <button class="btn text-white rumahdev-bg-link" onclick="openPDFModal('<?= $filePDF ?>')">Lihat</button>
        </div>

        <div class="form-group my-3" style="width: 90%;">
          <label for="no_npwp">NPWP Usaha</label>
          <input disabled name="no_npwp" id="no_npwp" class="form-control rounded" type="text" aria-label="no_npwp" value="<?= esc($merchantData->no_npwp); ?>">
        </div>

        <div class="form-group my-3" style="width: 90%;">
          <label for="file_npwp">File NPWP</label><br>
          <button class="btn text-white rumahdev-bg-link" onclick="openPDFModal('<?= $fileNPWP ?>')">Lihat</button>

        </div>

        <div class="form-group my-3" style="width: 90%;">
          <label for="no_ktp">Nomor KTP Pemilik</label>
          <input disabled name="no_ktp" id="no_ktp" class="form-control rounded" type="text" aria-label="no_ktp" value="<?= esc($merchantData->no_ktp); ?>">
        </div>

        <div class="form-group my-3" style="width: 90%;">
          <label for="file_ktp">File KTP</label><br>
            <button class="btn text-white rumahdev-bg-link" onclick="openImageModal('<?= $fileKTP ?>')">Lihat</button>
        </div>
        <br>
      </div>


      <!-- PDF Modal -->
      <div class="modal" id="pdfModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">PDF Viewer</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <iframe id="pdfViewer" src="" width="100%" height="500px" style="border: none;"></iframe>
            </div>
          </div>
        </div>
      </div>

      <!-- Image Modal -->
      <div class="modal" id="imageModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">File KTP</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body" style="text-align: center;">
              <img id="imageViewer" src="" alt="Image Viewer" height="250px">
            </div>
          </div>
        </div>
      </div>


    </div>
  </section>
</div>



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<script>
  function openPDFModal(pdfPath, isImage = false) {
    // Check if the PDF file path is provided
    if (!pdfPath) {
      alert('PDF file path not provided.');
      return;
    }

    // Set the src attribute of the iframe to display the PDF
    document.getElementById('pdfViewer').src = pdfPath;

    // Open the Bootstrap modal
    $('#pdfModal').modal('show');
  }


  function openImageModal(imagePath) {
    // Check if the image file path is provided
    if (!imagePath) {
      alert('Image file path not provided.');
      return;
    }

    // Set the src attribute of the image to display
    document.getElementById('imageViewer').src = imagePath;

    // Open the Bootstrap modal for images
    $('#imageModal').modal('show');
  }

</script>


