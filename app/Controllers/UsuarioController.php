<?php

namespace App\Controllers;

use App\Core\App;
use Exception;

class UsuarioController
{

    public function index()
    {
        $page = 1;
        if(isset($_GET['paginacaoUsuario']) && !empty($_GET['paginacaoUsuario'])){
            $page = intval($_GET['paginacaoUsuario']);

            if($page <= 0){
                return redirect('admin/lista-usuarios');
            }
        }

        $itensPage = 8;
        $inicio = $itensPage * $page - $itensPage;
        $rows_count = App::get('database')->countAll('usuarios');

        if($inicio > $rows_count){
            return redirect('admin/lista-usuarios');
        }
        
        $usuarios = App::get('database')->selectAll('usuarios', $inicio, $itensPage);

        $total_pages = ceil($rows_count/$itensPage);

        return view('admin/lista-usuarios', compact('usuarios', 'page', 'total_pages'));
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
    
    public function sidebar($id)
    {
        $post = App::get('database')->selectOne('posts', $id);
        $usuarios = App::get('database')->selectAll('usuarios');

        return view('admin/sidebar' , compact('post', 'usuarios'));
    }

}

?>