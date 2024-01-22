<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Login::index');
$routes->get('/vote', 'Votee::index');
$routes->post('/login', 'Login::login_proses');
$routes->post('/pol', 'Votee::poling');
$routes->get('/selesai', 'Selesai::index');
