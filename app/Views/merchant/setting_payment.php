
<div class="content-wrapper bg-white">
  <section class="content">
    <div class="container-fluid my-3">

      <?php
      $failedNotification = session()->getFlashdata('failed');
      if ($failedNotification) { echo '<div class="alert alert-danger">' . $failedNotification . '</div>'; }
      ?>

      <?php
      $successNotification = session()->getFlashdata('success');
      if ($successNotification) { echo '<div class="alert alert-success">' . $successNotification . '</div>'; }
      ?>

      <h4 class="font-weight-bold mb-3">Jenis Pembayaran</h4>

      <form method="POST" action="<?= base_url('kasir/settings/save_payment'); ?>">
        <div class="row">

          <div class="col-md-4 mb-2">
            <div class="row">
              <div class="col-8">
                <p class="font-weight-bold">
                  Tunai/Cash <span class="text-secondary font-weight-normal font-italic">*wajib diaktifkan</span>
                </p>
              </div>
              <div class="col-4">
                <label class="switch-payment" style="float: right;">
                  <input type="checkbox" name="tunai" disabled <?= $currentTunai->data == 1 ? 'checked' : '' ?>>
                  <span class="slider-payment slider round" style="background: #a0a0a0;"></span>
                </label>
              </div>
            </div>
          </div>
          <div class="col-md-8"></div>


          <div class="col-md-4 mb-2">
            <div class="row">
              <div class="col-8">
                <p class="font-weight-bold">QRIS</p>
              </div>
              <div class="col-4">
                <label class="switch-payment" style="float: right;">
                  <!-- <input type="checkbox"> -->
                  <input type="checkbox" name="qris" <?= $currentQris->data == 1 ? 'checked' : '' ?>>
                  <span class="slider-payment slider round"></span>
                </label>
              </div>
            </div>
          </div>
          <div class="col-md-8"></div>


          <!-- VIRTUAL ACCOUNT -->
          <!-- <div class="col-md-4 mb-2">
            <div class="row">
              <div class="col-8">
                <p class="font-weight-bold">Virtual Account</p>
              </div>
              <div class="col-4">
                <label class="switch-payment" style="float: right;">
                  <input type="checkbox">
                  <input type="checkbox" name="virtual_account" <?= $currentVA->data == 1 ? 'checked' : '' ?>>
                  <span class="slider-payment slider round"></span>
                </label>
              </div>
            </div>
          </div>
          <div class="col-md-8"></div> -->


          <div class="col-md-4 mb-2">
            <div class="row">
              <div class="col-8">
                <p class="font-weight-bold">Transfer Bank</p>
              </div>
              <div class="col-4">
                <label class="switch-payment" style="float: right;">
                  <!-- <input type="checkbox"> -->
                  <input type="checkbox" name="transfer_bank" <?= $currentTransferBank->data != 0 ? 'checked' : '' ?>>
                  <span class="slider-payment slider round"></span>
                </label>
              </div>
            </div>
          </div>
          <div class="col-md-8"></div>


          <div class="col-md-6 mb-2">
            <div class="row" id="rekeningFields" style="<?= $currentTransferBank && $currentTransferBank->data ? '' : 'display: none;' ?>">

              <div class="col-md-4">
                <p>Pilih Bank</p>
              </div>
              <div class="col-md-8">
                <select class="form-control" name="bank_name" id="bankName">
                  <?php
                  $banks = ['0', 'BCA', 'BNI', 'BRI', 'BSI', 'BTN', 'Mandiri'];
                  foreach ($banks as $bank) {
                    $selected = $currentTransferBank && $currentTransferBank->data ? in_array($bank, explode('_', $currentTransferBank->data)) ? 'selected' : '' : '';
                    echo '<option value="' . $bank . '" ' . $selected . '>' . $bank . '</option>';
                  }
                  ?>
                </select>

              </div>

              <div class="col-md-4">
                <p>No. Rekening</p>
              </div>
              <div class="col-md-8">
                <input type="text" class="form-control" placeholder="0123456789" name="account_number" id="accountNumber" value="<?= $currentTransferBank && isset($currentTransferBank->data) && count(explode('_', $currentTransferBank->data)) >= 2 ? explode('_', $currentTransferBank->data)[1] : '' ?>">
              </div>

              <div class="col-md-4">
                <p>Nama</p>
              </div>
              <div class="col-md-8">
                <input type="text" class="form-control" placeholder="Budi Santoso" name="owner_name" id="ownerName" value="<?= $currentTransferBank && isset($currentTransferBank->data) && count(explode('_', $currentTransferBank->data)) >= 3 ? str_replace('-', ' ', explode('_', $currentTransferBank->data)[2]) : '' ?>">
              </div>
            </div> <!-- row input data bank.. -->

            <div class="tambah float-right mt-3">
              <a class="btn btn-sm rumahdev-bg text-white rounded-circle" onclick="tambahRekening()">
                <i class="fas fa-plus"></i>
              </a>
              Tambah Rekening
            </div>
          </div> <!-- div data rekening.. -->
          <div class="col-md-6"></div>

          <div class="col-md-6">          
            <button type="submit" class="btn btn-secondary rumahdev-bg-link my-5 float-right">Simpan</button>
          </div>

        </div>
      </form>

    </div>
  </section>
</div>


<script>
function tambahRekening() {
  console.log('Successfully Clicked!')
  document.getElementById('rekeningFields').style.display = 'inline';
}
</script>