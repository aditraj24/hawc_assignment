<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Routes\RouteCollection;

$routes = service('routes');

// Apply CORS filter to all API routes
$filters = \Config\Filters::$methods;
if (!isset($filters['api'])) {
    $filters['api'] = [];
}
if (!in_array('cors', $filters['api'])) {
    $filters['api'][] = 'cors';
}

// Health check
$routes->get('/api/health', 'Home::health');
$routes->get('/api', 'Home::index');

// Users API with CORS filter
$routes->group('api', ['namespace' => 'App\Controllers', 'filter' => 'cors'], function ($routes) {
    // Users endpoints
    $routes->get('users', 'Users::index');
    $routes->get('users/(:num)', 'Users::show/$1');
    $routes->post('users', 'Users::create');
    $routes->put('users/(:num)', 'Users::update/$1');
    $routes->delete('users/(:num)', 'Users::delete/$1');
});

// Catch-all route
$routes->get('/', 'Home::index');
