<?php

namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\TransactionModel;
use App\Models\TransactionSubModel;
use App\Models\M_Merchant;
use App\Models\M_MerchantPayment;
use App\Models\M_User;

class Merchant extends BaseController {
  private $userData;

  public function __construct() {
    if (empty(session()->get('username'))) {
      session()->setFlashdata('gagal', 'Anda belum login');
      return redirect()->to(base_url('login'));
    }
    $this->M_User = new M_User();  // Add this line to instantiate the M_User model
    $this->fetchUserData();
  }

  private function fetchUserData() {
    $username = session()->get('username');
    $user = $this->M_User->getUserByUsername($username);

    if ($user) {
      $this->userData = [
        'username' => $user->username,
        'nama' => $user->nama,
        'email' => $user->email,
        'foto' => $user->foto,
        'id_user' => $user->id_user,
        'gender' => $user->gender,
        'alamat' => $user->alamat,
        // Add other user data as needed
      ];
    } else {
      // Handle the case where the user is not found in the database
      // You might want to redirect the user to the login page or handle it in a different way
      session()->setFlashdata('gagal', 'User not found in the database.');
      return redirect()->to(base_url('login'));
    }
  }

  public function index() {
    if (session()->get('username') == '') {
      session()->setFlashdata('gagal', 'Anda belum login');
      return redirect()->to(base_url('login'));
    } else {
      $modelProduct = new ProductModel();
      $merchantModel = new M_Merchant();

      $merchantId = model('M_Employee')->getMerchantIdByUserId($this->userData['id_user']);
      $merchantData = $merchantModel->find($merchantId);

      $data['products'] = $modelProduct->getProductsByMerchant($merchantId);
      $data['merchantData'] = $merchantData;
      $data['userData'] = $this->userData;

      $data2 = [
        'level' => model('M_Employee')->getLevelByUserId($this->userData['id_user']),
        'titleTab' => 'RumahDev Kasir App',
        'titlePage' => 'Dashboard Merchant',
        'userData' => $this->userData,
      ];

      echo view('partial/header', $data2);
      echo view('partial/wrapper', $data2);
      echo view('partial/side_menu', $data2);
      echo view('merchant/order', $data);
      echo view('partial/footer');
    }
  }


	public function addOrderToDB() {

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
    // return redirect()->to(base_url('kasir/confirm'));
    // Redirect to the confirmation page with the id_transaction parameter
    // return redirect()->to(base_url('kasir/transactions/confirm?id=' . $id_transaction));


    // Prepare the response
    $response = [
        'id_transaction' => $id_transaction,
        'message' => 'Order added successfully',
        // Add any other data you want to send back to the client
    ];

    // Return the response
    return $this->response->setJSON($response);
    

	}



  public function profil() {

    $data = [
      'level' => model('M_Employee')->getLevelByUserId($this->userData['id_user']),
      'titleTab' => 'RumahDev Kasir App',
      'titlePage' => 'Profil Merchant',
      'userData' => $this->userData,
    ];

    echo view('partial/header', $data);
    echo view('partial/top_menu', $data);
		echo view('partial/side_menu', $data);
		echo view('merchant/profil');
		echo view('partial/footer');
  }

