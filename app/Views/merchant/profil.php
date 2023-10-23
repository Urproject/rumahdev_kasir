

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Main content -->
    <section class="content bg-white">
		
    <div class="row">
      <div class="col-sm-6">
      <b><h4> Informasi Usaha</b></h4>
      <p class="lh-sm"><b> Nama Usaha (Merk/Brand)</b></p>
        <input type="text" class="form-control" id="NamaUsaha" placeholder="Contoh : Restoran Garuda">
      <br>

      <p class="lh-sm"><b> Jenis Usaha</b></p>
        <input type="text" class="form-control" id="JenisUsaha" placeholder="Restoran">
      <br>

      <p class="lh-sm"><b> Alamat Usaha</b></p>
      <textarea type="text" class="form-control" id="alamat" style="resize:none;width:534px;height:100px;" placeholder="Jl. Sunggal No.15 Kec. Medan Sunggal Kota Medan Sumatera Utara"></textarea>
      <br>

      <p class="fs-5"><b><h4> Data Perusahaan</b></h4></p>
      <p class="lh-sm"><b> Nomor Izin Usaha (NIB/SIUP/TDUP)</b></p>
        <input type="text" class="form-control" id="NomorIzinUsaha" placeholder="12345678">
      <br>
            
      <p class="lh-sm"><b> Dokumen Izin Usaha</b></p>
      <a href="<?= base_url('')?>" class="nav-link rumahdev-color">
          <button type="button" class="btn rumahdev-btn">Lihat</button>
      </a>
      <br>

      
      <p class="lh-sm"><b> NPWP Usaha</b></p>
        <input type="text" class="form-control" id="NPWPUsaha" placeholder="12345678">
      <br>

      </div>


      <div class="col-sm-6">
      <b><h4> Informasi Pemilik</b></h4>
      <br>
      <p class="fs-5"><img src="\assets\images\profil2.png" style="float:left; height:110px; width: 110px; padding-right: 10px;" />
      <p class="m-2 ms-3">Meina Lisa <br> meinalisaa02 <br><b> Umum</b></p></p> <br>
      
      <p class="lh-sm"><b> Email</b></p>
        <input type="email" class="form-control" id="InputEmail" aria-describedby="emailHelp" placeholder="ex: meinalisa02@gmail.com">
      <br>

      <p class="lh-sm"><b> Nomor Telepon</b></p>
        <input type="text" class="form-control" id="InputNumber" placeholder="ex: 082134567890">
      <br>

      <a href="<?= base_url('')?>" class="nav-link rumahdev-color">
          <button type="button" class="btn rumahdev-btn"> Edit Profil</button>
      </a>
    
      </div>
    </div>



    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
