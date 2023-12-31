<?php

namespace App\Models;

use CodeIgniter\Model;

class TransactionSubModel extends Model {
  protected $table = 'transaction_sub';
  protected $primaryKey = 'id_sub';
  protected $returnType = 'object';

  protected $allowedFields = ['id_transaction', 'id_product', 'jumlah', 'subtotal', 'diskon'];

  // Add a method to insert a new transaction sub-record
  public function insertTransactionSub($data) {
    return $this->insert($data);
  }


  public function updateOrInsert($conditions, $data) {
    $existingRecord = $this->where($conditions)->get()->getRow();
    if ($existingRecord) {
      $this->where($conditions)->set($data)->update();
    } else {
      $this->insert(array_merge($conditions, $data));
    }
  }

}
