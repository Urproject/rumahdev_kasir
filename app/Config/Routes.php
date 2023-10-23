<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// base url (halaman index - login)
$routes->get('/', 'Home::index');
// $routes->get('/kasir', 'Home::index');
// $routes->get('/home', 'Home::index');

// login, daftar
$routes->get('/login', 'Home::index');
$routes->get('/daftar', 'Home::daftar');
$routes->get('/daftar-next', 'Home::daftar2');

// dashboard kosong (belum menjadi merchant/kasir)
$routes->get('/home/dashboard0', 'Home::dashboard0');
$routes->get('/home/profil0', 'Home::profil0');

// dashboard user superadmin
$routes->get('/merchant/dashboard', 'Merchant::index');
$routes->get('/home/dashboard', 'Merchant::index');
$routes->get('/home/profil', 'Merchant::profil');
$routes->get('/merchant/profil', 'Merchant::profilUser');
$routes->get('/home/confirm', 'Merchant::confirm');
$routes->get('/settings/discount', 'Merchant::settingDiscount');
$routes->get('/settings/payment', 'Merchant::settingPayment');
$routes->get('/home/test', 'Merchant::test');
$routes->get('/home/test2', 'Merchant::test2');
$routes->get('/home/testing', 'Merchant::testing');

// Superadmin 
$routes->get('/home/products', 'MerchantProducts::index');
$routes->get('/home/products/detail', 'MerchantProducts::detail');
$routes->get('/home/products/add', 'MerchantProducts::addProduct');
$routes->get('/home/users', 'MerchantUsers::index');
$routes->get('/home/users/detail', 'MerchantUsers::detail');
$routes->get('/home/users/add', 'MerchantUsers::addUser');
$routes->get('/home/transactions', 'MerchantTransactions::index');
$routes->get('/home/transactions/detail', 'MerchantTransactions::detail');

// dashboard user kasir
$routes->get('/kasir/dashboard', 'Kasir::index');
$routes->get('/home/dashboard2', 'Kasir::index');
