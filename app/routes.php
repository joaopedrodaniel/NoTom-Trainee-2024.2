<?php

namespace App\Controllers;
use App\Controllers\ExampleController;
use App\Controllers\PostsController;
use App\Core\Router;


    //Rotas Davi
    $router->get('login', 'Controller@exibirLogin');
    $router->get('dashboard', 'Controller@exibirDashboard');
    $router->post('login', 'Controller@efetuaLogin');
    $router->post('logout', 'Controller@logout');
   
    //Rotas Lucas
    $router->get('site/header', 'ExampleController@header');
    $router->get('admin/posts', 'PaginacaoController@index');
    $router->post('admin/posts/create', 'PostsController@create');
    $router->post('admin/posts/edit', 'PostsController@edit');
    $router->post('admin/posts/delete', 'PostsController@delete');

    $router->post('site/posts', 'ExampleController@publicacoes');
?>