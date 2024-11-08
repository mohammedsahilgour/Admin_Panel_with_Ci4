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
// $routes->post('blogpost', 'user::blogpost');
$routes->match(['get','post'], 'blogpost', 'user::blogpost');


$routes->get('userblogs', 'user::userblogs');
$routes->match(['get','post'], 'editblog', 'user::editblog');

$routes->match(['get','post'], 'updateblog', 'user::updateblog');
$routes->match(['get','post'], 'deleteblog', 'user::deleteblog');
$routes->match(['get','post'], 'usersection', 'user::usersection');

$routes->match(['get','post'], 'edituser', 'user::edituser');
$routes->match(['get','post'], 'updateuserdata', 'user::updateuserdata');
$routes->match(['get','post'], 'deleteuser', 'user::deleteuser');



