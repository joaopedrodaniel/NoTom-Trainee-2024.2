<?php
    if(session_status() != PHP_SESSION_ACTIVE){
        session_start();
    }

    if(!isset($_SESSION['id'])){
        header('Location: /login');
    }
    $id_usuario = $_SESSION['id'];
    $usuarioLogado = App\Core\App::get('database')->selectOne('usuarios', $id_usuario);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../public/css/dashboard.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Lobster&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Lobster&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap">
    <link rel="icon" href="../../../public/assets/favicon-logo-sem-nome.png" type="image/png">
    <title>Dashboard</title>
</head>
<body>
    
<div class="lateral"><?php require 'sidebar.php' ?></div>
<div class="container">
    <button class="home"><a href="/landing"><img src="../../../public/assets/home.png"></a></button>
    
        
        <div class="titulo">
            <h1> <img src="../../../public/assets/notomsemnome.png">Dashboard</h1>
            <h3>Seja Bem-Vindo(a)! Escolha a opção que queira seguir neste momento.</h3>
        </div>    

        <div class="b">
            <a href="/admin/posts"><button><img src="../../../public/assets/publi.png"> Publicações</button></a>
            <a href="/usuario"> <button><img src="../../../public/assets/user.png"> Usuários</button></a>
            <form action="/logout" method="POST"><button type="submit" class="out"><img src="../../../public/assets/logout.png"> Log Out</button></form>
        </div>
    </div>

</body>
</html>