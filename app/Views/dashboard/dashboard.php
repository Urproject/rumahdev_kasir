<!DOCTYPE html>
<html lang="en">
<head>
  <?= $this->include('templates/head'); ?>
  <title>RumahDev - Kasir Dashboard</title>
</head>

<body>


<div class="container-fluid row p-0" style="">

  <!-- left sidebar -->
  <div class="col-md-2 bg-white">
    <div class="d-flex flex-column p-3" style="height: 100vh;">
      <a href="#" class="mb-3 mb-md-0 me-md-auto text-decoration-none">
        <img class="me-2" style="height: 40px;" src="<?= base_url('assets/images/logo-rd2.png'); ?>">
        <br>
        <span class="fs-5 fw-bold rumahdev-color mt-auto">KASIR APP</span>
      </a>
      <hr>

      <ul class="nav nav-pills flex-column flex-grow-1 mb-auto">
        <li class="nav-item">
          <a href="#" class="nav-link link-light rumahdev-bg" aria-current="page">
            <span class="me-3" style="font-size: 12px;"><i class="fa-solid fa-house"></i></span>
            Dashboard
          </a>
        </li>
        <li>
          <a href="#" class="nav-link link-dark">
            <span class="me-3" style="font-size: 17px;"><i class="fa-solid fa-file-lines"></i></span>
            Riwayat
          </a>
        </li>
        <li>
          <a href="#" class="nav-link link-dark">
            <span class="me-3" style="font-size: 15px;"><i class="fa-solid fa-bars"></i></span>
            Menu
          </a>
        </li>
      </ul>
      <hr>

      <ul class="nav nav-pills flex-column mb-auto">
        <li>
          <a href="#" class="nav-link link-dark">
            <span class="me-3" style="font-size: 14px;"><i class="fa-solid fa-gear"></i></span>
            Setting
          </a>
        </li>
        <li>
          <a href="#" class="nav-link link-dark">
            <span class="me-3" style="font-size: 14px;"><i class="fa-solid fa-right-from-bracket"></i></span>
            Logout
          </a>
        </li>
      </ul>
    </div>
  </div> <!-- left sidebar -->

  <!-- content -->
  <div class="col-md-7 bg-light">
    <div class="scrollable-content p-3" style="height: 100vh; overflow-y: auto; overflow-x: hidden;"> 

      <div class="input-group mt-0 mb-3" style="width: 360px;">
        <input type="text" class="form-control" placeholder="Search" aria-label="search">
        <span class="input-group-text" id="basic-addon1">
          <button type="button" class="btn p-0">
            <i class="text-secondary fa-solid fa-search"></i>
          </button>
        </span>
      </div>

      <div class="mb-4">
        <a class="btn btn-outline-secondary border me-2">Kategori1</a>
        <a class="btn btn-outline-secondary border me-2">Kategori2</a>
        <a class="btn btn-outline-secondary border me-2">Kategori3</a>
        <a class="btn btn-outline-secondary border me-2">Kategori4</a>
      </div>

      <h3 class="fw-bold">Semua Produk</h3>

      <!-- products -->
      <div class="row">

        <div class="col-md-3 px-2 mb-3">
          <div class="card text-center">
            <img src="<?= base_url('assets/images/gambar4.png'); ?>" class="card-img-top" alt="Foto Produk">
            <div class="card-body">
              <span class=" fw-bold card-title">Produk A</span><br>
              <span class="card-text">Rp 20.000</span>
              <button href="#" class="btn btn-secondary rumahdev-bg mt-2">
                Tambahkan
              </button>
            </div>
          </div>
        </div>

        <div class="col-md-3 px-2 mb-3">
          <div class="card text-center">
            <img src="<?= base_url('assets/images/gambar4.png'); ?>" class="card-img-top" alt="Foto Produk">
            <div class="card-body">
              <span class=" fw-bold card-title">Produk A</span><br>
              <span class="card-text">Rp 20.000</span>
              <button href="#" class="btn btn-secondary rumahdev-bg mt-2">
                Tambahkan
              </button>
            </div>
          </div>
        </div>


        <div class="col-md-3 px-2 mb-3">
          <div class="card text-center">
            <img src="<?= base_url('assets/images/gambar4.png'); ?>" class="card-img-top" alt="Foto Produk">
            <div class="card-body">
              <span class=" fw-bold card-title">Produk A</span><br>
              <span class="card-text">Rp 20.000</span>
              <button href="#" class="btn btn-secondary rumahdev-bg mt-2">
                Tambahkan
              </button>
            </div>
          </div>
        </div>


        <div class="col-md-3 px-2 mb-3">
          <div class="card text-center">
            <img src="<?= base_url('assets/images/gambar4.png'); ?>" class="card-img-top" alt="Foto Produk">
            <div class="card-body">
              <span class=" fw-bold card-title">Produk A</span><br>
              <span class="card-text">Rp 20.000</span>
              <button href="#" class="btn btn-secondary rumahdev-bg mt-2">
                Tambahkan
              </button>
            </div>
          </div>
        </div>


        <div class="col-md-3 px-2 mb-3">
          <div class="card text-center">
            <img src="<?= base_url('assets/images/gambar4.png'); ?>" class="card-img-top" alt="Foto Produk">
            <div class="card-body">
              <span class=" fw-bold card-title">Produk A</span><br>
              <span class="card-text">Rp 20.000</span>
              <button href="#" class="btn btn-secondary rumahdev-bg mt-2">
                Tambahkan
              </button>
            </div>
          </div>
        </div>



        <!-- <div class="col-md-6 p-2">
          <div class="card border">

            <div class="row g-0">
              <div class="col-md-4 p-1">
                <img src="<?= base_url('assets/images/gambar2.png'); ?>" class="card-img" alt="">
              </div>

              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="fw-bold card-title">Nama Produk</h5>
                  <p class="card-text">
                    <span class="fw-bold">Rp 20.000 </span><br>
                    <span style="font-size: 14px;">Deskripsi Produk Some quick example text to build on the card title and make up the bulk.</span>
                  </p>
                </div>
              </div>
            </div>

            <div class="card-footer d-flex justify-content-end bg-white">
              <a href="#" class="btn btn-secondary rumahdev-bg">Tambahkan</a>
            </div>

          </div>
        </div> -->

      </div> <!-- products -->

    </div>

  </div> <!-- content -->

  <!-- right sidebar -->
  <div class="col-md-3 bg-white">
    <div class="d-flex flex-column py-3" style="height: 100vh;">
      <div class="dropdown">
        <a href="#" class="d-flex align-items-center text-decoration-none dropdown-toggle link-dark" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
          <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
          <span>Username12345</span>
        </a>
        <ul class="dropdown-menu dropdown-menu-light text-small shadow" aria-labelledby="dropdownUser1" style="">
          <li><a class="dropdown-item" href="#">Profile</a></li>
          <li><a class="dropdown-item" href="#">Logout</a></li>
        </ul>
      </div>
      <hr>

      <h5 class="fw-bold mb-3">Pembayaran</h5>

      <!-- daftar pesanan -->
      <div class="flex-grow-1 pe-2" style="height: 100%; overflow-y: auto; overflow-x: hidden;">

        <div class="row">
          <div class="d-flex justify-content-between">
            <span class="fw-bold mb-2">Nama Produk Abcde</span>
            <span class="text-secondary my-auto" style="font-size: 14px;">Rp 20.000</span>
          </div>

          <div class="d-flex justify-content-between">
            <span>
              <button href="#" class="btn btn-secondary btn-sm" style="font-size: 10px;">
                <i class="text-white fa-solid fa-minus"></i>
              </button>
              <span class="px-2">2</span>
              <button href="#" class="btn btn-secondary btn-sm" style="font-size: 10px;">
                <i class="text-white fa-solid fa-plus"></i>
              </button>
            </span>
            <span class="">Rp 40.000</span>
          </div>
        </div>
        <hr class="my-2">

        <div class="row">
          <div class="d-flex justify-content-between">
            <span class="fw-bold mb-2">Nama Produk Abcde</span>
            <span class="text-secondary my-auto" style="font-size: 14px;">Rp 20.000</span>
          </div>

          <div class="d-flex justify-content-between">
            <span>
              <button href="#" class="btn btn-secondary btn-sm" style="font-size: 10px;">
                <i class="text-white fa-solid fa-minus"></i>
              </button>
              <span class="px-2">2</span>
              <button href="#" class="btn btn-secondary btn-sm" style="font-size: 10px;">
                <i class="text-white fa-solid fa-plus"></i>
              </button>
            </span>
            <span class="">Rp 40.000</span>
          </div>
        </div>
        <hr class="my-2">

        <div class="row">
          <div class="d-flex justify-content-between">
            <span class="fw-bold mb-2">Nama Produk Abcde</span>
            <span class="text-secondary my-auto" style="font-size: 14px;">Rp 20.000</span>
          </div>

          <div class="d-flex justify-content-between">
            <span>
              <button href="#" class="btn btn-secondary btn-sm" style="font-size: 10px;">
                <i class="text-white fa-solid fa-minus"></i>
              </button>
              <span class="px-2">2</span>
              <button href="#" class="btn btn-secondary btn-sm" style="font-size: 10px;">
                <i class="text-white fa-solid fa-plus"></i>
              </button>
            </span>
            <span class="">Rp 40.000</span>
          </div>
        </div>
        <hr class="my-2">

        <div class="row">
          <div class="d-flex justify-content-between">
            <span class="fw-bold mb-2">Nama Produk Abcde</span>
            <span class="text-secondary my-auto" style="font-size: 14px;">Rp 20.000</span>
          </div>

          <div class="d-flex justify-content-between">
            <span>
              <button href="#" class="btn btn-secondary btn-sm" style="font-size: 10px;">
                <i class="text-white fa-solid fa-minus"></i>
              </button>
              <span class="px-2">2</span>
              <button href="#" class="btn btn-secondary btn-sm" style="font-size: 10px;">
                <i class="text-white fa-solid fa-plus"></i>
              </button>
            </span>
            <span class="">Rp 40.000</span>
          </div>
        </div>
        <hr class="my-2">

        <div class="row">
          <div class="d-flex justify-content-between">
            <span class="fw-bold mb-2">Nama Produk Abcde</span>
            <span class="text-secondary my-auto" style="font-size: 14px;">Rp 20.000</span>
          </div>

          <div class="d-flex justify-content-between">
            <span>
              <button href="#" class="btn btn-secondary btn-sm" style="font-size: 10px;">
                <i class="text-white fa-solid fa-minus"></i>
              </button>
              <span class="px-2">2</span>
              <button href="#" class="btn btn-secondary btn-sm" style="font-size: 10px;">
                <i class="text-white fa-solid fa-plus"></i>
              </button>
            </span>
            <span class="">Rp 40.000</span>
          </div>
        </div>
        <hr class="my-2">
      </div> <!-- daftar pesanan -->
        
      <div class="border-top pt-2">
        <div class="d-flex justify-content-between">
          <span>Subtotal</span>
          <span>Rp 60.000</span>
        </div>

        <div class="d-flex justify-content-between">
          <span>Diskon/Pajak</span>
          <span>Rp 0</span>
        </div>
        <hr>

        <div class="fw-bold fs-5 d-flex justify-content-between">
          <span>Total</span>
          <span>Rp 60.000</span>
        </div>
      </div>

      <a href="#" class="btn btn-secondary rumahdev-bg mt-2">Proses Pembayaran</a>



    </div>
  </div>  <!-- right sidebar -->

</div>


</body>
</html>
