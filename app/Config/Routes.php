<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

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
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');

$routes->get('/obat', 'ObatController::index');
$routes->get('/obat/tambah', 'ObatController::tambah');
$routes->post('/obat/save', 'ObatController::save');

$routes->get('/obat/jenisdansatuan', 'JenisDanSatuan::index');

$routes->get('/penerimaan', 'PenerimaanController::index');
$routes->get('/penerimaan/(:num)', 'PenerimaanController::detail/$1');
$routes->get('/transaksi/penerimaan', 'PenerimaanController::create');
$routes->post('/transaksi/penerimaan', 'PenerimaanController::save');

$routes->get('/pemesanan', 'PemesananController::index');
$routes->get('/transaksi/pemesanan', 'PemesananController::create');
$routes->post('/transaksi/pemesanan', 'PemesananController::save');
$routes->get('/transaksi/pemesanan/generate/(:num)', 'PemesananController::generatePdf/$1');

$routes->get('/pengeluaran', 'PengeluaranController::index');
$routes->get('/pengeluaran/(:num)', 'PengeluaranController::detail/$1');
$routes->get('/transaksi/pengeluaran', 'PengeluaranController::create');
$routes->post('/transaksi/pengeluaran', 'PengeluaranController::save');

$routes->get('/perubahan', 'PerubahanLokasiController::index');
$routes->get('/transaksi/perubahan', 'PerubahanLokasiController::create');
$routes->post('/transaksi/perubahan', 'PerubahanLokasiController::save');

$routes->get('/persediaan', 'PersediaanController::index');
$routes->get('/persediaan/(:alpha)', 'PersediaanController::index/$1');
$routes->get('/persediaan/(:num)', 'PersediaanController::detail/$1');
// For Fetch Javascript
$routes->get('/persediaan/stok/(:num)', 'PersediaanController::stok/$1');

$routes->get('/ketenagaan', 'KetenagaanController::index');
$routes->get('/ketenagaan/tambah', 'KetenagaanController::tambah');
$routes->post('/ketenagaan/save', 'KetenagaanController::save');

// test
// $routes->get('testing', 'Testing::index'); 


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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
