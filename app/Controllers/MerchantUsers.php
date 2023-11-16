<?php

namespace App\Controllers;

use App\Models\M_user;
use CodeIgniter\Controller;

class MerchantUsers extends BaseController {
  private $userData;
  private $userModel;

  public function __construct() {
    if (empty(session()->get('username'))) {
      session()->setFlashdata('gagal', 'Anda belum login');
      return redirect()->to(base_url('login'));
    }
    $this->fetchUserData();

    // Load the M_User model
    $this->userModel = model('M_User');
  }

  private function fetchUserData() {
    $this->userData = [
      'username' => session()->get('username'),
      'nama' => session()->get('nama'),
      'email' => session()->get('email'),
      'foto' => session()->get('foto'),
      'id_user' => session()->get('id_user'),
      // Add other user data as needed
    ];
  }

  public function index() {
    // Get the merchant ID for the active user from the Employee model
    $merchantId = model('M_Employee')->getMerchantIdByUserId($this->userData['id_user']);

    // Fetch users based on the merchant ID
    $data['users'] = $this->userModel->getUsersByMerchant($merchantId);

    $header['titleTab'] = 'RumahDev Kasir App';
    $header2['titlePage'] = 'Data Akun';
    $topMenuData = array_merge($header2, ['userData' => $this->userData]);

    echo view('partial/header', $header);
    echo view('partial/top_menu', $topMenuData);
    echo view('partial/side_menu');
    echo view('users/index', $data);
    echo view('partial/footer');
  }


  public function detail($id = 1) {
    $id = $this->request->getGet('id');
    if ($id === null) {
        return redirect()->to('/error-page');
    }

    $data['user'] = $this->userModel->find($id);

    $header['titleTab'] = 'RumahDev Kasir App';
    $header2['titlePage'] = 'Detail Akun';
    $topMenuData = array_merge($header2, ['userData' => $this->userData]);

    echo view('partial/header', $header);
    echo view('partial/top_menu', $topMenuData);
    echo view('partial/side_menu');
    echo view('users/detail', $data);
    echo view('partial/footer');
  }

  public function addUser() {
    $header['titleTab'] = 'RumahDev Kasir App';
    $header2['titlePage'] = 'Tambah Akun';
    $topMenuData = array_merge($header2, ['userData' => $this->userData]);

    echo view('partial/header', $header);
    echo view('partial/top_menu', $topMenuData);
    echo view('partial/side_menu');
    echo view('users/add_user');
    echo view('partial/footer');
  }

  public function editUser($id = 1) {
    $id = $this->request->getGet('id');
    if ($id === null) {
        return redirect()->to('/error-page');
    }

    $data['user'] = $this->userModel->find($id);
   

    $header['titleTab'] = 'RumahDev Kasir App';
    $header2['titlePage'] = 'Edit Akun';
    $topMenuData = array_merge($header2, ['userData' => $this->userData]);

    echo view('partial/header', $header);
    echo view('partial/top_menu', $topMenuData);
    echo view('partial/side_menu');
    echo view('users/edit_user', $data);
    echo view('partial/footer');
  }


  public function addUserAction() {
    $nama = $this->request->getPost('nama');
    $username = $this->request->getPost('username');
    $password = $this->request->getPost('password');
    $merchantId = model('M_Employee')->getMerchantIdByUserId($this->userData['id_user']);

    $userData = [
      'nama' => $nama,
      'username' => $username,
      'password' => $password,
      'email' => '',
      'no_hp' => '',
      'gender' => '',
      'alamat' => '',
      'foto' => '',
      'google_id' => ''
    ];

    $userId = $this->userModel->insert($userData);

    $employeeData = [
      'id_user' => $userId,
      'id_merchant' => $merchantId,
      'level' => 2
    ];

    model('M_Employee')->insert($employeeData);
    return redirect()->to('kasir/users');
  }

}
