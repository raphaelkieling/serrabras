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
$route['usuarios/alterar/(:num)'] = 'C_usuarios/alterar/$1';

//editar é o lugar onde fica a página de edição
//o alterar de logo acima faz o processo de edição
$route['usuarios/editar/(:num)'] = 'C_usuarios/editarUsuario/$1';

$route['perfil/(:num)'] = 'C_usuarios/perfil/$1';

$route['cadastrar'] = 'C_login/cadastrar';
$route['cadastrarinfo'] = 'C_login/cadastrarInfo';

$route['dashboard'] = 'C_dashboard/index';
$route['dashboard/analises'] = 'C_dashboard/analises';

$route['locais'] = 'C_locais/index';
$route['locais/cadastro'] = 'C_locais/cadastro';
$route['locais/altera'] = 'C_locais/altera';
$route['locais/deleta/(:num)'] = 'C_locais/deleta/$1';

$route['gerenciadordedias'] = 'C_gerenciadordedias/index';
$route['gerenciadordedias/cadastro'] = 'C_gerenciadordedias/cadastro';
$route['gerenciadordedias/deleta/(:num)'] = 'C_gerenciadordedias/deleta/$1';

$route['notificacao'] = 'C_notificacao/index';
$route['notificacao/cadastrar'] = 'C_notificacao/cadastrar';
$route['notificacao/cancela/(:num)'] = 'C_notificacao/cancela/$1';

$route['agendamento'] = 'C_agendamento/index';
$route['agendamento/cadastro'] = 'C_agendamento/cadastro';
$route['agendamento/buscahorario/(:any)/(:any)'] = 'C_agendamento/buscaHorarioUsado/$1/$2';
$route['agendamento/buscamedidas'] = 'C_agendamento/buscaMedidas';

$route['agendados'] = 'C_agendados/index';
$route['agendados/entrege/(:num)'] = 'C_agendados/entregue/$1';
$route['agendados/cancela/(:num)'] = 'C_agendados/cancela/$1';
$route['agendados/pedidoinfo/(:num)'] = 'C_agendados/pedidoInfo/$1';
$route['agendados/fornecedor/(:num)'] = 'C_agendados/fornecedorPedidos/$1';

$route['medidas'] = 'C_medidas/index';
$route['medidas/cadastra'] = 'C_medidas/cadastra';
$route['medidas/alterar'] = 'C_medidas/alterar';
$route['medidas/deleta/(:num)'] = 'C_medidas/apagar/$1';