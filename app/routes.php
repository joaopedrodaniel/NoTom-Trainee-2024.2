<?php

namespace App\Controllers;
use App\Controllers\ExampleController;
use App\Controllers\PostsController;
use App\Controllers\PublicPostsPaginacaoController;
use App\Core\Router;

    $router->get('posts', 'PublicPostsPaginacaoController@index' );

    $router->get('admin/posts', 'PaginacaoController@index');

    //$router->get('admin/posts', 'PostsController@index');
    $router->post('admin/posts/create', 'PostsController@create');
    $router->post('admin/posts/edit', 'PostsController@edit');
    $router->post('admin/posts/delete', 'PostsController@delete');
?>