<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Dashboard::index');
$routes->get('/', 'Dashboard::index');
$routes->get('proses/(:any)', 'proses::index/$1');