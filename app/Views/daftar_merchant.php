
<div class="row py-5 rumahdev-bg">
  <div class="col-md-8 bg-light rounded mx-auto">

    <div class="text-center my-3">
      <img style="width: 100px;" src="<?= base_url('assets/images/logo-rd2.png'); ?>">
      <h3 class="fw-normal">
        Daftar <span class="fw-bold text-uppercase rumahdev-color">RumahDev</span> Kasir
      </h3>
    </div>

    <form method="post" action="<?= base_url('daftar/action') ?>" enctype="multipart/form-data">
      <input required type="hidden" name="step" value="2">

      <div class="row py-3 px-1">

        <div class="col-md-6 pl-5">

          <a href="<?= base_url('daftar') ?>" class=" btn btn-sm rumahdev-bg text-white mb-3">Sebelumnya</a>
          <h5 class="font-weight-bold">Informasi Usaha</h5>

          <div class="form-group my-3" style="width: 90%;">
            <label for="nama_usaha">Nama Usaha (Merk/Brand)</label>
            <input required name="nama_usaha" id="nama_usaha" class="form-control rounded" type="text" placeholder="Contoh : Restoran Garuda" aria-label="nama_usaha">
          </div>

          <div class="form-group my-3" style="width: 90%;">
            <label for="jenis_usaha">Jenis Usaha</label>
            <input required name="jenis_usaha" id="jenis_usaha" class="form-control rounded" type="text" placeholder="Contoh : Restoran/Cafe" aria-label="jenis_usaha">
          </div>

          <div class="form-group my-3" style="width: 90%;">
            <label for="no_telepon">Nomor Telepon</label>
            <input required name="no_telepon" id="no_telepon" class="form-control rounded" type="text" placeholder="Contoh : 081278992023" aria-label="no_telepon">
          </div>

          <div class="form-group">
            <label for="alamat_usaha">Alamat</label>
            <textarea name="alamat_usaha" id="alamat_usaha" class="form-control" rows="3" placeholder="ex: Jl. Besar Medan Sumatera Utara" style="width: 90%;"></textarea>
          </div>
        </div>


        <div class="col-md-6 pl-5">
          <h5 class="font-weight-bold">Data Perusahaan</h5>


          <div class="form-group my-3" style="width: 90%;">
            <label for="no_izin">Nomor Izin Usaha (NIB/SIUP/TDUP) <span class="text-secondary font-weight-normal font-italic">*jika ada</span></label>
            <input required name="no_izin" id="no_izin" class="form-control rounded" type="text" placeholder="12345678" aria-label="no_izin">
          </div>

          <div class="form-group my-3" style="width: 90%;">
            <label for="file_izin">
              Upload Izin Usaha 
              <span class="text-secondary font-weight-normal">
                (jpg/jpeg/png/pdf) 
                <i>*jika ada</i>
              </span>
            </label>
            <input required type="file" name="file_izin" id="file_izin">
            <!-- <div class="custom-file">
              <input required name="file_izin" type="file" class="custom-file-input" id="validatedCustomFile" style="cursor: pointer;">
              <label class="custom-file-label text-secondary" for="validatedCustomFile">Upload Izin Usaha...</label>
              <div class="invalid-feedback">Example invalid custom file feedback</div>
            </div> -->
          </div>

          <div class="form-group my-3" style="width: 90%;">
            <label for="no_npwp">NPWP Usaha</label>
            <input required name="no_npwp" id="no_npwp" class="form-control rounded" type="text" placeholder="12345678" aria-label="no_npwp">
          </div>

          <div class="form-group my-3" style="width: 90%;">
            <label for="file_npwp">Upload NPWP <span class="text-secondary font-weight-normal">(jpg/jpeg/png/pdf)</span></label>
            <input required type="file" name="file_npwp" id="file_npwp">
            <!-- <div class="custom-file">
              <input required name="file_npwp" type="file" class="custom-file-input" id="validatedCustomFile" style="cursor: pointer;">
              <label class="custom-file-label text-secondary" for="validatedCustomFile">Upload NPWP...</label>
              <div class="invalid-feedback">Example invalid custom file feedback</div>
            </div> -->
          </div>

          <div class="form-group my-3" style="width: 90%;">
            <label for="no_ktp">Nomor KTP Pemilik</label>
            <input required name="no_ktp" id="no_ktp" class="form-control rounded" type="text" placeholder="12345678" aria-label="no_ktp">
          </div>

          <div class="form-group my-3" style="width: 90%;">
            <label for="file_ktp">Upload KTP <span class="text-secondary font-weight-normal">(jpg/jpeg/png/pdf)</span></label>
            <input required type="file" name="file_ktp" id="file_ktp">
            <!-- <div class="custom-file">
              <input required name="file_ktp" type="file" class="custom-file-input" id="validatedCustomFile" style="cursor: pointer;">
              <label class="custom-file-label text-secondary" for="validatedCustomFile">Upload KTP...</label>
              <div class="invalid-feedback">Example invalid custom file feedback</div>
            </div> -->
          </div>
          <br>

        </div>

      </div>

      <div class="text-center mb-5">
        <button type="submit" class="btn rumahdev-bg text-white text-center" style="width: 200px;">Ajukan Usaha</button>
        <!-- <a href="<?= base_url('/kasir') ?>" class="btn rumahdev-bg text-white text-center" style="width: 200px; position:center;"> Ajukan Usaha</a> -->
      </div>

    </form>

  </div>
</div>


</body>
</html>
