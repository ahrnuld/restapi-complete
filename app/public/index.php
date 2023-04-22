<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: *");// to display jason data instead of html

error_reporting(E_ALL);
ini_set("display_errors", 1);

require __DIR__ . '/../vendor/autoload.php';

// Create Router instance
$router = new \Bramus\Router\Router();
//TODO Where is the router config? bc here we are using the router everywhere but i dont see a router file

$router->setNamespace('Controllers');

//routes for the products endpoint
$router->get('/products', 'ProductController@getAll');
$router->get('/products/(\d+)', 'ProductController@getById');
$router->post('/products', 'ProductController@addNewProduct');



//routes for the appointments endpoint
$router->get('/appointments', 'AppointmentController@getAll');
$router->get('/appointments/(\d+)', 'AppointmentController@getById');
$router->post('/appointments', 'AppointmentController@addNewAppointment');
$router->put('/appointments/(\d+)', 'AppointmentController@updateAppointment');
$router->delete('/appointments/(\d+)', 'AppointmentController@deleteAppointment');

// routes for the users endpoint
$router->get('/users', 'UserController@getAllUsers');
$router->get('/users/(\d+)', 'UserController@getUserByID');


$router->post('/registerUsers', 'AdminController@registerNewUser');


$router->post('/login', 'UserController@login');

$router->run();