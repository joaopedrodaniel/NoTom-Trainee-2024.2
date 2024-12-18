<?php

namespace App\Controllers;

use App\Core\App;
use Exception;

class SideController
{

    public function sidebar($id)
    {
        if (session_status() != PHP_SESSION_ACTIVE) {
            session_start();
        }

        if (!isset($_SESSION['id'])) {
            header('Location: /login');
            exit;
        }

        $id_usuario = $_SESSION['id'];

        $usuario = App::get('database')->selectOne('usuarios', $id_usuario);

        $posts = App::get('database')->selectAll('posts'); 

        return view('admin/sidebar', compact('usuario', 'posts'));
    }

}

?>