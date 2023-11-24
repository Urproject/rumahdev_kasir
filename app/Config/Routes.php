<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// base url (halaman index - login)
$routes->get('/', 'Home::index');

// login, daftar
$routes->get('/login', 'Home::index');
$routes->get('/login/lupa_password', 'Home::lupa_password');
$routes->post('/login/action', 'Home::loginAction');

$routes->get('/logout', 'Home::logout');

$routes->get('/daftar', 'Home::daftar');
$routes->get('/daftar/merchant', 'Home::daftarMerchant');

// merchant/superadmin
$routes->get('/kasir', 'Merchant::index');
$routes->get('/kasir/order', 'Merchant::index');

$routes->get('/kasir/profil/merchant', 'Merchant::profil');
$routes->get('/kasir/profil/user', 'Merchant::profilUser');

$routes->get('/kasir/settings/discount', 'Merchant::settingDiscount');
$routes->get('/kasir/settings/payment', 'Merchant::settingPayment');

$routes->post('/kasir/order/add', 'Merchant::addOrderToDB');

// tabel superadmin 
$routes->get('/kasir/products', 'MerchantProducts::index');
$routes->get('/kasir/products/detail', 'MerchantProducts::detail');
$routes->get('/kasir/products/add', 'MerchantProducts::addProduct');
$routes->post('/kasir/products/action', 'MerchantProducts::addProductAction');

$routes->get('/kasir/products/edit', 'MerchantProducts::editProduct');
$routes->get('/kasir/products/delete', 'MerchantProducts::deleteProduct');

$routes->get('/kasir/users', 'MerchantUsers::index');
$routes->get('/kasir/users/detail', 'MerchantUsers::detail');

$routes->get('/kasir/users/add', 'MerchantUsers::addUser');
$routes->post('/kasir/users/action', 'MerchantUsers::addUserAction');

$routes->get('/kasir/users/edit', 'MerchantUsers::editUser');

$routes->get('/kasir/transactions', 'MerchantTransactions::index');
$routes->get('/kasir/transactions/detail', 'MerchantTransactions::detail');
$routes->get('/kasir/transactions/detail/(:num)', 'MerchantTransactions::detail/$1');
$routes->get('/kasir/transactions/confirm', 'MerchantTransactions::confirm');
