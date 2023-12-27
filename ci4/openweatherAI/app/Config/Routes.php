<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->post('/getzonawaktu', 'Home::getZonaWaktu');
$routes->get('/testing', 'Ai::testing');

// login register routing
$routes->get('/login', 'LoginRegister::pagelogin');
$routes->get('/register', 'LoginRegister::pageregister');

$routes->get("/googleapi", "Googleclient::login_proses");
