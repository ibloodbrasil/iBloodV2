<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/autenticador', 'Home::autenticador');
$routes->get('/', 'Home::index');
$routes->get('/home', 'Home::index');
$routes->get('/privacy', 'Home::privacy', ['as'=>'privacy']);

// ROTAS RELACIONADAS À LOGIN
$routes->get('login', 'LoginController::loginView');
$routes->post('login', 'LoginController::loginAction', ['filter' => 'throttleauth']);
$routes->get('logout', 'LoginController::logoutAction', ['as'=> 'logout']);
$routes->get('auth/a/show', 'ActionController::show', ['as'=> 'auth-action-show']);
$routes->post('auth/a/handle', 'ActionController::handle', ['as'=> 'auth-action-handle']);
$routes->post('auth/a/verify', 'ActionController::verify', ['as'=> 'auth-action-verify']);
$routes->get('login/magic-link', 'MagicLinkController::loginView',['as' =>'magic-link']);
$routes->post('login/magic-link', 'MagicLinkController::loginAction', ['filter' => 'throttleauth']);
$routes->get('login/verify-magic-link', 'MagicLinkController::verify',['as'=> 'verify-magic-link'], ['filter' => 'throttleauth']);
$routes->get('register', 'RegisterController::registerView'); 
$routes->post('register', 'RegisterController::registerAction', ['filter' => 'throttleauth']);
// ROTAS RELACIONADAS À LOGIN