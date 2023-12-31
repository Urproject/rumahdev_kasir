<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Employee extends Model {
  protected $table = 'merchant_employee';
  protected $primaryKey = 'id_employee';
  protected $returnType = 'object';

  protected $allowedFields = ['id_employee', 'id_user', 'id_merchant', 'level'];

  public function getMerchantIdByUserId($userId) {
    return $this->where('id_user', $userId)
	    ->get()
	    ->getRow('id_merchant');
  }

   public function getLevelByUserId($userId) {
    return $this->where('id_user', $userId)
	    ->get()
	    ->getRow('level');
  }

  public function countEmployeesByMerchantId($merchantId, $level) {
    return $this->where('id_merchant', $merchantId)
      ->where('level', $level)
      ->countAllResults();
  }
}
