<?php

namespace App\Controllers;

use App\Models\M_user;
use CodeIgniter\Controller;


class Home extends BaseController {

	public function index(): string {
	  return view('login');
	}

   
 public function loginAction() {
    $muser = new M_user();

    $username = $this->request->getPost('username');
    $password = $this->request->getPost('password');

    $cek = $muser->getUser($username, $password);

    if (($cek['username'] == $username) && ($cek['password'] == $password))
    {
       session()->set('username', $cek['username']);
       session()->set('nama', $cek['nama']);
       session()->set('email', $cek['email']);
       session()->set('foto', $cek['foto']);
       session()->set('id_user', $cek['id_user']);
       return redirect()->to(base_url('kasir'));
    } else {
       session()->setFlashdata('gagal', 'Username / Password salah');
       return redirect()->to(base_url('login'));
    }
 }

 public function logout() {
    session()->destroy();
    return redirect()->to(base_url('login'));
 }	

	public function daftar(): string {
	  return view('daftar');
	}

	public function daftarAkun(): string {
	  return view('daftar_akun');
	}

	public function daftarMerchant() {
		$header['titleTab']='RumahDev Kasir App';
		$header2['titlePage']='Profil Merchant';
		
		echo view('partial/header', $header);
		echo view('daftar_merchant');
	}

	public function dashboard0(): string {
	  return view('dashboard/dashboard0');
	}

	public function profil0(): string {
	  return view('dashboard/profil0');
	}

	public function lupa_password(): string {
		return view('lupa_password');
	  }

}
