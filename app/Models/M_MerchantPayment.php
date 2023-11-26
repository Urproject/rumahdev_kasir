<?php
namespace App\Models;

use CodeIgniter\Model;

class M_MerchantPayment extends Model {
  protected $table = 'merchant_payment';
  protected $primaryKey = 'id_payment';
  protected $returnType = 'object';
  
  protected $allowedFields = ['id_payment', 'id_merchant', 'id_method', 'data'];
  
}
