<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('/test', 'Test::index');


$routes->group('', function ($routes) {

    // Login
    $routes->get('/login', 'AuthController::index');

    $routes->post('/login', 'AuthController::login');


    // Dashboard
    $routes->get('/dashboard', 'DashboardController::index');

    // Dépôt
    $routes->get('/depot', 'DepotController::index');
    $routes->post('/depot/effectuer', 'DepotController::effectuer');

    $routes->get(
        '/transfert',
        'TransfertController::index'
    );


    $routes->post(
        '/transfert/effectuer',
        'TransfertController::effectuer'
    );

    // Retrait

    $routes->get(
        '/retrait',
        'RetraitController::index'
    );


    $routes->post(
        '/retrait/effectuer',
        'RetraitController::effectuer'
    );

    // Logout
    $routes->get('/logout', 'AuthController::logout');
});
// Eto ny routage momba ny prefixe
$routes->get('/prefixe/create', 'PrefixeController::create');
$routes->post('/prefixe/store', 'PrefixeController::store');
$routes->get('/prefixes', 'PrefixeController::index');

// Eto ny routage momba ny frais sy tranche
$routes->get('/frais', 'FraisController::index');