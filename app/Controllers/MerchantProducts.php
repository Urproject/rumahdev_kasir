<?php

namespace App\Controllers;

use App\Models\ProductModel;
use CodeIgniter\Controller;

class MerchantProducts extends BaseController {
  public function index() {

    $modelProduct = new ProductModel();
    // Replace the hardcoded merchant ID (1) with the actual merchant ID from your session
    $merchantId = 1;
    $data['products'] = $modelProduct->getProductsByMerchant($merchantId);

    $header['titleTab'] = 'RumahDev Kasir App';
    $header2['titlePage'] = 'Data Produk';

    echo view('partial/header', $header);
    echo view('partial/top_menu', $header2);
    echo view('partial/side_menu');
    echo view('products/index', $data);
    echo view('partial/footer');
  }

  public function detail($id = 1) {
    $id = $this->request->getGet('id');
    if ($id === null) {
        return redirect()->to('/error-page');
    }

    $modelProduct = new ProductModel();
    $product = $modelProduct->find($id);

    if ($product === null) {
        return redirect()->to('/error-page');
    }

    $data['product'] = $product;

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