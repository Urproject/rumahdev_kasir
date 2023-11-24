<?php

namespace App\Controllers;

use App\Models\TransactionModel;
use App\Models\ProductModel;
use App\Models\TransactionSubModel;
use App\Models\M_PaymentMethod;
use CodeIgniter\Controller;

class MerchantTransactions extends BaseController {
  private $userData;

  public function __construct() {
    if (empty(session()->get('username'))) {
      session()->setFlashdata('gagal', 'Anda belum login');
      return redirect()->to(base_url('login'));
    }
    $this->fetchUserData();
  }

  public function index() {
    // Get the merchant ID for the active user from the Employee model
    $merchantId = model('M_Employee')->getMerchantIdByUserId($this->userData['id_user']);
    
    // Fetch transactions based on the merchant ID
    $transactionModel = new TransactionModel();
    $transactions = $transactionModel->getTransactionsByMerchantId($merchantId);

    $data = [
      'level' => model('M_Employee')->getLevelByUserId($this->userData['id_user']),
      'titleTab' => 'RumahDev Kasir App',
      'titlePage' => 'Data Transaksi',
      'userData' => $this->userData,
    ];

    echo view('partial/header', $data);
    echo view('partial/top_menu', $data);
    echo view('partial/side_menu', $data);
    echo view('transactions/index', ['transactions' => $transactions]);
    echo view('partial/footer');
  }

  public function detail($id = null) {
    $id = $this->request->getGet('id');
    if ($id === null) {
      return redirect()->to('/error-page');
    }

    $transactions = $this->fetchTransactionDetails($id);

    if (empty($transactions)) {
      return redirect()->to('/error-page');
    }

    $total_harga = $this->calculateTotals($transactions);

    // Fetch payment method information
    $modelPaymentMethod = new M_PaymentMethod();
    $paymentMethod = $modelPaymentMethod->find($transactions[0]->id_method);

    $data = [
      'level' => model('M_Employee')->getLevelByUserId($this->userData['id_user']),
      'titleTab' => 'RumahDev Kasir App',
      'titlePage' => 'Detail Transaksi',
      'userData' => $this->userData,
    ];

    echo view('partial/header', $data);
    echo view('partial/top_menu', $data);
    echo view('partial/side_menu', $data);
    echo view('transactions/detail', [
        'transactions' => $transactions,
        'total_harga' => $total_harga,
        'paymentMethod' => $paymentMethod,
    ]);
    echo view('partial/footer');
  }

  public function confirm($id = null) {
    $id = $this->request->getGet('id');
    if ($id === null) {
      return redirect()->to('/error-page');
    }

    $transactions = $this->fetchTransactionDetails($id);

    if (empty($transactions)) {
      return redirect()->to('/error-page');
    }

    $total_harga = $this->calculateTotals($transactions);
    $data = [
      'level' => model('M_Employee')->getLevelByUserId($this->userData['id_user']),
      'titleTab' => 'RumahDev Kasir App',
      'titlePage' => 'Konfirmasi Pembayaran',
      'userData' => $this->userData,
    ];

    echo view('partial/header', $data);
    echo view('partial/top_menu', $data);
    echo view('partial/side_menu', $data);
    echo view('merchant/confirm', ['transactions' => $transactions, 'total_harga' => $total_harga, 'userData' => $this->userData]);
    echo view('partial/footer');
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

  private function fetchTransactionDetails($id) {
    $db = \Config\Database::connect();
    $builder = $db->table('transaction');
    $builder->join('transaction_sub', 'transaction.id_transaction = transaction_sub.id_transaction', 'left');
    $builder->where('transaction.id_transaction', $id);

    $query = $builder->get();
    $transactions = $query->getResult();

    // Fetch product details for each transaction
    foreach ($transactions as &$transaction) {
        $transaction->product_info = $this->getProductInfo($transaction->id_product);
    }

    return $transactions;
  }

  private function getProductInfo($id_product) {
    $db = \Config\Database::connect();
    $builder = $db->table('product');
    $builder->where('id_product', $id_product);
    $query = $builder->get();
    return $query->getRow();
  }

  private function calculateTotals(array &$transactions) {
    $total_harga = 0;

    foreach ($transactions as &$transaction) {
      $transaction->subtotal = $transaction->jumlah * $transaction->id_product;
      $total_harga += $transaction->subtotal;

      $product_info = $this->getProductInfo($transaction->id_product);
      $transaction->product_name = $product_info->nama;
      $transaction->product_price = $product_info->harga;
    }

    return $total_harga;
  }
}
