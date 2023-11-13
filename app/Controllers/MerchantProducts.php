<?php

namespace App\Controllers;

use App\Models\ProductModel;
use CodeIgniter\Controller;

class MerchantProducts extends BaseController {

  public function addProduct() {
    $header['titleTab'] = 'RumahDev Kasir App';
    $header2['titlePage'] = 'Tambah Produk';

    echo view('partial/header', $header);
    echo view('partial/top_menu', $header2);
    echo view('partial/side_menu');
    echo view('products/add_product');
    echo view('partial/footer');
  }

  public function addProductToDB() {
    $modelProduct = new ProductModel();

    // Get data from the form
    $productData = [
      'id_merchant' => $this->request->getPost('id_merchant'),
      'nama' => $this->request->getPost('product_name'),
      'harga' => $this->request->getPost('product_price'),
      'stok' => $this->request->getPost('product_stock'),
      'kategori' => $this->request->getPost('product_category'),
      'deskripsi' => $this->request->getPost('product_description'),
      // ... (other fields)
    ];

    // Insert the product data into the database
    $modelProduct->insert($productData);

    // Redirect with a success notification
    $notification = $this->request->getPost('notification');
    return redirect()->to(base_url('kasir/products'))->with('success', 'Product added successfully');
  }


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
