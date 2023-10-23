<?php

namespace App\Controllers;

// use App\Models\ProductModel;
// use CodeIgniter\Controller;

class Merchant extends BaseController {

  public function index() {
	$db = \Config\Database::connect();
	$query = $db->query('SELECT * FROM product');
	$data['products'] = $query->getResult();

	$header['titleTab']='RumahDev Kasir App';
	$header2['titlePage']='Dashboard Merchant';
	
	echo view('partial/header', $header);
	echo view('partial/side_menu');
	echo view('merchant/dashboard', $data);
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

  public function profilUser() {

	$header['titleTab']='RumahDev Kasir App';
	$header2['titlePage']='Profil Akun';
	
	echo view('partial/header', $header);
	echo view('partial/top_menu', $header2);
	echo view('partial/side_menu');
	echo view('merchant/profil_user');
	echo view('partial/footer');
  }

public function confirm() {
	$db = \Config\Database::connect();

	$builder = $db->table('transaction');
	$builder->join('transaction_sub', 'transaction.id_transaction = transaction_sub.id_transaction', 'left');
	$builder->where('transaction.id_transaction', 1);

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
	$header2['titlePage'] = 'Konfirmasi Pesanan';

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

	public function test() {
	$db = \Config\Database::connect();

	if ($db->connect(true)) {
	  echo 'Database connection successful.';
	} else {
	  echo 'Database connection failed.';
	}

	$query = $db->query('SELECT * FROM product');
	$data['products'] = $query->getResult();

	// $model = new \App\Models\ProductModel();
	// $data['products'] = $model->findAll();

	return view('merchant/test', $data);
	}  

  public function test2() {
		$db = \Config\Database::connect();
		$query = $db->query('SELECT * FROM product');
		$data['products'] = $query->getResult();

		$header['titleTab']='Title Tab';
		$header2['titlePage']='Title Page';
		
		echo view('partial/header', $header);
		echo view('partial/top_menu', $header2);
		echo view('partial/side_menu');
		echo view('merchant/testing', $data);
		echo view('partial/footer');
		// return view('merchant/testing', $data);
  }

  public function testing() {
		$header['title']='Halaman Testing';
		echo view('partial/header',$header);
		echo view('partial/top_menu');
		echo view('partial/side_menu');
		echo view('testing');
		echo view('partial/footer');
		// return view('testing');
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
		$header2['titlePage']='Setting Diskon dan Pajak';
		
		echo view('partial/header', $header);
		echo view('partial/top_menu', $header2);
		echo view('partial/side_menu');
		echo view('merchant/setting_discount');
		echo view('partial/footer');
  }

}
