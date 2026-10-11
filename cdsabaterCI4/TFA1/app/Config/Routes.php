<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Pages::index');
$routes->get('about', 'Pages::about');
$routes->get('customers', 'Customers::index');
$routes->match(['get', 'post'], 'customers/new', 'Customers::new');
$routes->match(['get', 'post'], 'customers/(:num)/edit', 'Customers::edit/$1');
$routes->get('users', 'Users::index');
$routes->match(['get', 'post'], 'users/new', 'Users::new');
$routes->match(['get', 'post'], 'users/(:num)/edit', 'Users::edit/$1');
