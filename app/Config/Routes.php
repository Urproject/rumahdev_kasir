<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// base url (halaman index - login)
$routes->get('/', 'Home::index');

// login, daftar
$routes->get('/login', 'Home::index');
$routes->get('/daftar', 'Home::daftar');
$routes->get('/daftar/akun', 'Home::daftarAkun');
$routes->get('/daftar/merchant', 'Home::daftarMerchant');

// dashboard kosong (belum menjadi merchant/kasir)
$routes->get('/home/dashboard0', 'Home::dashboard0');
$routes->get('/home/profil0', 'Home::profil0');

// merchant/superadmin
$routes->get('/kasir', 'Merchant::index');
$routes->get('/kasir/order', 'Merchant::index');
$routes->get('/kasir/confirm', 'Merchant::confirm');

$routes->get('/kasir/profil/merchant', 'Merchant::profil');
$routes->get('/kasir/profil/user', 'Merchant::profilUser');

$routes->get('/kasir/settings/discount', 'Merchant::settingDiscount');
$routes->get('/kasir/settings/payment', 'Merchant::settingPayment');

$routes->get('/kasir/test', 'Merchant::test');
$routes->get('/kasir/test2', 'Merchant::test2');
$routes->get('/kasir/testing', 'Merchant::testing');

// tabel superadmin 
$routes->get('/kasir/products', 'MerchantProducts::index');
$routes->get('/kasir/products/detail', 'MerchantProducts::detail');
$routes->get('/kasir/products/add', 'MerchantProducts::addProduct');
$routes->get('/kasir/products/edit', 'MerchantProducts::editProduct');

$routes->get('/kasir/users', 'MerchantUsers::index');
$routes->get('/kasir/users/detail', 'MerchantUsers::detail');
$routes->get('/kasir/users/add', 'MerchantUsers::addUser');
$routes->get('/kasir/users/edit', 'MerchantUsers::editUser');

$routes->get('/kasir/transactions', 'MerchantTransactions::index');
$routes->get('/kasir/transactions/detail', 'MerchantTransactions::detail');

// dashboard user kasir
$routes->get('/kasir/dashboard', 'Kasir::index');
