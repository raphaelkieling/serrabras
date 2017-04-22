<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'C_login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['login'] = 'C_login/login';
$route['login/sair'] = 'C_login/sair';

$route['dashboard'] = 'C_dashboard/index';
