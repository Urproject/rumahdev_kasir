<?php

namespace App\Controllers;

class Home extends BaseController {

	public function index(): string {
	  return view('login');
	}

	public function daftar(): string {
	  return view('daftar');
	}

	public function daftarAkun(): string {
	  return view('daftar_akun');
	}

	public function daftarMerchant(): string {
	  return view('daftar_merchant');
	}

	public function dashboard0(): string {
	  return view('dashboard/dashboard0');
	}

	public function profil0(): string {
	  return view('dashboard/profil0');
	}

}
