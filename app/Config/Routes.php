<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('/test', 'Test::index');

// Eto ny routage momba ny prefixe
$routes->get('/prefixe/create', 'PrefixeController::create');
$routes->post('/prefixe/store', 'PrefixeController::store');