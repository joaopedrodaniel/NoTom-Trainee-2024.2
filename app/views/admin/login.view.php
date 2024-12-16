<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../../../public/css/login-page.css" />
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <link rel="icon" href="../../../public/assets/favicon-logo-sem-nome.png" type="image/png">
        <title>Login Page</title>
    </head>

  <body>
    <div class="container">
        <div class="parte-superior">
            <div class="area-da-foto">
                <img src="\public\assets\logo-cortada.png" alt="logo No Tom" />
            </div>
            <h1>Bem vindo ao NoTom</h1>
            <h3>
                Ame e sinta a musica <span class="no-tom"> no tom </span> da sua vida.
            </h3>
        </div>

        <div class="parte-inferior">
            <div class="coluna-central">
                <h2>Entre para Prosseguir</h2>
            </div>
            
            <form class="form-central" action="/login" method="POST">
                <div class="mensagem-erro">
                    <p>
                        <?php
                            if(session_status() != PHP_SESSION_ACTIVE){
                                session_start();
                            }
                            if(isset($_SESSION['mensagem-erro']))
                                echo $_SESSION['mensagem-erro'];
                            unset( $_SESSION['mensagem-erro']);
                        ?>
                    </p>
                </div>
                    <div class="coluna-central">
                        <input type="text" name="email" id="email" class="texto-input" placeholder="Email *" autocomplete="off" />
                    </div>

                    <div class="coluna-central senha">
                        <input type="password" name="senha" id="senha" class="texto-input" placeholder="Senha *" autocomplete="off" />
                        <i class="bi bi-eye-fill" id="btn-senha" onclick="mostrarSenha()"></i>
                    </div>

                    <div class="coluna-central">
                        <button type="submit" class="btlogin">
                            <h4 class="texto-botao">Log In</h4>
                        </button>
                    </div>
                </form>
        </div>
    </div>
    <script src="../../../public/js/login.js"></script>
  </body>
</html>

