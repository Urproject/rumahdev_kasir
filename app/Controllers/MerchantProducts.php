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

  public function detail($id=1) {
    $db = \Config\Database::connect();
    $query = $db->query('SELECT * FROM product WHERE id_product = ?', [$id]);
    $data['products'] = $query->getResult();

    $header['titleTab'] = 'RumahDev Kasir App';
    $header2['titlePage'] = 'Detail Produk';

    echo view('partial/header', $header);
    echo view('partial/top_menu', $header2);
    echo view('partial/side_menu');
    echo view('products/detail', $data);
    echo view('partial/footer');
  }

  public function addProduct() {
    $header['titleTab'] = 'RumahDev Kasir App';
    $header2['titlePage'] = 'Tambah Produk';

    echo view('partial/header', $header);
    echo view('partial/top_menu', $header2);
    echo view('partial/side_menu');
    echo view('products/add_product');
    echo view('partial/footer');
  }

  public function editProduct($id=2) {
    $db = \Config\Database::connect();
    $query = $db->query('SELECT * FROM product WHERE id_product = ?', [$id]);
    $data['products'] = $query->getResult();

    $header['titleTab'] = 'RumahDev Kasir App';
    $header2['titlePage'] = 'Edit Produk';

    echo view('partial/header', $header);
    echo view('partial/top_menu', $header2);
    echo view('partial/side_menu');
    echo view('products/edit_product', $data);
    echo view('partial/footer');
  }

}
