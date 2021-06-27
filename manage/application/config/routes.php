<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'dashboard/index';
$route['part_management'] = 'part/index';
$route['brands'] = 'brand/index';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
