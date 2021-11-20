<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['admin'] = 'admin/index';
$route['view-survey/(:any)'] = 'surveys/view_survey/$1';
$route['answer-survey/(:any)'] = 'surveys/answer_survey_view/$1';
$route['create-survey'] = 'surveys/create_survey_view';
$route['dashboard'] = 'surveys/index';
$route['default_controller'] = 'pages/view';
$route['(:any)'] = 'pages/view/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
