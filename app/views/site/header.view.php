<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/public/css/header.css">
    <title>Header</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
</head>

<body>
    <header>
        <nav class="nav-bar">
            <div class="nav-lista">
                <ul>
                    <li class="nav-item">
                        <div><span class="simbolo">home</span></div><a href="#" class="nav-link">Pagina Inicial</a>
                    </li>
                    <li class="nav-item">
                        <div><span class="simbolo">list</span></div><a href="#" class="nav-link">Publicações</a>
                    </li>
                    <li class="nav-item">
                        <!--ATENÇÃO, O CAMINHO DO HREF ABAIXO ESTÁ ERRADO! IREI REVISITAR NO FUTURO, TROCAR O QUANTO ANTES -->
                        <div><span class="simbolo">login</span></div><a href="http://localhost:8000/login" class="nav-link"> Login</a>
                    </li>
                </ul>
            </div>
            
            <div class="area-da-foto">
                <img class="logo" src="/public/assets/logo-cortada.png" alt="logo-no-tom">
            </div>

            <div class="menu-mobile-logo">
                <P>NoTom</p>
            </div>
            <div class="menu-mobile-icone">
                <button onclick="menuShow()">menu</button>
            </div>
        </nav>

        <div class="menu-mobile">
            <ul>
                <li class="nav-item">
                    <div class="alinhador-li">
                        <span class="simbolo">Home</span><a href="#" class="nav-link">Pagina Inicial</a>
                    </div>
                </li>
                <li class="nav-item">
                    <div class="alinhador-li">
                        <span class="simbolo">list</span><a href="#" class="nav-link">Publicações</a>
                    </div>
                </li>
                <li class="nav-item">
                    <div class="alinhador-li">
                        <span class="simbolo">login</span><a href="#" class="nav-link"> Login</a>
                    </div>
                </li>
            </ul>
        </div>
    </header>

    <script src="../../../public/js/header.js"></script>
</body>

</html>