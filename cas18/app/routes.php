<?php

$router->get('', 'PagesController@home');
$router->get('about', 'PagesController@about');
$router->get('contact', 'PagesController@contact');

$router->get('users', 'UsersController@index');
$router->post('users','UsersController@store');
$router->post('users/update','UsersController@update');
$router->get('users/delete', 'UsersController@delete');
$router->get('users/edit', 'UsersController@edit');
$router->get('patients', 'PatientsController@index');
$router->post('patients','PatientsController@store');

//$router->get('examination', 'ExaminationController@index');
$router->get('examination', 'ExaminationController@indexType');
$router->post('examination','ExaminationController@store');

$router->get('results', 'ResultsController@index');
$router->post('saveresult', 'ResultsController@save');


