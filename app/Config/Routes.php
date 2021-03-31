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
$routes->setDefaultController('Pages');
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
$routes->get('/', 'Pages::index');
$routes->get('/search', 'Pages::search');
$routes->get('/login', 'Auth::index');
$routes->post('/login', 'Authback::login');
$routes->get('/logout', 'Auth::logout');
$routes->get('/verify', 'Authback::verify');
$routes->get('/s', function () {
	if (!session()->get('user_id')) {
		return redirect()->to('/login');
	}
	return redirect()->to('/search');
});
$routes->get('/u/cart', 'Pages::cart');
$routes->get('/u/detail', 'Pages::profile');
$routes->post('/galery', 'User::galery');
$routes->delete('/galery', 'User::delgalery');
$routes->get('/u/setting', 'User::setting');
$routes->post('/u/setting', 'User::detail');
$routes->post('/hotel/cart', 'Hotel::cart');
$routes->get('/hotel/setcart/(:segment)', 'Hotel::pluscart/$1');
$routes->post('/registrasi', 'Authback::registrasi');
$routes->delete('/cart/delete', 'Hotel::deletecart');
$routes->get('/registrasi', 'Auth::registrasi');
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
