<?php
    if(session_status() != PHP_SESSION_ACTIVE){
        session_start();
    }

    if(!isset($_SESSION['id'])){
        header('Location: /login');
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../public/css/dashboard.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Lobster&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Lobster&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap">
    <title>Dashboard</title>
</head>
<body>
    <form action="/landing-page" method="POST"><button class="home"><img src="../../../public/assets/home.png"></button></form>
    <div class="titulo">
        <h1> <img src="../../../public/assets/notomsemnome.png">Dashboard</h1>
        <h3>Seja Bem-Vindo(a)! Escolha a opção que queira seguir neste momento.</h3>
    </div>    

    <div class="b">
        <form action="/lista-posts" method="POST"><button><img src="../../../public/assets/publi.png"> Publicações</button></form>
        <form action="/lista-usuarios" method="POST"><button><img src="../../../public/assets/user.png"> Usuários</button></form>
        <form action="/logout" method="POST"><button type="submit" class="out"><img src="../../../public/assets/logout.png"> Log Out</button></form>
    </div>

</body>
</html>