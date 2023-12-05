<?php

use CodeIgniter\Router\RouteCollection;
use App\Controllers\Login\Login;
use App\Controllers\Admin;
use App\Controllers;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/login', [Login::class, 'index']);
$routes->get('/logout', 'Login\Login::Logout');
$routes->get('/proses', [Login::class, 'login_proses']);
$routes->post('/proses', [Login::class, 'loginform']);

// admin Routes
$routes->get('/admin', 'Admin\Admin::index');
$routes->get('/admin/tambahdata', 'Admin\Admin::tambah_data');
$routes->post('/admin/prosestempat', 'Admin\Admin::add_data');


//cart route
$routes->post('/add_cart', 'Carts::cart_add');
$routes->get('/add_cart', 'Carts::cart_add');
$routes->post('/hapuscart', 'Carts::delete_cart');
$routes->get('/cart_page', 'Carts::index');

// chekout route
$routes->get('/pagechk', 'Chekout::index');
$routes->post('/checkout', 'Chekout::getCheckoutData');
$routes->get('/prov', 'Chekout::getProvincedata');
$routes->post('/getcity', 'Chekout::getCities');
$routes->post('/psck', 'Chekout::getchk');

//single page
$routes->get('/singgle_page/(:num)', 'Singgle::index/$1');

// user routes
$routes->get('/user', 'User::index');
$routes->post('/update_user', 'User::user_settings');

// order list route
$routes->get("/order", "OrderList::index");
$routes->get("/detail_tr/(:num)", "OrderList::detail_order/$1");
