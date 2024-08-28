<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index');
$routes->get('aboutus', 'Home::about');
$routes->get('postblogpg', 'Home::postblogpg');
$routes->match(['get', 'post'], '/register', 'User::register');
$routes->match(['get', 'post'], '/login', 'User::login');
$routes->get('/logout', 'User::logout');


$routes->get('hor', 'Home::hor');
$routes->post('hor/getHorConstituencies', 'Home::getHorConstituencies');
$routes->post('hor/submitHor', 'Home::submitHor');

$routes->match(['get', 'post'], 'resultpop', 'Home::resultpop');

$routes->get('subsenate', 'Home::subsenate');
$routes->post('subsenate/getSenatorialDistrict', 'Home::getSenatorialDistrict');
$routes->post('subsenate/submitSenate', 'Home::submitSenate');


$routes->get('/adminapprovalpg', 'Admin::adminapprovalpg');

$routes->get('/blog', 'Post::index');

$routes->get('/forgotpasword', 'User::forgotpasword');


$routes->get('/post', 'Post::index');

$routes->get('/managePost', 'Post::managePost');

// $routes->get('register', function () {
//     return view('register');
// });


$routes->get('/profile/(:num)/', 'User::profile/$1');
$routes->get('/post/changeStatus/(:num)/(:num)', 'User::changeStatus/$1/$2');
$routes->post('/profileUpdate/(:num)', 'User::profileUpdate/$1');

$routes->get('/post/view/(:num)', 'Post::view/$1');


$routes->post('/post/create', 'Post::create');
$routes->get('/post/getPost/(:num)', 'Post::getPost/$1');
$routes->post('/post/saveEdit', 'Post::edit');
$routes->get('/post/delete/(:num)', 'Post::delete/$1');
$routes->post('/post/deleteMultiPost', 'Post::deleteMultiPost');


$routes->post('/comment/add/(:num)', 'Comment::add/$1');
