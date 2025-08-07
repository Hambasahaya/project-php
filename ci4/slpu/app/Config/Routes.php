<?php

namespace Config;

use CodeIgniter\Router\RouteCollection;

$routes = Services::routes();

if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Beranda');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Beranda::index');

$routes->get('ketentuan', 'Home\Ketentuan::index');
$routes->get('kebijakan', 'Home\Kebijakan::index');

$routes->get('homepage', 'User\Homepage::index', ['filter' => 'login']);
$routes->get('createnew', 'User\Createnew::index', ['filter' => 'login']);
$routes->get('profile', 'User\Profile::index', ['filter' => 'login']);
$routes->get('myurl', 'User\MyUrl::index', ['filter' => 'login']);
$routes->post('profile/resetPassword', 'User\Profile::resetPassword', ['filter' => 'login']);

$routes->get('dashboard', 'Admin\Dashboard::index');
$routes->get('datausers', 'Admin\DataUsers::index');
$routes->get('linkshistory', 'Admin\LinksHistory::index');

$routes->get('/s/(:any)', 'Shortener::redirect/$1');
$routes->post('shortener/decrypt', 'Shortener::decrypt');
