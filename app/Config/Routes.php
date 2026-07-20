<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('/test', 'Test::index');

$routes->group('', function($routes){

    // Affichage page login
    $routes->get('/login', 'AuthController::index');


    // Traitement login
    $routes->post('/login', 'AuthController::login');


    // Déconnexion
    $routes->get('/logout', 'AuthController::logout');

});