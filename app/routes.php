<?php

namespace App\Controllers;
use App\Controllers\ExampleController;
use App\Controllers\PostsController;
use App\Core\Router;

    $router->get('usuario', 'UsuarioController@index');
    $router->post('usuario/criacao', 'UsuarioController@criacao');
    $router->post('usuario/editar', 'UsuarioController@editar');
    $router->post('usuario/excluir', 'UsuarioController@excluir');
    $router->get('admin/posts', 'PaginacaoController@index');
    //$router->get('admin/posts', 'PostsController@index');
    $router->post('admin/posts/create', 'PostsController@create');
    $router->post('admin/posts/edit', 'PostsController@edit');
    $router->post('admin/posts/delete', 'PostsController@delete');
?>