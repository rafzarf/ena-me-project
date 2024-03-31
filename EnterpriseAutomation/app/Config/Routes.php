<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Dashboard::index');
<<<<<<< Updated upstream
$routes->get('/', 'Dashboard::index');
=======
$routes->get('/', 'Dashboard::index');
$routes->get('proses/(:any)', 'proses::index/$1');
$routes->get('order/(:any)', 'order::index/$1');
>>>>>>> Stashed changes
