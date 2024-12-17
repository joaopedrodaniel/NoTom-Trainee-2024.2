<?php
namespace App\Controllers;

use App\Core\App;
use Exception;

class LoginController
{
    public function exibirLogin()
    {
        if(session_status() != PHP_SESSION_ACTIVE){
            session_start();
        }

        if(isset($_SESSION['id'])){
            header('Location: /dashboard');
        }

        return view('admin/login');
    }

    public function exibirDashboard()
    {
        return view('admin/dashboard');
    }

    public function efetuaLogin()
    {
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $user = App::get('database')->verificaLogin($email, $senha);

        if($user != false){
            if(session_status() != PHP_SESSION_ACTIVE){
                session_start();
            }
            $_SESSION['id'] = $user->id;
            header('Location: /dashboard');
        }
        else{
            if(session_status() != PHP_SESSION_ACTIVE){
                session_start();
            }
            $_SESSION['mensagem-erro'] = "Usuário e/ou senha incorretos";
            header('Location: /login');
        }
    }

    public function logout()
    {
        if(session_status() != PHP_SESSION_ACTIVE){
            session_start();
        }
        session_unset();
        session_destroy();

        header('Location: /landing');
    }
}
?>