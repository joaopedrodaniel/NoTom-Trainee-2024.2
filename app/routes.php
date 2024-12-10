<?php

namespace App\Controllers;
use App\Controllers\ExampleController;
use App\Controllers\PostsController;
use App\Core\Router;

//Por algum motivo quando eu troco o nome tanto do arquivo ExampleController por Header Controller, quanto aqui embaixo,
//Quanto na classe do arquivo, o site não funciona e aparece este erro:
//Fatal error: Uncaught Error: Class "App\Controllers\HeaderController" not found in C:\Users\User\NoTom-Trainee-2024.2-1\core\Router.php:79 
//Stack trace: #0 C:\Users\User\NoTom-Trainee-2024.2-1\core\Router.php(64): App\Core\Router->callAction('App\\Controllers...', 'header') 
//#1 C:\Users\User\NoTom-Trainee-2024.2-1\index.php(9): App\Core\Router->direct('site/header', 'GET') #2 {main} thrown in 
//C:\Users\User\NoTom-Trainee-2024.2-1\core\Router.php on line 79

//Verificar com alguem com mais conhecimento no futuro, tentei olhar em foruns e youtube, mas não entendi o significado do erro ainda
//Visitar isto novamente


    $router->get('site/header', 'ExampleController@header');



    $router->get('admin/posts', 'PaginacaoController@index');

    $router->post('admin/posts/create', 'PostsController@create');
    $router->post('admin/posts/edit', 'PostsController@edit');
    $router->post('admin/posts/delete', 'PostsController@delete');
?>