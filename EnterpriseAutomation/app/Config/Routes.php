<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Dashboard::index');
$routes->get('proses/(:any)', 'proses::index/$1');
$routes->get('order/(:any)', 'order::index/$1');
$routes->get('deliverOrder/(:any)/(:any)', 'deliverOrder::index/$1/$2');
$routes->get('permesinan/(:segment)', 'permesinan::listspk/$1');
$routes->get('permesinan/(:segment)/(:segment)', 'permesinan::operator/$1/$2');
