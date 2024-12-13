<?php

namespace App\Controllers;
use App\Controllers\ExampleController;
use App\Controllers\PostsController;
use App\Core\Router;

    $router->get('', 'ExampleController@index');
    $router->get('post-individual/{id}', 'PostController@exibirPost');
    $router->get('admin/usuario', 'UsuarioController@index');
    $router->post('admin/usuario/criacao', 'UsuarioController@criacao');
    $router->post('admin/usuario/editar', 'UsuarioController@editar');
    $router->post('admin/usuario/excluir', 'UsuarioController@excluir');
    $router->get('admin/posts', 'PaginacaoController@index');
    //$router->get('admin/posts', 'PostsController@index');
    $router->post('admin/posts/create', 'PostsController@create');
    $router->post('admin/posts/edit', 'PostsController@edit');
    $router->post('admin/posts/delete', 'PostsController@delete');
?>