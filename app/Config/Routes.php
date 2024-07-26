<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Users::index');
$routes->get('/pengeluaran', 'Users::pengeluaran');
 $routes->post('/save_pemasukan', 'Users::save_pemasukan');
 $routes->post('/save_pengeluaran', 'Users::save_pengeluaran');
 $routes->get('/mysaldo', 'Users::mysaldo');
 

