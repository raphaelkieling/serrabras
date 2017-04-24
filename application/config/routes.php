<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'C_login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['login'] = 'C_login/login';
$route['login/sair'] = 'C_login/sair';

$route['usuarios'] = 'C_usuarios/index';
$route['usuarios/pegausuarios'] = 'C_usuarios/pegaUsuarios';
$route['usuarios/deleta/(:num)'] = 'C_usuarios/deleta/$1';

$route['cadastrar'] = 'C_login/cadastrar';
$route['cadastrarinfo'] = 'C_login/cadastrarInfo';

$route['dashboard'] = 'C_dashboard/index';

$route['locais'] = 'C_locais/index';
$route['locais/cadastro'] = 'C_locais/cadastro';
$route['locais/pegalocais'] = 'C_locais/pegaLocais';
$route['locais/deleta/(:num)'] = 'C_locais/deleta/$1';

$route['agendamento'] = 'C_agendamento/index';
$route['agendamento/cadastro'] = 'C_agendamento/cadastro';
$route['agendamento/buscahorario/(:any)/(:any)'] = 'C_agendamento/buscaHorarioUsado/$1/$2';
$route['agendamento/buscamedidas'] = 'C_agendamento/buscaMedidas';

$route['agendados'] = 'C_agendados/index';

$route['medidas'] = 'C_medidas/index';
$route['medidas/deleta/(:num)'] = 'C_medidas/apagar/$1';