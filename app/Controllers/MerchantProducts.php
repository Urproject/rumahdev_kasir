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
    $data = [
      'level' => model('M_Employee')->getLevelByUserId($this->userData['id_user']),
      'products' => $modelProduct->getProductsByMerchant($merchantId),
      'titleTab' => 'RumahDev Kasir App',
      'titlePage' => 'Data Produk',
      'userData' => $this->userData,
    ];

    echo view('partial/header', $data);
    echo view('partial/top_menu', $data);
    echo view('partial/side_menu');
    echo view('products/index', $data);
    echo view('partial/footer');
  }

  
  public function addProduct() {
    $data = [
      'level' => model('M_Employee')->getLevelByUserId($this->userData['id_user']),
      'titleTab' => 'RumahDev Kasir App',
      'titlePage' => 'Tambah Produk',
      'userData' => $this->userData,
    ];

    echo view('partial/header', $data);
    echo view('partial/top_menu', $data);
    echo view('partial/side_menu');
    echo view('products/add_product');
    echo view('partial/footer');
  }

  public function addProductAction() {
    $modelProduct = new ProductModel();
    $merchantId = model('M_Employee')->getMerchantIdByUserId($this->userData['id_user']);

    $productData = [
      'id_merchant' => $merchantId,
      'nama' => $this->request->getPost('product_name'),
      'harga' => $this->request->getPost('product_price'),
      'stok' => 0, 
      'kategori' => $this->request->getPost('product_category'),
      'deskripsi' => $this->request->getPost('product_description'),
      'jenis_diskon' => $this->request->getPost('discount_type'),
      'nilai_diskon' => $this->request->getPost('discount_amount'),
    ];

    // Handle file upload
    $file = $this->request->getFile('product_image');
    if ($file && $file->isValid() && !$file->hasMoved()) {
      $newName = 'p-' . date('dmY-His') . '.' . $file->getClientExtension();
      $file->move(ROOTPATH . 'public/assets/images/produk/', $newName);
      $productData['gambar'] = $newName;
    }

    $modelProduct->insert($productData);
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

    $data = [
      'product' => $product,
      'level' => model('M_Employee')->getLevelByUserId($this->userData['id_user']),
      'titleTab' => 'RumahDev Kasir App',
      'titlePage' => 'Detail Produk',
      'userData' => $this->userData,
    ];

    echo view('partial/header', $data);
    echo view('partial/top_menu', $data);
    echo view('partial/side_menu');
    echo view('products/detail', $data);
    echo view('partial/footer');
  }


  public function editProduct($id=null) {
    $id = $this->request->getGet('id');
    if ($id === null) {
        return redirect()->to('/error-page');
    }

    $modelProduct = new ProductModel();
    $product = $modelProduct->find($id);
    if ($product === null) {
        return redirect()->to('/error-page');
    }

    $data = [
      'product' => $product,
      'level' => model('M_Employee')->getLevelByUserId($this->userData['id_user']),
      'titleTab' => 'RumahDev Kasir App',
      'titlePage' => 'Edit Produk',
      'userData' => $this->userData,
    ];

    echo view('partial/header', $data);
    echo view('partial/top_menu', $data);
    echo view('partial/side_menu');
    echo view('products/edit_product', $data);
    echo view('partial/footer');
  }

  
  public function deleteProduct(){
    $id = $this->request->getGet('id');
    if ($id === null) {
      return redirect()->to(base_url('kasir/products'))->with('error', 'Product ID not provided');
    }

    $modelProduct = new ProductModel();

    $product = $modelProduct->find($id);
    if ($product === null) {
      return redirect()->to(base_url('kasir/products'))->with('error', 'Product not found');
    }

    try {
      $modelProduct->delete($product->id_product);
      return redirect()->to(base_url('kasir/products'))->with('success', 'Product deleted successfully');
    } catch (\Exception $e) {
      return redirect()->to(base_url('kasir/products'))->with('error', 'Error deleting product: ' . $e->getMessage());
    }
  }

}
