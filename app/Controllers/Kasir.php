<?php

namespace App\Controllers;

class Kasir extends BaseController {

  public function index() {
	$db = \Config\Database::connect();
	$query = $db->query('SELECT * FROM product');
	$data['products'] = $query->getResult();

	$header['titleTab']='RumahDev Kasir App';
	$header2['titlePage']='Dashboard Merchant';
	
	echo view('partial/header', $header);
	echo view('partial/side_menu');
	echo view('merchant/dashboard', $data);
	echo view('partial/footer');
  }

}
