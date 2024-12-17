<?php

namespace App\Controllers;

use App\Core\App;
use Exception;

class SideController
{

    public function sidebar($id)
    {
        // Iniciar a sessão
        if (session_status() != PHP_SESSION_ACTIVE) {
            session_start();
        }

        // Verificar se o usuário está logado
        if (!isset($_SESSION['id'])) {
            header('Location: /login');
            exit;
        }

        // Capturar o ID do usuário logado
        $id_usuario = $_SESSION['id'];

        // Consultar os dados do usuário no banco
        $usuario = App::get('database')->selectOne('usuarios', $id_usuario);

        // Consultar outras informações, se necessário (ex.: lista de posts, notificações, etc.)
        $posts = App::get('database')->selectAll('posts'); // Exemplo, caso queira listar posts na sidebar

        // Passar os dados do usuário e outros parâmetros para a view
        return view('admin/sidebar', compact('usuario', 'posts'));
    }

}

?>