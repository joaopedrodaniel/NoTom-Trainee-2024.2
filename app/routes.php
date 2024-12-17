<?php

namespace App\Controllers;
use App\Controllers\ExampleController;
use App\Controllers\PostsController;
use App\Controllers\PublicPostsPaginacaoController;
use App\Core\Router;

    $router->get('posts', 'PublicPostsPaginacaoController@index' );

    $router->get('landing' , 'landingController@index');

$router->get('', 'ExampleController@index');
$router->get('post-individual/{id}', 'PostController@exibirPost');
$router->get('admin/usuarios', 'UsuarioController@index');
$router->post('admin/usuarios/criacao', 'UsuarioController@criacao');
$router->post('admin/usuarios/editar', 'UsuarioController@editar');      //olhar as rotas de usuario na revisao (Adicionar /admin)
$router->post('admin/usuarios/excluir', 'UsuarioController@excluir');
$router->get('admin/posts', 'PaginacaoController@index');
$router->post('admin/posts/create', 'PostsController@create');
$router->post('admin/posts/edit', 'PostsController@edit');
$router->post('admin/posts/delete', 'PostsController@delete');

 //Rotas Davi
 $router->get('login', 'LoginController@exibirLogin');
 $router->get('dashboard', 'LoginController@exibirDashboard');
 $router->post('login', 'LoginController@efetuaLogin');
 $router->post('logout', 'LoginController@logout');
 $router->get('sidebar', 'SideController@index');
 $router->get('posts', 'PublicPostsPaginacaoController@index' );

 //Rotas Lucas
 $router->get('busca', 'PublicPostsPaginacaoController@search');


?>