
<div class="row py-5 rumahdev-bg">
  <div class="col-md-8 bg-light rounded mx-auto">
    <div class="text-center my-3">
      <img style="width: 100px;" src="<?= base_url('assets/images/logo-rd2.png'); ?>">
      <h3 class="fw-normal">
        Daftar <span class="fw-bold text-uppercase rumahdev-color">RumahDev</span> Kasir
      </h3>
    </div>


    <div class="row py-3 px-1">

      <div class="col-md-6 pl-5">
        <a href="<?= base_url('daftar') ?>" class=" btn btn-sm rumahdev-bg text-white mb-3">Sebelumnya</a>
        <h5 class="font-weight-bold">Informasi Usaha</h5>

        <div class="form-group my-3" style="width: 90%;">
          <label for="namaUsaha">Nama Usaha (Merk/Brand)</label>
          <input id="namaUsaha" class="form-control rounded" type="text" placeholder="Contoh : Restoran Garuda" aria-label="nama_usaha">
        </div>

        <div class="form-group my-3" style="width: 90%;">
          <label for="jenisUsaha">Jenis Usaha</label>
          <input id="jenisUsaha" class="form-control rounded" type="text" placeholder="Contoh : Restoran/Cafe" aria-label="jenis_usaha">
        </div>

        <div class="form-group my-3" style="width: 90%;">
          <label for="nomorUsaha">Nomor Telepon</label>
          <input id="nomorUsaha" class="form-control rounded" type="text" placeholder="Contoh : 081278992023" aria-label="telepon">
        </div>

        <div class="form-group">
          <label for="alamatUsaha">Alamat</label>
          <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="ex: Jl. Besar Medan Sumatera Utara" style="width: 90%;"></textarea>
        </div>
      </div>


      <div class="col-md-6 pl-5">
        <h5 class="font-weight-bold">Data Perusahaan</h5>


        <div class="form-group my-3" style="width: 90%;">
          <label>Nomor Izin Usaha (NIB/SIUP/TDUP) <span class="text-secondary font-weight-normal font-italic">*jika ada</span></label>
          <input class="form-control rounded" type="text" placeholder="12345678" aria-label="nomor_izin">
        </div>

        <div class="form-group my-3" style="width: 90%;">
          <label>Upload Izin Usaha <span class="text-secondary font-weight-normal font-italic">*jika ada</span></label>
          <div class="custom-file">
            <input type="file" class="custom-file-input" id="validatedCustomFile" required style="cursor: pointer;">
            <label class="custom-file-label" for="validatedCustomFile">Upload Izin Usaha...</label>
            <div class="invalid-feedback">Example invalid custom file feedback</div>
          </div>
        </div>

        <div class="form-group my-3" style="width: 90%;">
          <label>NPWP Usaha</label>
          <input class="form-control rounded" type="text" placeholder="12345678" aria-label="npwp_usaha">
        </div>

        <div class="form-group my-3" style="width: 90%;">
          <label>Upload NPWP</label>
          <div class="custom-file">
            <input type="file" class="custom-file-input" id="validatedCustomFile" required style="cursor: pointer;">
            <label class="custom-file-label" for="validatedCustomFile">Upload NPWP...</label>
            <div class="invalid-feedback">Example invalid custom file feedback</div>
          </div>
        </div>

        <div class="form-group my-3" style="width: 90%;">
          <label>Nomor KTP Pemilik</label>
          <input class="form-control rounded" type="text" placeholder="12345678" aria-label="no_ktp">
        </div>

        <div class="form-group my-3" style="width: 90%;">
          <label>Upload KTP</label>
          <div class="custom-file">
            <input type="file" class="custom-file-input" id="validatedCustomFile" required style="cursor: pointer;">
            <label class="custom-file-label" for="validatedCustomFile">Upload KTP...</label>
            <div class="invalid-feedback">Example invalid custom file feedback</div>
          </div>
        </div>
        <br>

      </div>

    </div>


    <div class="text-center mb-5">
      <a href="<?= base_url('/kasir') ?>" class="btn rumahdev-bg text-white text-center" style="width: 200px; position:center;"> Ajukan Usaha</a>
    </div>

  </div>
</div>


</body>
</html>
