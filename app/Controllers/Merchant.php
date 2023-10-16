<?php

namespace App\Controllers;

class Merchant extends BaseController {

	public function index(): string {
	  return view('merchant/dashboard');
	}

}
