<?php

namespace App\Models;

use CodeIgniter\Model;

class TransactionModel extends Model {
  protected $table         = 'transaction'; // Name of the database table
  protected $primaryKey    = 'id_transaction'; // Primary key column
  protected $returnType    = 'object';

  protected $allowedFields = [
    'id_transaction', 'id_user', 'id_merchant', 'id_method', 'tanggal', 'waktu',
    'total_harga', 'total_diskon', 'no_meja', 'jenis_pesanan', 'status_pesanan',
    'keterangan', 'bukti_bayar'
  ]; // Fields that can be inserted/updated

  public function getTransactions() {
    return $this->select('transaction.*, user.nama, payment_method.payment_type')
      ->join('user', 'transaction.id_user = user.id_user')
      ->join('payment_method', 'transaction.id_method = payment_method.id_method')
      ->orderBy('transaction.tanggal DESC, transaction.waktu DESC')
      ->findAll();
  }

  public function getTransactionsById($id) {
    return $this->select('transaction.*, user.nama, payment_method.payment_type')
      ->join('user', 'transaction.id_user = user.id_user')
      ->join('payment_method', 'transaction.id_method = payment_method.id_method')
      ->where('transaction.id_transaction', $id)
      ->findAll();
  }

  // public function getTransactionsByMerchantId($merchantId) {
  //   return $this->select('transaction.*, user.nama, payment_method.payment_type')
  //     ->join('user', 'transaction.id_user = user.id_user')
  //     ->join('payment_method', 'transaction.id_method = payment_method.id_method')
  //     ->join('merchant_employee', 'transaction.id_merchant = merchant_employee.id_merchant')
  //     ->where('merchant_employee.id_merchant', $merchantId)
  //     ->orderBy('transaction.tanggal DESC, transaction.waktu DESC')
  //     ->findAll();
  // }

  public function getTransactionsByMerchantId($merchantId) {
    return $this->select('transaction.*, user.nama, payment_method.payment_type')
      ->join('user', 'transaction.id_user = user.id_user')
      ->join('payment_method', 'transaction.id_method = payment_method.id_method')
      ->where('transaction.id_merchant', $merchantId)
      ->orderBy('transaction.tanggal DESC, transaction.waktu DESC')
      ->findAll();
  }



  public function insertTransaction($data) {
    $this->insert($data);
    return $this->insertID();
  }
}
