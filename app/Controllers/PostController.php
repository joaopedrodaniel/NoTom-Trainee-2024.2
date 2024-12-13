<?php
namespace App\Controllers;

use App\Core\App;
use Exception;

class PostController
{
    public function exibirPost($id)
    {
        
        $post = App::get('database')->selectOne('posts', $id);
        $usuarios = App::get('database')->selectAll('usuarios');

        if (!$post) {
            throw new Exception("Post não encontrado.");
        }

        return view('site/post-individual' , compact('post', 'usuarios'));

    }

}
?>