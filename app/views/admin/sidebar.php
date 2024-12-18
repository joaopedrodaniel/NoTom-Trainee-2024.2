<?php
if (session_status() != PHP_SESSION_ACTIVE) {
    session_start();
}

if (!isset($_SESSION['id'])) {
    header('Location: /login');
}

$rota_atual = $_SERVER['REQUEST_URI'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../../../public/css/sidebar.css" />
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
    />
    <title>Sidebar</title>
</head>
<body>
<nav id="sidebar">
    <div id="sidebar_content">
        <div id="user">
            <img
                src="../../../public/assets/logo-original.png"
                id="user_avatar"
                alt="Avatar"
            />
            <p id="user_infos">
                <span class="item-description"><?= $usuarioLogado->nome ?></span>
                <span class="item-description">Administrador</span>
            </p>
        </div>

        <ul id="side_items">
            <li class="side-item <?= $rota_atual === '/dashboard' ? 'active' : '' ?>" id="dashboard">
                <a href="/dashboard">
                    <i class="fa-solid fa-chart-simple"></i>
                    <span class="item-description"> Dashboard </span>
                </a>
            </li>
            <li class="side-item <?= $rota_atual === '/usuario' ? 'active' : '' ?>" id="usuarios">
                <a href="/usuario">
                    <i class="fa-solid fa-user"></i>
                    <span class="item-description"> Usuários </span>
                </a>
            </li>
            <li class="side-item <?= $rota_atual === '/admin/posts' ? 'active' : '' ?>" id="publicacoes">
                <a href="/admin/posts">
                    <i class="fa-solid fa-edit"></i>
                    <span class="item-description"> Publicações </span>
                </a>
            </li>
        </ul>

        <button id="open_btn">
            <i id="open_btn_icon" class="fa-solid fa-chevron-right"></i>
        </button>
    </div>

    <div id="logout">
        <form action="/logout" method="POST">
            <button type="submit" id="logout_btn">
                <i class="fa-solid fa-right-from-bracket"></i>
                <span class="item-description"> Logout </span>
            </button>
        </form>
    </div>
</nav>

<script src="../../../public/js/sidebar.js"></script>
</body>
</html>
