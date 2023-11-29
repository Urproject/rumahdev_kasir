<?php

namespace App\Models;

use CodeIgniter\Model;

class M_User extends Model {
  protected $table = 'user';
  protected $primaryKey = 'id_user';
  protected $returnType = 'object';
  protected $allowedFields = ['id_user', 'nama', 'username', 'email', 'password', 'gender', 'alamat', 'foto', 'google_id'];

  public function getUsersByMerchant($merchantId) {
    return $this->join('merchant_employee', 'user.id_user = merchant_employee.id_user')
	    ->where('merchant_employee.id_merchant', $merchantId)
    	->findAll();
	}

  public function getUser($username, $password) {
    return $this->where(array('username' => $username, 'password' => $password))->get()->getRowArray();
  }

  public function getUserByUsername($username) {
    return $this->where('username', $username)->first();
  }

  public function isUsernameExists($username) {
    return $this->where('username', $username)
      ->countAllResults() > 0;
  }

  public function edit_data($userId,$userData)
  {
      $query = $this->db->table($this->table)->update($userData, array('id_user' => $userId));
      return $query;
  }
}
