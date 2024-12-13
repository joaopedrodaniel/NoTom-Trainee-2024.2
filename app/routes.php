<?php

namespace App\Controllers;
use App\Controllers\ExampleController;
use App\Controllers\PostsController;
use App\Core\Router;

    $router->get('', 'ExampleController@index');
    $router->get('post/{id}', 'PostController@exibirPost');
    //$router->get('admin/posts', 'PostsController@index') 
    $router->post('admin/posts/create', 'PostsController@create');
    $router->post('admin/posts/edit', 'PostsController@edit');
    $router->post('admin/posts/delete', 'PostsController@delete');
?>