<?php

namespace App\Controllers;

class Home extends BaseController {

	public function index(): string {
	  return view('login');
	}

	public function daftar(): string {
	  return view('daftar');
	}

	public function daftar2(): string {
	  return view('daftar2');
	}

	public function dashboard(): string {
	  return view('dashboard/dashboard');
	}

}
