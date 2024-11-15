<?php

namespace App\Controllers;

use App\Core\App;
use Exception;

class PostsController
{

    public function index()
    {
        $_posts = App::get('database')->selectAll('posts');

        return view('admin/lista-posts', compact('_posts'));
    }

    public function create()
    {
        $parameters = [
            'titulo' =>$_POST['titulo'],
            'descricao' => $_POST['descricao'],
            'texto' => $_POST['texto'],
            'imagem' => 'https://ihasabucket.com',
            'id_autor' => 1
        ];

        App::get('database')->insert('posts', $parameters);
        header('Location: /admin/posts');
    }
}

?>