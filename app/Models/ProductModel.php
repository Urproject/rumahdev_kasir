<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model {
	protected $table 			= 'product'; // Name of the database table
	protected $primaryKey = 'id_product'; // Primary key column
	protected $returnType     = 'object';

	protected $allowedFields = ['id_product', 'id_merchant', 'nama', 'harga', 'stok', 'kategori', 'deskripsi', 'gambar', 'jenis_diskon', 'nilai_diskon']; // Fields that can be inserted/updated

  public function getProductsByMerchant($merchantId) {
    return $this->where('id_merchant', $merchantId)
      ->orderBy('nama', 'ASC')
      ->findAll();
  }
}