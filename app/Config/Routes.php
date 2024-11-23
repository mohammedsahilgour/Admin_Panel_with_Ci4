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
$routes->match(['get','post'], 'insertblogpost', 'user::insertblogpost');
$routes->match(['get','post'], 'blogpost', 'user::blogpage');



$routes->get('userblogs', 'user::userblogs');
$routes->match(['get','post'], 'editblog', 'user::editblog');

$routes->match(['get','post'], 'updateblog', 'user::updateblog');
$routes->match(['get','post'], 'deleteblog', 'user::deleteblog');
$routes->match(['get','post'], 'usersection', 'user::usersection');

$routes->match(['get','post'], 'edituser', 'user::edituser');
$routes->match(['get','post'], 'updateuserdata', 'user::updateuserdata');
$routes->match(['get','post'], 'deleteuser', 'user::deleteuser');
$routes->match(['get','post'], 'myprofile', 'user::myprofile');
$routes->match(['get','post'], 'updatemyprofile', 'user::updatemyprofile');
$routes->match(['get','post'], 'companysection', 'user::companysection');
$routes->match(['get','post'], 'companydataupdate', 'user::companydataupdate');
$routes->match(['get','post'], 'insertpagesdata', 'user::insertpagesdata');
$routes->match(['get','post'], 'newspost', 'user::newspost');
$routes->match(['get','post'], 'pagesform', 'user::pagesform');
$routes->match(['get','post'], 'pagetable', 'user::pagetable');
$routes->match(['get','post'], 'editpage', 'user::editpage');
$routes->match(['get','post'], 'updatepagedata', 'user::updatepagedata');
$routes->match(['get','post'], 'deletepagedata', 'user::deletepagedata');
$routes->match(['get','post'], 'newssave', 'user::newssave');
$routes->match(['get','post'], 'newstable', 'user::newstable');
$routes->match(['get','post'], 'editnews', 'user::editnews');
$routes->match(['get','post'], 'updatenews', 'user::updatenews');
$routes->match(['get','post'], 'deletenews', 'user::deletenews');
$routes->match(['get','post'], 'menusection', 'user::menusection');
$routes->match(['get','post'], 'savemenu', 'user::savemenu');
$routes->match(['get','post'], 'menulist', 'user::menulist');
$routes->match(['get','post'], 'editmenu', 'user::editmenu');
$routes->match(['get','post'], 'updatemenu', 'user::updatemenu');
$routes->match(['get','post'], 'deletemenudata', 'user::deletemenudata');
$routes->match(['get','post'], 'menubar', 'user::menubar');
$routes->match(['get','post'], 'savejsonoutput', 'user::savejsonoutput');
$routes->match(['get','post'], 'savesidebarmenu', 'user::savesidebarmenu');




// website controller 
$routes->match(['get','post'], 'blogs', 'website_cont::blogs');
$routes->match(['get','post'], 'contactus', 'website_cont::contactus');













