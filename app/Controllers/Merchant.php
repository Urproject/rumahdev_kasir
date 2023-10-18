<?php

namespace App\Controllers;

// use App\Models\ProductModel;
// use CodeIgniter\Controller;

class Merchant extends BaseController {

	public function index(): string {
	  return view('merchant/dashboard');
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

    if ($db->connect(true)) {
      echo 'Database connection successful.';
    } else {
      echo 'Database connection failed.';
    }

    $query = $db->query('SELECT * FROM product');
    $data['products'] = $query->getResult();

    $header['title']='Halaman Testing';
    echo view('partial/header', $header);
    echo view('partial/top_menu');
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

}
