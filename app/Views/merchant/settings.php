
<div class="content-wrapper bg-white">
  <section class="content">
  	<div class="container-fluid my-3">

      <?php
      $successNotification = session()->getFlashdata('failed');
      if ($successNotification) { echo '<div class="alert alert-success">' . $successNotification . '</div>'; }
      ?>

      <?php
      $successNotification = session()->getFlashdata('success');
      if ($successNotification) { echo '<div class="alert alert-success">' . $successNotification . '</div>'; }
      ?>

      <form method="POST" action="<?= base_url('kasir/settings/save'); ?>">
        <div class="my-3">
          <h5 class="font-weight-bold">Aktifkan Diskon</h5>
        
          <label class="switch">
            <input name="diskon" type="checkbox" <?= $settingData->diskon == 1 ? 'checked' : '' ?>>
            <span class="slider round"></span>
          </label>
          <br>
        </div>

        <div class="my-3">
          <h5 class="font-weight-bold">Aktifkan Pajak (11%)</h5>

          <label class="switch">
            <input name="pajak" type="checkbox" <?= $settingData->pajak == 1 ? 'checked' : '' ?>>
            <span class="slider round"></span>
          </label>
        </div>

        <div class="form-group my-3">
          <h5 class="font-weight-bold">Atur Jumlah Meja 
            <span class="text-secondary font-weight-normal font-italic" style="font-size: 16px;">*0 jika tidak ada</span>
          </h5> 

          <input name="jlh_meja" id="jlh_meja" class="form-control rounded" type="number" min="0" placeholder="0" 
            aria-label="jlh_meja" style="width: 150px;" value="<?= $settingData->jlh_meja ?? '' ?>">
        </div>

        <button type="submit" class="btn btn-secondary rumahdev-bg-link my-3">Simpan</button>
      </form>

  	</div>
  </section>
</div>
