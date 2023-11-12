<?php

namespace App\Controllers;

use App\Models\TransactionModel;
use CodeIgniter\Controller;

class MerchantTransactions extends BaseController {

  public function index() {
    $transactionModel = new TransactionModel();
    $transactions = $transactionModel->getTransactions();

    $header['titleTab'] = 'RumahDev Kasir App';
    $header2['titlePage'] = 'Data Transaksi';

    echo view('partial/header', $header);
    echo view('partial/top_menu', $header2);
    echo view('partial/side_menu');
    echo view('transactions/index', ['transactions' => $transactions]);
    echo view('partial/footer');
  }


  public function detail($id = null) { // Provide a default value of null
    $id = $this->request->getGet('id');
    if ($id === null) {
      // Handle the case where no ID is provided, e.g., display an error message or redirect
      // For example, you can redirect to a 404 page or display a message
      return redirect()->to('/error-page');
    }

    $db = \Config\Database::connect();

    $builder = $db->table('transaction');
    $builder->join('transaction_sub', 'transaction.id_transaction = transaction_sub.id_transaction', 'left');
    $builder->where('transaction.id_transaction', $id); // Use the $id from the URL

    $query = $builder->get();
    $transactions = $query->getResult();

    // Initialize total_harga
    $total_harga = 0;

    // Retrieve product information and calculate subtotal
    foreach ($transactions as &$transaction) {
      $transaction->subtotal = $transaction->jumlah * $transaction->id_product;
      $total_harga += $transaction->subtotal;

      // Fetch product information in the controller
      $product_info = $this->getProductInfo($transaction->id_product);
      $transaction->product_name = $product_info->nama;
      $transaction->product_price = $product_info->harga;
    }

    $header['titleTab'] = 'RumahDev Kasir App';
    $header2['titlePage'] = 'Detail Transaksi';

    echo view('partial/header', $header);
    echo view('partial/top_menu', $header2);
    echo view('partial/side_menu');
    echo view('transactions/detail', ['transactions' => $transactions, 'total_harga' => $total_harga]);
    echo view('partial/footer');
  }

  // Create this private function in your controller
  private function getProductInfo($id_product) {
    $db = \Config\Database::connect();
    $builder = $db->table('product');
    $builder->where('id_product', $id_product);
    $query = $builder->get();
    return $query->getRow();
  }


  public function confirm($id = null) {
    $id = $this->request->getGet('id');
    if ($id === null) {
      // Handle the case where no ID is provided, e.g., display an error message or redirect
      // For example, you can redirect to a 404 page or display a message
      return redirect()->to('/error-page');
    }

    $db = \Config\Database::connect();

    $builder = $db->table('transaction');
    $builder->join('transaction_sub', 'transaction.id_transaction = transaction_sub.id_transaction', 'left');
    $builder->where('transaction.id_transaction', $id);

    $query = $builder->get();
    $transactions = $query->getResult();

    // Initialize total_harga
    $total_harga = 0;

    // Retrieve product information and calculate subtotal
    foreach ($transactions as &$transaction) {
      $transaction->subtotal = $transaction->jumlah * $transaction->id_product;
      $total_harga += $transaction->subtotal;

      // Fetch product information in the controller
      $product_info = $this->getProductInfo($transaction->id_product);
      $transaction->product_name = $product_info->nama;
      $transaction->product_price = $product_info->harga;
    }

    $header['titleTab'] = 'RumahDev Kasir App';
    $header2['titlePage'] = 'Konfirmasi Pembayaran';

    echo view('partial/header', $header);
    echo view('partial/top_menu', $header2);
    echo view('partial/side_menu');
    echo view('merchant/confirm', ['transactions' => $transactions, 'total_harga' => $total_harga]);
    echo view('partial/footer');
  }


}
