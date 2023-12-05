<?php

use CodeIgniter\Router\RouteCollection;


/**
 * @var RouteCollection $routes
 */
// route utama
$routes->get('/', 'Pages::index');
$routes->get('/getdata/(:segment)', 'Pages::Getdata/$1');
$routes->post('/pendaftaran', 'Pendaftaran::pendaftar');

// admin route
$routes->get('/admin', 'Admin\PageAdmin::index');
$routes->get('/admin/table', 'Admin\PageAdmin::table');
$routes->get('/admin/(:segment)', 'Admin\PageAdmin::delete/$1');
$routes->get('/admin/verif/(:segment)', 'Admin\PageAdmin::verif/$1');
