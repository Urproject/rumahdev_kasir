<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index');
$routes->get('/login', 'Home::index');
$routes->get('/daftar', 'Home::daftar');
$routes->get('/daftar/merchant', 'Home::daftarMerchant');
$routes->get('/login/lupa_password', 'Home::lupa_password');
$routes->get('/logout', 'Home::logout');

$routes->post('/login/action', 'Home::loginAction');
$routes->post('/daftar/action', 'Home::daftarAction');

$routes->get('/kasir', 'Merchant::index');
$routes->get('/kasir/order', 'Merchant::index');
$routes->get('/kasir/profil/merchant', 'Merchant::profil');
$routes->get('/kasir/profil/user', 'Merchant::profilUser');
$routes->get('/kasir/settings', 'Merchant::settings');
$routes->get('/kasir/settings/payment', 'Merchant::settingPayment');

$routes->post('/kasir/settings/save', 'Merchant::saveSettings');
$routes->post('/kasir/settings/save_payment', 'Merchant::saveSettingPayment');
$routes->post('/kasir/order/add', 'Merchant::addOrderToDB');

$routes->get('/kasir/products', 'MerchantProducts::index');
$routes->get('/kasir/products/detail', 'MerchantProducts::detail');
$routes->get('/kasir/products/add', 'MerchantProducts::addProduct');
$routes->get('/kasir/products/edit', 'MerchantProducts::editProduct');
$routes->get('/kasir/products/delete', 'MerchantProducts::deleteProduct');
$routes->post('/kasir/products/action', 'MerchantProducts::addProductAction');

$routes->get('/kasir/users', 'MerchantUsers::index');
$routes->get('/kasir/users/detail', 'MerchantUsers::detail');
$routes->get('/kasir/users/add', 'MerchantUsers::addUser');
$routes->get('/kasir/users/edit', 'MerchantUsers::editUser');
$routes->post('/kasir/users/action', 'MerchantUsers::addUserAction');
$routes->post('/kasir/users/editAction', 'MerchantUsers::editUserAction');

$routes->get('/kasir/transactions', 'MerchantTransactions::index');
$routes->get('/kasir/transactions/detail', 'MerchantTransactions::detail');
$routes->get('/kasir/transactions/detail/(:num)', 'MerchantTransactions::detail/$1');
$routes->get('/kasir/transactions/confirm', 'MerchantTransactions::confirm');
$routes->get('/kasir/transactions/edit', 'MerchantTransactions::editOrder');
$routes->post('/kasir/transactions/add', 'MerchantTransactions::confirmAction');