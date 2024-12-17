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
        if (session_status() != PHP_SESSION_ACTIVE) {
            session_start();
        }
        if (!isset($_SESSION['id'])) {
            header('Location: /login');
            exit;
        }
        $id_autor = $_SESSION['id']; 
        //variavel temporario = 
        $temporario = $_FILES['imagem']['tmp_name'];

        //adapta a imagem para a linguagem do php 
        $nomeimagem =  sha1(uniqid($_FILES['imagem']['name'], true)) . '.' . pathinfo($_FILES['imagem']['name'], PATHINFO_EXTENSION);

        //caminho onde vai ser armazenada
        $destinoimagem = "public/assets/fotos-posts/";

        //armazena a imagem no caminho definido acima
        move_uploaded_file($temporario, $destinoimagem . $nomeimagem);

        //concatena o caminho com o nome da imagem
        $caminhodaimagem = "public/assets/fotos-posts/" . $nomeimagem;

        $parameters = [
            'titulo' => $_POST['titulo'],
            'descricao' => $_POST['descricao'],
            'texto' => $_POST['texto'],
            'imagem' => $caminhodaimagem,
            'id_autor' => $id_autor, //lembrar de mudar o id autor
        ];

        App::get('database')->insert('posts', $parameters);
        header('Location: /admin/posts');
    }

    public function edit()
    {
        //variavel temporario = 
        $temporario = $_FILES['imagem']['tmp_name'];

        //adapta a imagem para a linguagem do php 
        $nomeimagem =  sha1(uniqid($_FILES['imagem']['name'], true)) . '.' . pathinfo($_FILES['imagem']['name'], PATHINFO_EXTENSION);

        //caminho onde vai ser armazenada
        $destinoimagem = "public/assets/fotos-posts/";

        //armazena a imagem no caminho definido acima
        move_uploaded_file($temporario, $destinoimagem . $nomeimagem);

        //concatena o caminho com o nome da imagem
        $caminhodaimagem = "public/assets/fotos-posts/" . $nomeimagem;

        $atualizarImagem = $_POST['atualizarImagem'];
        if($atualizarImagem){
            $parameters = [
                'titulo' => $_POST['titulo'],
                'descricao' => $_POST['descricao'],
                'texto' => $_POST['texto'],
                'imagem' => $caminhodaimagem,
                'id_autor' => 1,          //lembrar de mudar o id autor
            ];
        }
        else{
            $parameters = [
                'titulo' => $_POST['titulo'],
                'descricao' => $_POST['descricao'],
                'texto' => $_POST['texto'],
                'id_autor' => 1        //lembrar de mudar o id autor
            ];
        }
        
        $id = $_POST['id'];

        App::get('database')->update('posts', $id, $parameters);
        header('Location: /admin/posts');
    }
    
    public function delete()
    {
        
        $id = $_POST['id'];
        $post = App::get('database')->select('posts', $id)[0];
        $caminhodaimagem = $post->imagem;

        unlink($caminhodaimagem);

        
        App::get('database')->delete('posts', $id);

        header('Location: /admin/posts');
    }
}
