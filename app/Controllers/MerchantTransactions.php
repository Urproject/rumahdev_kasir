<?php

namespace App\Controllers;

class MerchantTransactions extends BaseController {

	public function index() {
    $db = \Config\Database::connect();
    $query = $db->query('SELECT * FROM transaction');
    $data['transactions'] = $query->getResult();

    $header['titleTab']='RumahDev Kasir App';
    $header2['titlePage']='Data Transaksi';
    
    echo view('partial/header', $header);
    echo view('partial/top_menu', $header2);
    echo view('partial/side_menu');
    echo view('transactions/index', $data);
    echo view('partial/footer');
	}


}
