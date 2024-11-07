<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->match(['get','post'], 'registerform', 'user::index');

$routes->get('login', 'user::loginpage');
$routes->match(['get','post'], 'loginvalidate', 'user::userlogin');
$routes->get('blogpage', 'user::blogpage');
$routes->post('blogpost', 'user::blogpost');



