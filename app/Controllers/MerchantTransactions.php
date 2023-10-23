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

  public function detail($id=1) {
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


}
