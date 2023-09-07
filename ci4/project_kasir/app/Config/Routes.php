<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
// login routes
$routes->get('/', 'Login::index');
$routes->post('/login', 'Login::userlog');
//Route Admin 
$routes->get('/Admin', 'Admin::index', ['filter' => 'cek_login']);
$routes->get('/Admin/Karyawan', 'Admin::Karyawan', ['filter' => 'cek_login']);
// delete data karyawan
$routes->delete("/Admin/(:num)", 'Admin::Hapus/$1');
// tambah
$routes->post("/Admin/addKaryawan", "Admin::tambahdata");
// edit
$routes->post("/Admin/update/(:num)", "Admin::update/$1");
$routes->get("/Admin/edit/(:segment)", "Admin::edit/$1");
//produk
$routes->get("Admin/Produk", "Admin::Produk");
$routes->post("/Admin/addprd", "Admin::addprd");
$routes->delete("/Admin/prd/(:num)", "Admin::del/$1");
// edit
$routes->get("/Admin/editprd/(:num)", "Admin::updateprd/$1");
$routes->post("/Admin/updateprd/(:segment)", "Admin::editprd/$1");

// end Route admin
// forget password
$routes->post("/Login/fr", "Login::forgot");
$routes->get("/Updatepw", "Login::Newpw");
$routes->post("/newpw/(:num)", "Login::pw/$1");
//log out 
$routes->get('/logOut', 'Login::Out');
//cetak
$routes->get("/Admin/cetakprd", "Admin::cetakprdview");
$routes->get("/Admin/endcetak", "Admin::cetakPrd");
// routes kasir
$routes->get("/Kasir", "kasir::index");
$routes->post("/Kasir/aksi", "Kasir::pesananin");
$routes->post("/kasir/clear", "kasir::clear");
$routes->post("kasir/delete", "kasir::hapus");
$routes->post("/kasir/end", "kasir::end");



/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
