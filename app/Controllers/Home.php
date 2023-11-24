<?php

namespace App\Controllers;

use App\Models\M_user;
use CodeIgniter\Controller;


class Home extends BaseController {

	public function index() {
    $data = [
      'titleTab' => 'RumahDev Kasir App',
      'titlePage' => 'RumahDev - Kasir Login',
    ];

    echo view('partial/header', $data);
    echo view('login', $data);
    echo view('partial/footer');
	}

	public function loginAction() {
	  $muser = new M_user();
	  $username = $this->request->getPost('username');
	  $password = $this->request->getPost('password');

	  if (empty($username) || empty($password)) {
	    session()->setFlashdata('gagal', 'Username atau password tidak boleh kosong.');
	    return redirect()->to(base_url('login'));
	  }

	  $cek = $muser->getUser($username, $password);

	  if ($cek !== null && ($cek['username'] == $username) && ($cek['password'] == $password)) {
	    session()->set('username', $cek['username']);
	    session()->set('nama', $cek['nama']);
	    session()->set('email', $cek['email']);
	    session()->set('foto', $cek['foto']);
	    session()->set('id_user', $cek['id_user']);
	    return redirect()->to(base_url('kasir'));
	  } else {
	    session()->setFlashdata('gagal', 'Username atau password salah.');
	    return redirect()->to(base_url('login'));
	  }
	}

	public function logout() {
	  session()->destroy();
	  return redirect()->to(base_url('login'));
	}	

	public function daftar() {
    $data = [
      'titleTab' => 'RumahDev Kasir App',
      'titlePage' => 'RumahDev - Daftar Akun',
    ];

    echo view('partial/header', $data);
    echo view('daftar', $data);
    echo view('partial/footer');
	}

	public function daftarAkun(): string {
	  return view('daftar_akun');
	}

	public function daftarMerchant() {
    $data = [
      'titleTab' => 'RumahDev Kasir App',
      'titlePage' => 'Profil Merchant',
    ];

    echo view('partial/header', $data);
    echo view('daftar_merchant', $data);
    echo view('partial/footer');
	}

	public function profil0(): string {
	  return view('dashboard/profil0');
	}

	public function lupa_password(): string {
		return view('lupa_password');
	  }

}
