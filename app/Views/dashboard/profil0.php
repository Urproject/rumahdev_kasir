<!DOCTYPE html>
<html lang="en">
<head>
  <?= $this->include('templates/head'); ?>
  <title>RumahDev - Kasir Dashboard</title>
</head>

<body>


<div class="container-fluid row p-0" style="">

  <!-- left sidebar -->
  <div class="col-md-2 bg-white shadow">
    <div class="d-flex flex-column p-3" style="height: 100vh;">
      <a href="<?= base_url('home/dashboard0') ?>" class="mb-3 mb-md-0 me-md-auto ms-4 text-decoration-none">
        <img class="me-2" style="height: 40px;" src="<?= base_url('assets/images/logo-rd2.png'); ?>">
        <br>
        <span class="fs-5 fw-bold rumahdev-color mt-auto">KASIR APP</span>
      </a>
      <hr>

      <ul class="nav nav-pills flex-column flex-grow-1 mb-auto">
        <li class="nav-item position-center" style="text-align:center">
        <i class="fa-solid fa-circle-exclamation fa-3x" style="color: #00a987;"></i>
        <br>
        <br>
        <span class="fs-8 fw-bold rumahdev-color mt-auto">Menu tidak tersedia karena belum mendaftarkan toko, segera daftarkan! </span>
        <br>
        <br>
        <a href="<?= base_url('')?>" class="nav-link rumahdev-color">
        <button type="button" class="btn rumahdev-btn">Ajukan</button>
        </a>
        </li>
      </ul>
      <hr>

      </hr>

      <ul class="nav nav-pills flex-column mb-auto">
        <li>
          <a href="<?= base_url('') ?>" class="nav-link rumahdev-color">
            <span class="me-3" style="font-size: 14px;"><i class="fa-solid fa-right-from-bracket"></i></span>
            Logout
          </a>
        </li>
      </ul>
    </div>
  </div> <!-- left sidebar -->


  <div class="col-md-10 bg-white">
    <nav class="navbar navbar-light bg-light">
    <span class="navbar-brand mb-0 ms-3 rumahdev-color fs-3 fw-bold"> Profil Saya</span>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li class="fw-bold"> Meina Lisa</li>
      <li> meinalisaa02</li>
		</ul>
		
    </nav>

    <div class="row-md-10 ms-3 bg-white">
      <br>
    <p class="fs-5"><img src="\assets\images\profil2.png" style="float:left; height:110px; width: 110px; padding-right: 10px;" />
    <p class="m-2 ms-3">Meina Lisa <br> meinalisaa02 <br><b> Umum</b></p></p> <br>
      <form>
      <div class="mb-2 col-md-6">
        <label for="exampleInputEmail1" class="form-label"> Email</label>
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="ex: meinalisa02@gmail.com">
      </div>

      <div class="mb-2 col-md-6">
        <label for="exampleInputNumberPhone" class="form-label"> Nomor Telepon</label>
        <input type="text" class="form-control" id="exampleInputNumberPhone1" placeholder="ex: 082134567890">
      </div>

      <div class="form-group col-md-6">
        <label for="exampleFormControlTextarea1"> Alamat</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="ex: Jl. Besar Medan Sumatera Utara"></textarea>
      </div>
      <br>
    
    <a href="<?= base_url('')?>" class="nav-link rumahdev-color">
        <button type="button" class="btn rumahdev-btn"> Edit Profil</button>
    </a>

  </div>

  
  </div>
</div>

</body>
</html>
