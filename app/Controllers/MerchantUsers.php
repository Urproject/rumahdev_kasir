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
    $merchantId = model('M_Employee')->getMerchantIdByUserId($this->userData['id_user']);
    $user['users'] = $this->userModel->getUsersByMerchant($merchantId);
    $data = [
      'level' => model('M_Employee')->getLevelByUserId($this->userData['id_user']),
      'titleTab' => 'RumahDev Kasir App',
      'titlePage' => 'Data Akun',
      'userData' => $this->userData,
    ];

    echo view('partial/header', $data);
    echo view('partial/top_menu', $data);
    echo view('partial/side_menu');
    echo view('users/index', $user);
    echo view('partial/footer');
  }


  public function detail($id = null) {
    $id = $this->request->getGet('id');
    if ($id === null) {
        return redirect()->to('/error-page');
    }

<<<<<<< HEAD
    $data['user'] = $this->userModel->find($id);
=======
    $user['user'] = $this->userModel ->find($id);
>>>>>>> 8eaa135438bc523dc73b41d4a28073daa67ba8db

    $data = [
      'level' => model('M_Employee')->getLevelByUserId($this->userData['id_user']),
      'titleTab' => 'RumahDev Kasir App',
      'titlePage' => 'Detail Akun',
      'userData' => $this->userData,
    ];

    echo view('partial/header', $data);
    echo view('partial/top_menu', $data);
    echo view('partial/side_menu');
    echo view('users/detail', $user);
    echo view('partial/footer');
  }

  public function addUser() {
    $data = [
      'level' => model('M_Employee')->getLevelByUserId($this->userData['id_user']),
      'titleTab' => 'RumahDev Kasir App',
      'titlePage' => 'Tambah Akun',
      'userData' => $this->userData,
    ];

    echo view('partial/header', $data);
    echo view('partial/top_menu', $data);
    echo view('partial/side_menu');
    echo view('users/add_user');
    echo view('partial/footer');
  }

<<<<<<< HEAD
  public function editUser($id = 1) {
    $id = $this->request->getGet('id');
    if ($id === null) {
        return redirect()->to('/error-page');
    }

    $data['user'] = $this->userModel->find($id);
   
=======
  public function editUser($id = null) {
    $id = $this->request->getGet('id');
    $user['user'] = $this->userModel->find($id);
    $data = [
      'level' => model('M_Employee')->getLevelByUserId($this->userData['id_user']),
      'titleTab' => 'RumahDev Kasir App',
      'titlePage' => 'Edit Akun',
      'userData' => $this->userData,
    ];
>>>>>>> 8eaa135438bc523dc73b41d4a28073daa67ba8db

    echo view('partial/header', $data);
    echo view('partial/top_menu', $data);
    echo view('partial/side_menu');
    echo view('users/edit_user', $user);
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
