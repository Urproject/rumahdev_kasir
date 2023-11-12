<?php

namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\TransactionModel;
use App\Models\TransactionSubModel;
// use CodeIgniter\Controller;

class Merchant extends BaseController {

  private $userData;

  public function __construct() {
    // Ensure that the parent constructor is not explicitly called

    // Check if the user is not logged in
    if (empty(session()->get('username'))) {
      session()->setFlashdata('gagal', 'Anda belum login');
      return redirect()->to(base_url('login'));
    }

    // Set user data to the private variable
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

    if (session()->get('username') == '') {
       session()->setFlashdata('gagal', 'Anda belum login');
       return redirect()->to(base_url('login'));
    }
    else {
      $modelProduct = new ProductModel();
      // Replace the hardcoded merchant ID (1) with the actual merchant ID from your session
      $merchantId = 1;
      $data['products'] = $modelProduct->getProductsByMerchant($merchantId);

        // Pass user data to the view
        $data['userData'] = $this->userData;

      $header['titleTab'] = 'RumahDev Kasir App';
      $header2['titlePage'] = 'Dashboard Merchant';

      echo view('partial/header', $header);
      echo view('partial/wrapper', $header2);
      echo view('partial/side_menu');
      echo view('merchant/order', $data);
      echo view('partial/footer');
    }

  }


	public function addOrderToDB() {
    log_message('error', 'Debug: Inside addOrderToDB'); // Add this line for debugging

    // Load the necessary models
    $transactionModel = new TransactionModel();
    $transactionSubModel = new TransactionSubModel();



    // Retrieve JSON data from the view
    $jsonData = json_decode(file_get_contents('php://input'), true);

    // Check if the variables are set
    if (!isset($jsonData['jenis_pesanan'], $jsonData['no_meja'], $jsonData['selectedProducts']) || !is_array($jsonData['selectedProducts'])) {
        return $this->response->setStatusCode(400)->setJSON(['error' => 'Invalid data']);
    }

    // Extract data from JSON
    $jenis_pesanan = $jsonData['jenis_pesanan'];
    $no_meja = $jsonData['no_meja'];
    $selectedProducts = $jsonData['selectedProducts'];


    // Log the extracted variables
    log_message('error', 'jenis_pesanan: ' . $jenis_pesanan);
    log_message('error', 'no_meja: ' . $no_meja);
    log_message('error', 'selectedProducts: ' . print_r($selectedProducts, true));




    // $jenis_pesanan = $this->request->getPost('jenis_pesanan');
    // $no_meja = $this->request->getPost('no_meja');
    // $selectedProducts = $this->request->getPost('selectedProducts');

    if (empty($jenis_pesanan) || empty($no_meja) || !is_array($selectedProducts)) {
        // Handle invalid or missing data
        // return $this->response->setStatusCode(400)->setJSON(['error' => 'Invalid data']);
        return redirect()->to(base_url('login')); // Replace 'error-page' with your error page URL
    }


    $jenis_pesanan = $jenis_pesanan ?? '';

    // Calculate the total_harga by summing up prices and quantities from selectedProducts
    $total_harga = 0;
    foreach ($selectedProducts as $product) {
      $total_harga += $product['price'] * $product['quantity'];
    }

    // Insert a record into the "transaction" table
    $transactionData = [
      'id_user' => 1, // Replace with your user ID
      'id_merchant' => 1, // Replace with the actual merchant ID
      'id_method' => 1, // temporary
      'tanggal' => date('Y-m-d'), // Current date
      'waktu' => date('H:i:s'), // Current time
      'total_harga' => $total_harga,
      'total_diskon' => 0, // Set diskon to 0 for now
      'no_meja' => $no_meja,
      'jenis_pesanan' => $jenis_pesanan,
      'status_pesanan' => 1, // Set status_pesanan to 1
      'keterangan' => '', // Leave keterangan empty for now
      'bukti_bayar' => '' // Leave bukti_bayar empty for now
    ];

  	$id_transaction = $transactionModel->insertTransaction($transactionData);

    // Insert records into the "transaction_sub" table for each selected product
    foreach ($selectedProducts as $product) {
      $subtotal = $product['price'] * $product['quantity'];
      $transactionSubData = [
        'id_transaction' => $id_transaction,
        'id_product' => $product['id'],
        'jumlah' => $product['quantity'],
        'subtotal' => $subtotal,
        'diskon' => 0 // Set diskon to 0 for now
      ];
    	$transactionSubModel->insertTransactionSub($transactionSubData);
    }

    // Redirect to the confirmation page
    return redirect()->to(base_url('kasir/confirm'));
	}



  public function profil() {

		$header['titleTab']='RumahDev Kasir App';
		$header2['titlePage']='Profil Merchant';
		
		echo view('partial/header', $header);
		echo view('partial/top_menu', $header2);
		echo view('partial/side_menu');
		echo view('merchant/profil');
		echo view('partial/footer');
  }

  public function profilUser($id=0) {

    $db = \Config\Database::connect();
    $query = $db->query('SELECT * FROM user WHERE id_user = ?', [$id]);
    $data['user'] = $query->getRow();

		$header['titleTab']='RumahDev Kasir App';
		$header2['titlePage']='Profil Akun';
	
		echo view('partial/header', $header);
		echo view('partial/top_menu', $header2);
		echo view('partial/side_menu');
		echo view('merchant/profil_user', $data);
		echo view('partial/footer');
  }

public function confirm() {
	$db = \Config\Database::connect();

	$builder = $db->table('transaction');
	$builder->join('transaction_sub', 'transaction.id_transaction = transaction_sub.id_transaction', 'left');
	$builder->where('transaction.id_transaction', 3);

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

	// Create this private function in your controller
	private function getProductInfo($id_product) {
		$db = \Config\Database::connect();
		$builder = $db->table('product');
		$builder->where('id_product', $id_product);
		$query = $builder->get();
		return $query->getRow();
	}

  public function settingPayment() {

		$header['titleTab']='RumahDev Kasir App';
		$header2['titlePage']='Setting Payment';
		
		echo view('partial/header', $header);
		echo view('partial/top_menu', $header2);
		echo view('partial/side_menu');
		echo view('merchant/setting_payment');
		echo view('partial/footer');
  }

  public function settingDiscount() {

		$header['titleTab']='RumahDev Kasir App';
		$header2['titlePage']='Setting Diskon, Pajak, dan Meja';
		
		echo view('partial/header', $header);
		echo view('partial/top_menu', $header2);
		echo view('partial/side_menu');
		echo view('merchant/setting_discount');
		echo view('partial/footer');
  }

}
