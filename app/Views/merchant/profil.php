<!-- BELUM HANDLING LIHAT FILE -->

<div class="content-wrapper">
  <section class="content bg-white">  
    <div class="container-fluid row my-3">

      <div class="col-md-6">
        <h5 class="font-weight-bold">Informasi Usaha</h5>

        <div class="form-group my-3" style="width: 90%;">
          <label for="nama_usaha">Nama Usaha (Merk/Brand)</label>
          <input disabled name="nama_usaha" id="nama_usaha" class="form-control rounded" type="text" placeholder="Contoh : Restoran Garuda" aria-label="nama_usaha" value="<?= esc($merchantData->nama_usaha); ?>">
        </div>

        <div class="form-group my-3" style="width: 90%;">
          <label for="jenis_usaha">Jenis Usaha</label>
          <input disabled name="jenis_usaha" id="jenis_usaha" class="form-control rounded" type="text" placeholder="Contoh : Restoran/Cafe" aria-label="jenis_usaha" value="<?= esc($merchantData->jenis_usaha); ?>">
        </div>

        <div class="form-group my-3" style="width: 90%;">
          <label for="no_telepon">Nomor Telepon</label>
          <input disabled name="no_telepon" id="no_telepon" class="form-control rounded" type="text" placeholder="Contoh : 081278992023" aria-label="no_telepon" value="<?= esc($merchantData->no_telepon); ?>">
        </div>

        <div class="form-group">
          <label for="alamat_usaha">Alamat Usaha</label>
          <textarea disabled name="alamat_usaha" id="alamat_usaha" class="form-control" rows="3" placeholder="ex: Jl. Besar Medan Sumatera Utara" style="width: 90%;"><?= esc($merchantData->alamat); ?></textarea>
        </div>
      </div>

      <div class="col-md-6">
        <h5 class="font-weight-bold">Data Perusahaan</h5>

        <div class="form-group my-3" style="width: 90%;">
          <label for="no_izin">Nomor Izin Usaha (NIB/SIUP/TDUP)</label>
          <input disabled name="no_izin" id="no_izin" class="form-control rounded" type="text" placeholder="12345678" aria-label="no_izin" value="<?= esc($merchantData->no_izin); ?>">
        </div>

        <div class="form-group my-3" style="width: 90%;">
          <label for="file_izin">File Izin Usaha</label><br>
          <button class="btn text-white rumahdev-bg-link">Lihat</button>
        </div>

        <div class="form-group my-3" style="width: 90%;">
          <label for="no_npwp">NPWP Usaha</label>
          <input disabled name="no_npwp" id="no_npwp" class="form-control rounded" type="text" placeholder="12345678" aria-label="no_npwp" value="<?= esc($merchantData->no_npwp); ?>">
        </div>

        <div class="form-group my-3" style="width: 90%;">
          <label for="file_npwp">File NPWP</label><br>
          <button class="btn text-white rumahdev-bg-link">Lihat</button>
        </div>

        <div class="form-group my-3" style="width: 90%;">
          <label for="no_ktp">Nomor KTP Pemilik</label>
          <input disabled name="no_ktp" id="no_ktp" class="form-control rounded" type="text" placeholder="12345678" aria-label="no_ktp" value="<?= esc($merchantData->no_ktp); ?>">
        </div>

        <div class="form-group my-3" style="width: 90%;">
          <label for="file_ktp">File KTP</label><br>
          <button class="btn text-white rumahdev-bg-link">Lihat</button>
        </div>
        <br>
      </div>

    </div>
  </section>
</div>
