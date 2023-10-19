<?php

namespace App\Controllers;

// use App\Models\ProductModel;
// use CodeIgniter\Controller;

class MerchantProducts extends BaseController {

	public function index() {
    $db = \Config\Database::connect();
    $query = $db->query('SELECT * FROM product');
    $data['products'] = $query->getResult();

    $header['titleTab']='RumahDev Kasir App';
    $header2['titlePage']='Data Produk';
    
    echo view('partial/header', $header);
    echo view('partial/top_menu', $header2);
    echo view('partial/side_menu');
    echo view('products/index', $data);
    echo view('partial/footer');
	}


}
