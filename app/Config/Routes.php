<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/login', 'AuthController::index');
$routes->get('/user', 'User::index');
$routes->post('/user/tambah', 'User::tambah');
$routes->post('/user/delete/(:num)', 'User::delete/$1');
$routes->get('/user/editPage/(:num)', 'User::editPage/$1');
$routes->post('/user/edit/(:num)', 'User::edit/$1');
$routes->get('/user/detail/(:num)', 'User::detail/$1');
$routes->post('/login', 'AuthController::loginLogic');
$routes->get('/user/logout', 'User::logoutLogic');