<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/kasir', 'Home::index');
$routes->get('/home', 'Home::index');

$routes->get('/home/dashboard', 'Home::dashboard');
$routes->get('/kasir/dashboard', 'Home::dashboard');