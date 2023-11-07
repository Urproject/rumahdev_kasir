<?php

namespace App\Models;

use CodeIgniter\Model;

class TransactionModel extends Model {
	protected $table 			= 'transaction'; // Name of the database table
	protected $primaryKey = 'id_transaction'; // Primary key column
	protected $returnType     = 'object';

	protected $allowedFields = ['id_transaction', 'id_user', 'id_merchant', 'tanggal', 'waktu', 'total_harga', 'total_diskon', 'no_meja', 'jenis_pesanan', 'keterangan', 'bukti_bayar']; // Fields that can be inserted/updated
	
  public function getTransactions() {
    return $this->select('transaction.*, user.nama, payment_method.payment_type')
      ->join('user', 'transaction.id_user = user.id_user')
      ->join('payment_method', 'transaction.id_method = payment_method.id_method')
      ->orderBy('transaction.tanggal DESC, transaction.waktu DESC')
      ->findAll();
  }
}