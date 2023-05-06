<?php

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'api'], function () use ($router) {
$router->get('/users',['uses' => 'TeacherController@getUsers']);
});

$router->get('/users',['uses' => 'UserController@getUsers']);
$router->get('/SearchUsers/{id}',['uses' => 'UserController@searchUser']);
$router->post('/users',['uses' => 'UserController@addUsers']);
$router->patch('/users/{id}',['uses' => 'UserController@uptUser']);
$router->delete('/users/{id}',['uses' => 'UserController@delUser']);
