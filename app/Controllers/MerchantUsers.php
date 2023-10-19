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


}