  public function profilUser() {
    $level = model('M_Employee')->getLevelByUserId($this->userData['id_user']);

    $data = [
      'level' => $level,
      'titleTab' => 'RumahDev Kasir App',
      'titlePage' => 'Profil Akun',
      'userData' => $this->userData,
    ];

    echo view('partial/header', $data);
    echo view('partial/top_menu', $data);
    echo view('partial/side_menu', $data);

    if ($level == 1) {
      echo view('merchant/profil_user_v1', $data);
    } elseif ($level == 2) {
      echo view('merchant/profil_user_v2', $data);
    } else {
      echo view('merchant/profil_user_default', $data);
    }

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

  $data = [
    'level' => model('M_Employee')->getLevelByUserId($this->userData['id_user']),
    'titleTab' => 'RumahDev Kasir App',
    'titlePage' => 'Konfirmasi Pembayaran',
    'userData' => $this->userData,
  ];

  echo view('partial/header', $data);
  echo view('partial/top_menu', $data);
	echo view('partial/side_menu', $data);
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


  public function settings() {
    $merchantId = model('M_Employee')->getMerchantIdByUserId($this->userData['id_user']);
    $merchantModel = new M_Merchant();
    $settingData = $merchantModel->find($merchantId);

    $data = [
      'level' => model('M_Employee')->getLevelByUserId($this->userData['id_user']),
      'titleTab' => 'RumahDev Kasir App',
      'titlePage' => 'Setting General',
      'userData' => $this->userData,
      'settingData' => $settingData, 
    ];

    echo view('partial/header', $data);
    echo view('partial/top_menu', $data);
    echo view('partial/side_menu', $data);
    echo view('merchant/settings', $data);
    echo view('partial/footer');
  }


  public function saveSettings() {
    $merchantId = model('M_Employee')->getMerchantIdByUserId($this->userData['id_user']);
    $merchantModel = new M_Merchant();

    $diskon = $this->request->getPost('diskon') === 'on' ? 1 : 0;
    $pajak = $this->request->getPost('pajak') === 'on' ? 1 : 0;
    $jlh_meja = $this->request->getPost('jlh_meja');

    $data = [
      'diskon' => $diskon,
      'pajak' => $pajak,
      'jlh_meja' => $jlh_meja,
    ];


    $merchantModel->update(['id_merchant' => $merchantId], $data);

    // Redirect back to the settings page with success message
    session()->setFlashdata('success', 'Berhasil menyimpan pengaturan');
    return redirect()->to(base_url('/kasir/settings'));
  }


  public function settingPayment() {

    $merchantId = model('M_Employee')->getMerchantIdByUserId($this->userData['id_user']);
    $merchantPaymentModel = new M_MerchantPayment();

    $currentTunai = $merchantPaymentModel->where(['id_merchant' => $merchantId, 'id_method' => 1])->first();
    $currentTransferBank = $merchantPaymentModel->where(['id_merchant' => $merchantId, 'id_method' => 2])->first();
    $currentQris = $merchantPaymentModel->where(['id_merchant' => $merchantId, 'id_method' => 3])->first();
    $currentVA = $merchantPaymentModel->where(['id_merchant' => $merchantId, 'id_method' => 4])->first();

    $data = [
        'level' => model('M_Employee')->getLevelByUserId($this->userData['id_user']),
        'titleTab' => 'RumahDev Kasir App',
        'titlePage' => 'Setting Payment',
        'userData' => $this->userData,
        'currentTunai' => $currentTunai,
        'currentQris' => $currentQris,
        'currentTransferBank' => $currentTransferBank,
        'currentVA' => $currentVA,
        // Add other payment methods as needed
    ];

    echo view('partial/header', $data);
    echo view('partial/top_menu', $data);
		echo view('partial/side_menu', $data);
		echo view('merchant/setting_payment', $data);
		echo view('partial/footer');
  }

  public function saveSettingPayment() {
    $merchantId = model('M_Employee')->getMerchantIdByUserId($this->userData['id_user']);
    $merchantPaymentModel = new M_MerchantPayment();

    if ($this->request->getPost('transfer_bank') === 'on') {
      $bankName = $this->request->getPost('bank_name');
      $accountNumber = $this->request->getPost('account_number');
      $ownerName = $this->request->getPost('owner_name');
      if ($bankName != 0 && $accountNumber != '' && $ownerName != '') {
        $formattedData = $bankName . '_' . $accountNumber . '_' . str_replace(' ', '-', $ownerName);
        $merchantPaymentModel->update(['id_merchant' => $merchantId, 'id_method' => 2], 
          ['data' => $formattedData]);
      } else { 
        session()->setFlashdata('failed', 'Jika mengaktifkan pembayaran transfer, data rekening tidak boleh kosong');
        return redirect()->to(base_url('/kasir/settings/payment'));
      }
    } else {
      $merchantPaymentModel->update(['id_merchant' => $merchantId, 'id_method' => 2], ['data' => 0]);
    }

    $merchantPaymentModel->update(['id_merchant' => $merchantId, 'id_method' => 3], 
      ['data' => $this->request->getPost('qris') === 'on' ? 1 : 0]);
    // $merchantPaymentModel->update(['id_merchant' => $merchantId, 'id_method' => 4], 
    //   ['data' => $this->request->getPost('virtual_account') === 'on' ? 1 : 0]);
    $merchantPaymentModel->update(['id_merchant' => $merchantId, 'id_method' => 1], 
      ['data' => 1]);

    session()->setFlashdata('success', 'Berhasil menyimpan pengaturan pembayaran');
    return redirect()->to(base_url('/kasir/settings/payment'));
  }


}
