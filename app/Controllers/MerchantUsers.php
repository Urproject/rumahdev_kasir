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
    echo view('partial/side_menu', $data);
    echo view('users/index', $user);
    echo view('partial/footer');
  }


  public function detail($id = null) {
    $id = $this->request->getGet('id');
    if ($id === null) {
        return redirect()->to('/error-page');
    }

    $user['user'] = $this->userModel ->find($id);

    $data = [
      'level' => model('M_Employee')->getLevelByUserId($this->userData['id_user']),
      'titleTab' => 'RumahDev Kasir App',
      'titlePage' => 'Detail Akun',
      'userData' => $this->userData,
    ];

    echo view('partial/header', $data);
    echo view('partial/top_menu', $data);
    echo view('partial/side_menu', $data);
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
    echo view('partial/side_menu', $data);
    echo view('users/add_user');
    echo view('partial/footer');
  }

  public function editUser($id = null) {
    $id = $this->request->getGet('id');
    $user['user'] = $this->userModel->find($id);
    $data = [
      'level' => model('M_Employee')->getLevelByUserId($this->userData['id_user']),
      'titleTab' => 'RumahDev Kasir App',
      'titlePage' => 'Edit Akun',
      'userData' => $this->userData,
    ];

    echo view('partial/header', $data);
    echo view('partial/top_menu', $data);
    echo view('partial/side_menu', $data);
    echo view('users/edit_user', $user);
    echo view('partial/footer');
  }

  public function addUserAction() {
    $username = $this->request->getPost('username');
    if ($this->userModel->isUsernameExists($username)) {
      session()->setFlashdata('failed', 'Gagal menambahkan. Username sudah digunakan.');
      return redirect()->to('kasir/users');
    }

    $userData = [
      'nama' => $this->request->getPost('nama'),
      'username' => $username,
      'password' => $this->request->getPost('password'),
      'email' => '',
      'gender' => '',
      'alamat' => '',
      'google_id' => ''
    ];

    $file = $this->request->getFile('foto_profil');
    if ($file && $file->isValid() && !$file->hasMoved()) {
      $newName = 'u-' . date('dmY-His') . '.' . $file->getClientExtension();
      $file->move(ROOTPATH . 'public/assets/images/user/', $newName);
      $userData['foto'] = $newName;
    }

    $merchantId = model('M_Employee')->getMerchantIdByUserId($this->userData['id_user']);
    $employeeCount = model('M_Employee')->countEmployeesByMerchantId($merchantId, 2); 

    if ($employeeCount >= 3) {
      session()->setFlashdata('failed', 'Gagal menambahkan. Sudah mencapai batas maksimum akun.');
      return redirect()->to('kasir/users');
    }

    $userId = $this->userModel->insert($userData);

    $employeeData = [
      'id_user' => $userId,
      'id_merchant' => $merchantId,
      'level' => 2
    ];

    model('M_Employee')->insert($employeeData);
    session()->setFlashdata('success', 'Berhasil menambahkan akun');
    return redirect()->to('kasir/users');
  }

  public function editUserAction() {
    $model = new M_user();

    if ($this->request->getMethod() !== 'post') {
      return redirect()->to('kasir/user');
    }

    $userId = $this->request->getPost('id_user');

    $userData = [
      'nama' => $this->request->getPost('nama'),
      'username' => $this->request->getPost('username'),
      'password' => $this->request->getPost('password'),
    ];

    $file = $this->request->getFile('foto');
    if ($file && $file->isValid() && !$file->hasMoved()) {
      $newName = 'u-' . date('dmY-His') . '.' . $file->getClientExtension();
      $file->move(ROOTPATH . 'public/assets/images/user/', $newName);
      $userData['foto'] = $newName;
    }
    
    $this->userModel->set($userData)->where('id_user', $userId)->update();

    session()->setFlashdata('success', 'Berhasil mengubah data akun');
    return redirect()->to('kasir/users');
  }


}
