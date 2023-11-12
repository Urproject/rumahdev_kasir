<?php

namespace App\Models;

use CodeIgniter\Model;

class M_User extends Model {
	protected $table 			= 'user'; 
	protected $primaryKey = 'id_user';
	protected $returnType     = 'object';

	protected $allowedFields = ['id_user', 'nama', 'username', 'email', 'no_hp', 'password', 'gender', 'alamat', 'foto', 'google_id'];

	public function getUser($username, $password) {
      return $this->where(array('username' => $username, 'password' => $password))
      ->get()->getRowArray();
	}

}