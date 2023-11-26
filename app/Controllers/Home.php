<?php

namespace App\Controllers;

use App\Models\M_user;
use App\Models\M_Merchant;
use App\Models\M_Employee;
use App\Models\M_MerchantPayment;
use CodeIgniter\Controller;


class Home extends BaseController {

  public function daftar() {
    $data = [
      'titleTab' => 'RumahDev Kasir App',
      'titlePage' => 'RumahDev - Daftar Akun',
    ];

    echo view('partial/header', $data);
    echo view('daftar', $data);
    echo view('partial/footer');
  }

  public function daftarMerchant() {
    // session()->remove('temp_user_data');
    // Retrieve user data from the session
    $userData = session()->get('temp_user_data');

    // Check if user data is available
    if (!$userData) {
      // Redirect to the first step if user data is not available
      return redirect()->to('/daftar');
    }

    $data = [
      'titleTab' => 'RumahDev Kasir App',
      'titlePage' => 'Profil Merchant',
      // Pass the user data to the view
      'userData' => $userData,
    ];

    echo view('partial/header', $data);
    echo view('daftar_merchant', $data);
    echo view('partial/footer');
  }

  // Handle the form submission for both steps
  public function daftarAction() {
    // Load necessary models
    $mUser = new M_User();
    $mMerchant = new M_Merchant();
    $mEmployee = new M_Employee();
    $mPayment = new M_MerchantPayment();

    // Retrieve user data from the session
    $userData = session()->get('temp_user_data') ?? [];

    $password = $this->request->getPost('password');
    $password2 = $this->request->getPost('password2');

    // Check if the form data is from the first or second step
    if ($this->request->getPost('step') == 1) {
      // First step - user data
      $userData = [
        'nama' => $this->request->getPost('nama'),
        'username' => $this->request->getPost('username'),
        'email' => $this->request->getPost('email'),
        'password' => $password,
        'gender' => $this->request->getPost('gender'),
        'alamat' => $this->request->getPost('alamat'),
      ];

      // Store user data in the session
      session()->set('temp_user_data', $userData);

      // Redirect to the second step
      return redirect()->to('/daftar/merchant');
    } elseif ($this->request->getPost('step') == 2) {
      // Second step - merchant and user data
      // Retrieve user data from the session
      $userData = session()->get('temp_user_data');

      // Check if user data is available
      if (!$userData) {
        // Redirect to the first step if user data is not available
        return redirect()->to('/daftar');
      }

      // Retrieve merchant data from the second page form
      $merchantData = [
        'nama_usaha' => $this->request->getPost('nama_usaha'),
        'jenis_usaha' => $this->request->getPost('jenis_usaha'),
        'no_telepon' => $this->request->getPost('no_telepon'),
        'alamat' => $this->request->getPost('alamat_usaha'),
        'no_izin' => $this->request->getPost('no_izin'),
        'no_npwp' => $this->request->getPost('no_npwp'),
        'no_ktp' => $this->request->getPost('no_ktp'),
        'diskon' => 0,
        'pajak' => 0,
      ];

	    $file = $this->request->getFile('file_izin');
	    if ($file && $file->isValid() && !$file->hasMoved()) {
	      $newName = 'file_izin-' . date('dmY-His') . '.' . $file->getClientExtension();
	      $file->move(ROOTPATH . 'public/assets/images/merchant/', $newName);
	      $merchantData['file_izin'] = $newName;
	    }

	    $file2 = $this->request->getFile('file_npwp');
	    if ($file2 && $file2->isValid() && !$file2->hasMoved()) {
	      $newName2 = 'file_npwp-' . date('dmY-His') . '.' . $file2->getClientExtension();
	      $file2->move(ROOTPATH . 'public/assets/images/merchant/', $newName2);
	      $merchantData['file_npwp'] = $newName2;
	    }

	    $file3 = $this->request->getFile('file_ktp');
	    if ($file3 && $file3->isValid() && !$file3->hasMoved()) {
	      $newName3 = 'file_ktp-' . date('dmY-His') . '.' . $file3->getClientExtension();
	      $file3->move(ROOTPATH . 'public/assets/images/merchant/', $newName3);
	      $merchantData['file_ktp'] = $newName3;
	    }

      // Begin a transaction to ensure data consistency
      $db = \Config\Database::connect();
      $db->transBegin();

      try {
        // Insert user data into the 'user' table
        $userId = $mUser->insert($userData);

        // Insert merchant data into the 'merchant' table
        $merchantData['id_user'] = $userId; // Assign the user ID to the merchant data
        $merchantId = $mMerchant->insert($merchantData);

        // Insert data into the 'merchant_employee' table
        $employeeData = [
          'id_user' => $userId,
          'id_merchant' => $merchantId,
          'level' => 1, 
        ];
        $mEmployee->insert($employeeData);

        // Insert data into the 'merchant_payment' table (multiple rows)
        $paymentData = [
          [
            'id_merchant' => $merchantId,
            'id_method' => 1, // cash
            'data' => 1,
          ],
          [
            'id_merchant' => $merchantId,
            'id_method' => 2, // transfer
            'data' => 0,
          ],
          [
            'id_merchant' => $merchantId,
            'id_method' => 3, // qris
            'data' => 0,
          ],
          [
            'id_merchant' => $merchantId,
            'id_method' => 4, //virtual account
            'data' => 0,
          ],
        ];
        $mPayment->insertBatch($paymentData);





        $db->transCommit();
        session()->remove('temp_user_data');

        // return redirect()->to('/success-page');
    		return redirect()->to(base_url('login'))->with('success', 'Berhasil mendaftarkan akun, silahkan login');
      } catch (\Exception $e) {
        $db->transRollback();
        // Handle the error (e.g., log it or show a user-friendly message)
        return redirect()->to('/error-page');
      }
    }
  }

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

	public function lupa_password(): string {
		return view('lupa_password');
	}

}
