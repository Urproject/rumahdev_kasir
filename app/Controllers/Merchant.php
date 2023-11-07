<?php

namespace App\Controllers;

use App\Models\ProductModel;
// use CodeIgniter\Controller;

class Merchant extends BaseController {

  public function index() {
	  $modelProduct = new ProductModel();
	  // Replace the hardcoded merchant ID (1) with the actual merchant ID from your session
	  $merchantId = 1;
	  $data['products'] = $modelProduct->getProductsByMerchant($merchantId);

    $header['titleTab'] = 'RumahDev Kasir App';
    $header2['titlePage'] = 'Dashboard Merchant';

    echo view('partial/header', $header);
    echo view('partial/wrapper', $header2);
    echo view('partial/side_menu');
    echo view('merchant/order', $data);
    echo view('partial/footer');
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
