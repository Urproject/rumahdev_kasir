<?php

namespace App\Controllers;

class MerchantUsers extends BaseController {

	public function index() {
    $db = \Config\Database::connect();
    $query = $db->query('SELECT * FROM user');
    $data['users'] = $query->getResult();

    $header['titleTab']='RumahDev Kasir App';
    $header2['titlePage']='Data Akun';
    
    echo view('partial/header', $header);
    echo view('partial/top_menu', $header2);
    echo view('partial/side_menu');
    echo view('users/index', $data);
    echo view('partial/footer');
	}

  public function detail($id=1) {
    $db = \Config\Database::connect();
    $query = $db->query('SELECT * FROM user WHERE id_user = ?', [$id]);
    $data['user'] = $query->getRow();

    $header['titleTab'] = 'RumahDev Kasir App';
    $header2['titlePage'] = 'User Detail';

    echo view('partial/header', $header);
    echo view('partial/top_menu', $header2);
    echo view('partial/side_menu');
    echo view('users/detail', $data);
    echo view('partial/footer');
  }

  public function addUser() {
    $header['titleTab'] = 'RumahDev Kasir App';
    $header2['titlePage'] = 'Tambah Akun';

    echo view('partial/header', $header);
    echo view('partial/top_menu', $header2);
    echo view('partial/side_menu');
    echo view('users/add_user');
    echo view('partial/footer');
  }
  
}
