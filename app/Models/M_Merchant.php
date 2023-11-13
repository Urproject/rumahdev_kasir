<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Merchant extends Model {
  protected $table = 'merchant';
  protected $primaryKey = 'id_merchant';
  protected $returnType = 'object';

  protected $allowedFields = ['id_merchant', 'nama_usaha', 'jenis_usaha', 'alamat', 'npwp', 'no_ktp', 'foto_ktp', 'diskon', 'pajak', 'id_user'];

}
