<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Login');
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
//login
$routes->get('/ ', 'Login::index');
$routes->post('/login/process', 'Login::process');
$routes->get('/logout', 'Login::logout');
//karyawan
$routes->get('/karyawan', 'Page::index', ['filter' => 'auth']);
$routes->post('/tambah_karyawan', 'Page::tambahkaryawan', ['filter' => 'auth']);
$routes->post('/updatekaryawan/(:num)', 'Page::updatekaryawan/$1', ['filter' => 'auth']);
$routes->get('/editkaryawan/(:num)', 'Page::editkaryawan/$1', ['filter' => 'auth']);
$routes->get('/deletekaryawan/(:num)', 'Page::deletekaryawan/$1', ['filter' => 'auth']);

//jabatan
$routes->get('/jabatan', 'Page::jabatan', ['filter' => 'auth']);
$routes->get('/editjabatan/(:num)', 'Page::editjabatan/$1', ['filter' => 'auth']);
$routes->post('/updatejabatan/(:num)', 'Page::updatejabatan/$1', ['filter' => 'auth']);
$routes->get('/deletejabatan/(:num)', 'Page::deletejabatan/$1', ['filter' => 'auth']);

//absensi
$routes->get('/absensi', 'Page::absensi', ['filter' => 'auth']);
$routes->get('/printgaji/(:num)/(:num)', 'Page::printgaji/$1/$2', ['filter' => 'auth']);
$routes->post('/inputabsen', 'Page::inputabsen', ['filter' => 'auth']);


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
