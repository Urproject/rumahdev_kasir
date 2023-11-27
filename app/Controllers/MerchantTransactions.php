<?php

namespace App\Controllers;

use App\Models\TransactionModel;
use App\Models\ProductModel;
use App\Models\TransactionSubModel;
use App\Models\M_PaymentMethod;
use App\Models\M_Merchant;
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


  public function editOrder($id = null) {
    $id = $this->request->getGet('id');
    if ($id === null) { return redirect()->to('/error-page'); }

    $transactions = $this->fetchTransactionDetails($id);
    if (empty($transactions)) { return redirect()->to('/error-page'); }
    $total_harga = $this->calculateTotals($transactions);

    $modelProduct = new ProductModel();
    $merchantModel = new M_Merchant();
    $merchantId = model('M_Employee')->getMerchantIdByUserId($this->userData['id_user']);
    $merchantData = $merchantModel->find($merchantId);

    $data = [
      'level' => model('M_Employee')->getLevelByUserId($this->userData['id_user']),
      'titleTab' => 'RumahDev Kasir App',
      'titlePage' => 'Edit Pesanan',
      'userData' =>$this->userData,
      'products' => $modelProduct->getProductsByMerchant($merchantId),
      'merchantData' => $merchantData,
      'transactions' => $transactions,
      'total_harga' => $total_harga,
    ];

    echo view('partial/header', $data);
    echo view('partial/wrapper', $data);
    echo view('partial/side_menu', $data);
    echo view('transactions/edit', $data);
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


    $merchantId = model('M_Employee')->getMerchantIdByUserId($this->userData['id_user']);
    $merchantPaymentModel = new \App\Models\M_MerchantPayment();
    $paymentMethods = $merchantPaymentModel
      ->where('data !=', '0')
      ->where('id_merchant', $merchantId)
      ->findAll();

    $paymentMethodModel = new \App\Models\M_PaymentMethod();
    $paymentTypes = [];

    foreach ($paymentMethods as $paymentMethod) {
      $paymentTypeObject = $paymentMethodModel->find($paymentMethod->id_method);
      if ($paymentTypeObject) {
        $paymentTypes[$paymentMethod->id_method] = $paymentTypeObject->payment_type;
      }
    }

    $data = [
      'level' => model('M_Employee')->getLevelByUserId($this->userData['id_user']),
      'titleTab' => 'RumahDev Kasir App',
      'titlePage' => 'Konfirmasi Pembayaran',
      'userData' => $this->userData,
      'transactions' => $transactions,
      'total_harga' => $total_harga,
      'paymentMethods' => $paymentMethods,
      'paymentTypes' => $paymentTypes,
    ];

    echo view('partial/header', $data);
    echo view('partial/top_menu', $data);
    echo view('partial/side_menu', $data);
    echo view('transactions/confirm', $data);
    echo view('partial/footer');
  }


  public function confirmAction() {
    $merchantId = model('M_Employee')->getMerchantIdByUserId($this->userData['id_user']);
    $id_transaction = $this->request->getPost('id_transaction');

    $transactionData = [
      'id_user'        => $this->userData['id_user'],
      'id_merchant'    => $merchantId,
      'id_method'      => $this->request->getPost('id_method'),
      'tanggal'        => $this->request->getPost('tanggal'),
      'waktu'          => $this->request->getPost('waktu'),
      'total_harga'    => $this->request->getPost('total_harga'),
      'total_diskon'   => $this->request->getPost('total_diskon'),
      // 'total_pajak'    => $this->request->getPost('total_pajak'),
      'no_meja'        => $this->request->getPost('no_meja'),
      'jenis_pesanan'  => $this->request->getPost('jenis_pesanan'),
      'status_pesanan' => 2,
    ];

    // Update table transaction (transactionData)
    $transactionModel = new TransactionModel();
    $transactionModel->update($id_transaction, $transactionData);

    // Update table transaction_sub for each selected product
    $selectedProducts = $this->request->getPost('products');

    foreach ($selectedProducts as $productId => $productData) {
      $subTransactionData = [
        'id_transaction' => $id_transaction,
        'id_product'     => $productData['id_product'],
        'jumlah'         => $productData['jumlah'],
        'subtotal'       => $productData['subtotal'],
        'diskon'         => $productData['diskon'],
      ];

      $transactionSubModel = new TransactionSubModel();
    // Use custom updateOrInsert method
    $transactionSubModel->updateOrInsert(
      ['id_transaction' => $id_transaction, 'id_product' => $productData['id_product']],
      $subTransactionData
    );
    }

    // Additional logic or redirection after the update

    // Redirect to a success page or another action
    session()->setFlashdata('success', 'Berhasil menyelesaikan pesanan.');
    return redirect()->to(base_url('/kasir'));
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
    $transactionModel = model('TransactionModel');
    $transactions = $transactionModel
      ->select('transaction.*, transaction_sub.jumlah, transaction_sub.id_product')
      ->join('transaction_sub', 'transaction.id_transaction = transaction_sub.id_transaction', 'left')
      ->where('transaction.id_transaction', $id)
      ->findAll();

    // Fetch product details for each transaction
    foreach ($transactions as &$transaction) {
      $transaction->product_info = $this->getProductInfo($transaction->id_product);
    }

    return $transactions;
  }

  private function getProductInfo($id_product) {
    $productModel = model('ProductModel');
    return $productModel->find($id_product);
  }

  private function calculateTotals(array &$transactions) {
    $total_harga = 0;

    foreach ($transactions as &$transaction) {
      $transaction->subtotal = $transaction->jumlah * $transaction->product_info->harga;
      $total_harga += $transaction->subtotal;

      $transaction->product_name = $transaction->product_info->nama;
      $transaction->product_price = $transaction->product_info->harga;
    }

    return $total_harga;
  }
}
