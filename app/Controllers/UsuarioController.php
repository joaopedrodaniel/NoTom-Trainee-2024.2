<?php

namespace App\Controllers;

use App\Core\App;
use Exception;

class UsuarioController
{

    public function index()
    {
        $usuarios = App::get('database')->selectAll('usuarios');

        return view('admin/lista-usuarios', compact('usuarios'));
    }

    public function criacao()
    {
        $parameters = [
            'nome' => $_POST['nome'],
            'email' => $_POST['email'],
            'senha' => $_POST['senha'],
        ];

        App::get('database')->insert('usuarios' , $parameters);

        header('Location: /usuario');
    }

    public function editar()
    {
        $parameters = [
            'nome' => $_POST['nome'],
            'email' => $_POST['email'],
            'senha' => $_POST['senha'],
        ];

        $id = $_POST['id'];

        App::get('database')->update('usuarios',$id,$parameters);

        header('Location: /usuario');
    }

    public function excluir()
    {
        $id = $_POST['id'];

        App::get('database')->delete('usuarios' , $id);

        header('Location: /usuario');
    }
}

?>