<?php namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Router\RouteCollection;
use Config\Services;

$routes = Services::routes();

// Cargar rutas del sistema
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/**
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
$routes->get('tasks/search', 'Tasks::search');
$routes->get('tasks', 'Tasks::index');

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// Default routes
$routes->get('/', 'Home::index');
$routes->get('/signup', 'Signup::new', ['filter' => 'guest']);
$routes->get('/login', 'Login::new', ['filter' => 'guest']);
$routes->get('/logout', 'Login::delete');


// ✅ Rutas para Profileimage
// GET -> muestra la vista de confirmación (delete.php)
$routes->get('profileimage/delete', 'Profileimage::confirmDelete');
// POST -> ejecuta la acción real de eliminación
$routes->post('profileimage/delete', 'Profileimage::delete');

// ✅ Rutas para Profile
$routes->get('profile/show', 'Profile::show');
$routes->get('profile/edit', 'Profile::edit');
$routes->post('profile/update', 'Profile::update');

/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
