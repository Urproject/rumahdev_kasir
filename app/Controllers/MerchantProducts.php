<?php

namespace App\Controllers;

use App\Models\ProductModel;
use CodeIgniter\Controller;

class MerchantProducts extends BaseController {
  private $userData;

  public function __construct() {
    if (empty(session()->get('username'))) {
      session()->setFlashdata('gagal', 'Anda belum login');
      return redirect()->to(base_url('login'));
    }
    $this->fetchUserData();
  }

  private function fetchUserData() {
    $this->userData = [
      'username' => session()->get('username'),
      'nama' => session()->get('nama'),
      'email' => session()->get('email'),
      'foto' => session()->get('foto'),
      'id_user' => session()->get('id_user'),
      // Add other user data as needed
    ];
  }


  public function index() {
    $modelProduct = new ProductModel();

    $merchantId = model('M_Employee')->getMerchantIdByUserId($this->userData['id_user']);
    $data['products'] = $modelProduct->getProductsByMerchant($merchantId);

    $header['titleTab'] = 'RumahDev Kasir App';
    $header2['titlePage'] = 'Data Produk';
    $topMenuData = array_merge($header2, ['userData' => $this->userData]);

    echo view('partial/header', $header);
    echo view('partial/top_menu', $topMenuData);
    echo view('partial/side_menu');
    echo view('products/index', $data);
    echo view('partial/footer');
  }


  
  public function addProduct() {
    $header['titleTab'] = 'RumahDev Kasir App';
    $header2['titlePage'] = 'Tambah Produk';
    $topMenuData = array_merge($header2, ['userData' => $this->userData]);

    echo view('partial/header', $header);
    echo view('partial/top_menu', $topMenuData);
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
    $topMenuData = array_merge($header2, ['userData' => $this->userData]);

    echo view('partial/header', $header);
    echo view('partial/top_menu', $topMenuData);
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
    $topMenuData = array_merge($header2, ['userData' => $this->userData]);

    echo view('partial/header', $header);
    echo view('partial/top_menu', $topMenuData);
    echo view('partial/side_menu');
    echo view('products/edit_product', $data);
    echo view('partial/footer');
  }

}
