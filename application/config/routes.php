<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$route['default_controller'] = "users";
$route['404_override'] = '';

//USERS CONTROLLER
$route['login'] = "users/login";
$route['logout'] = "users/logout";
$route['profile'] = "users/profile";
$route['register'] = "users/register";

//POKES CONTROLLER
$route['pokeUser'] = "pokes/pokeUser";

//end of routes.php