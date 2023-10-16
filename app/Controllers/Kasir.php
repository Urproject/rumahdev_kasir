<?php

namespace App\Controllers;

class Kasir extends BaseController {

	public function index(): string {
	  return view('kasir/dashboard');
	}

}
