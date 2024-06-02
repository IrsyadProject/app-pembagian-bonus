<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['default_controller'] = 'auth/login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['login'] = 'auth/login';
$route['register'] = 'auth/register';
$route['logout'] = 'auth/logout';
$route['dashboard'] = 'dashboard/index';
$route['bonus'] = 'bonus/index';
$route['tambah-bonus'] = 'bonus/create';
$route['simpan-bonus'] = 'bonus/store';
$route['bonus/view/(:any)'] = 'bonus/view/$1';
$route['bonus/update/(:any)'] = 'bonus/update/$1';
$route['hapusbonus/(:any)'] = 'bonus/delete/$1';
$route['edit-bonus/(:any)'] = 'bonus/edit/$1';
