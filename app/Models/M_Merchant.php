<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Merchant extends Model {
  protected $table = 'merchant';
  protected $primaryKey = 'id_merchant';
  protected $returnType = 'object';

  protected $allowedFields = ['id_merchant', 'nama_usaha', 'jenis_usaha', 'no_telepon', 'alamat', 'no_izin', 'file_izin', 'no_npwp', 'file_npwp', 'no_ktp', 'file_ktp', 'diskon', 'pajak', 'id_user'];

}
