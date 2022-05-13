<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*backend routes*/
$route['login'] = 'backend/Auth/index';
$route['forgot-password'] = 'backend/Auth/forgotPassword';
$route['reset-password']="backend/Auth/resetPassword";
$route['change-password'] = 'backend/Auth/changePassword';
$route['logout']='backend/Auth/logout';
$route['dashboard'] = 'backend/Admin/index';

$route['admin'] = 'backend/Admin/create';
$route['admin/(:any)/delete'] = 'backend/Admin/delete/$1';

$route['members'] = 'backend/Member/index';
$route['member'] = 'backend/Member/create';
$route['member/(:any)'] = 'backend/Member/edit/$1';
$route['member/(:any)/delete'] = 'backend/Member/delete/$1';

$route['circles'] = 'backend/Circle/index';
$route['circle'] = 'backend/Circle/create';
$route['circle/(:any)/complete'] = 'backend/Circle/complete/$1';
$route['circle/(:any)'] = 'backend/Circle/edit/$1';
$route['circle/(:any)/delete'] = 'backend/Circle/delete/$1';

$route['admins'] = 'backend/Admin/admins';
$route['admin'] = 'backend/Admin/create';
$route['profile'] = 'backend/Admin/profile';
$route['admin/(:any)/delete'] = 'backend/Admin/delete/$1';
/*backend routes*/

$route['default_controller'] = 'welcome';
$route['404_override'] = 'Custom404';
$route['translate_uri_dashes'] = FALSE;
