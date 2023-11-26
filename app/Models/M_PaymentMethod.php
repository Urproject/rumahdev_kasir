<?php
namespace App\Models;

use CodeIgniter\Model;

class M_PaymentMethod extends Model {
  protected $table = 'payment_method';
  protected $primaryKey = 'id_method';
  protected $returnType = 'object';
  
  protected $allowedFields = ['id_method', 'payment_type'];
}
