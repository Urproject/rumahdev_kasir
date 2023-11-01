<!DOCTYPE html>
<html lang="en">
<head>
  <?= $this->include('templates/head'); ?>
  <title>RumahDev - Merchant Daftar</title>
</head>

<body>

  <div class="d-flex justify-content-center align-items-center rumahdev-bg" style="width: 100%; height: 150vh;">

    <div class="col-md-8 bg-light pt-4 pb-4 rounded">
      <div class="text-center">
        <img style="width: 25%;" src="<?= base_url('assets/images/logo-rd2.png'); ?>">
        <h3 class="fw-normal mt-4">
          Daftar <span class="fw-bold text-uppercase">RumahDev</span> Merchant
        </h3>
      </div>
      
      <br>

      <div class="row">
      <div class="col-sm-6 ms-4">
  
        <h4><b> Informasi Usaha </b></h4>
        <br>

        <p class="lh-sm"><b> Nama Usaha (Merk/Brand)</b></p>
        <div class="input-group my-3" style="width: 80%;">
        <input class="form-control rounded" type="text" placeholder="Contoh : Restoran Garuda" aria-label="nama_usaha">
        </div>

        
        <p class="lh-sm"><b> Jenis Usaha</b></p>
        <div class="input-group my-3" style="width: 80%;">
        <input class="form-control rounded" type="text" placeholder="Contoh : Restoran/Cafe" aria-label="jenis_usaha">
        </div>
      

        <p class="lh-sm"><b> Nomor Telepon</b></p>
        <div class="input-group my-3" style="width: 80%;">
        <input class="form-control rounded" type="text" placeholder="Contoh : 081278992023" aria-label="telepon">
        </div>

        <div class="form-group">
        <label for="exampleFormControlTextarea1"> Alamat</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="ex: Jl. Besar Medan Sumatera Utara" style="width: 80%;"></textarea>
        </div>

      </div>


      <div class="col-sm-5">

        <h4><b> Data Perusahaan</b></h4>
        <br>

        <p class="lh-sm"><b> Nomor Izin Usaha (NIB/SIUP/TDUP)</b> <span style="color:gray;font-style:italic;">*jika ada</span></p>
        <div class="input-group my-3" style="width: 95%;">
        <input class="form-control rounded" type="text" placeholder="12345678" aria-label="nomor_izin">
        </div>

        <p class="lh-sm"><b> Upload Izin Usaha</b> <span style="color:gray;font-style:italic;">*jika ada</span></p>
        <div class="custom-file" style="width: 95%;">
          <input type="file" class="custom-file-input" id="validatedCustomFile" required style="cursor: pointer;">
          <label class="custom-file-label" for="validatedCustomFile">Upload Izin Usaha...</label>
          <div class="invalid-feedback">Example invalid custom file feedback</div>
        </div>
        <br>
        <br>

        <p class="lh-sm"><b> NPWP Usaha</b></p>
        <div class="input-group my-3" style="width: 95%;">
        <input class="form-control rounded" type="text" placeholder="12345678" aria-label="npwp_usaha">
        </div>

        <p class="lh-sm"><b> Upload NPWP</b></p>
        <div class="custom-file" style="width: 95%;">
          <input type="file" class="custom-file-input" id="validatedCustomFile" required style="cursor: pointer;">
          <label class="custom-file-label" for="validatedCustomFile">Upload NPWP...</label>
          <div class="invalid-feedback">Example invalid custom file feedback</div>
        </div>
        <br>
        <br>
        
       
        <p class="lh-sm"><b> Nomor KTP Pemilik</b></p>
        <div class="input-group my-3" style="width: 95%;">
        <input class="form-control rounded" type="text" placeholder="12345678" aria-label="no_ktp">
        </div>

        <p class="lh-sm"><b> Upload KTP</b></p>
        <div class="custom-file" style="width: 95%;">
          <input type="file" class="custom-file-input" id="validatedCustomFile" required style="cursor: pointer;">
          <label class="custom-file-label" for="validatedCustomFile">Upload KTP...</label>
          <div class="invalid-feedback">Example invalid custom file feedback</div>
        </div>
        <br>
        <br>


        </div>
    </div>

    <div class="text-center">
      <a href="<?= base_url('daftar/merchant') ?>"><button class="btn rumahdev-bg text-white text-center" style="width: 200px; position:center;"> Ajukan Usaha</button></a>
      <br>
    </div>
      

  </div>

</body>
</html>
