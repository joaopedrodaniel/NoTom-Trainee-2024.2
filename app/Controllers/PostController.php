<?php
namespace App\Controllers;

use App\Core\App;
use Exception;

class PostController
{
    public function exibirPost()
    {
        
        $posts = App::get('database')->selectAll('posts');
        $usuarios = App::get('database')->selectAll('usuarios');

        return view('site/post-individual' , compact('posts', 'usuarios'));

    }

}
?>