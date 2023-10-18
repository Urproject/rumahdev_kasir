<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table = 'product'; // Name of the database table

    // protected $primaryKey = 'id_product'; // Primary key column

    // protected $allowedFields = ['id_merchant', 'nama', 'harga', 'stok', 'kategori', 'deskripsi', 'gambar', 'jenis_diskon', 'nilai_diskon']; // Fields that can be inserted/updated

    // You can define additional settings and validation rules here if needed

    // public function getProducts(){
    //   return $this->findAll(); // Retrieve all rows from the 'product' table
    // }
}
