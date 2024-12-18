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
<html lang="pt-BR">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Lista Usuarios</title>
    <link rel="stylesheet" href="../../../public/css/lista-usuarios.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Lobster&display=swap"
      rel="stylesheet"
    />
    <link rel="icon" href="../../../public/assets/favicon-logo-sem-nome.png" type="image/png">
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto&display=swap"
      rel="stylesheet"
    />
  </head>
  <body>
  <div class="lateral"><?php require 'sidebar.php' ?></div>
    <div class="tela"></div>
    <div class="pagina-lista-usuarios">
      <h1 class="titulo texto-branco">Usuários</h1>
      <div id="div-botao-criar-usuario">
        <button class="botao-construtivo" onclick="abrirModal('criacao')">
          <ion-icon name="add-outline"></ion-icon>
        </button>
      </div>
      <div class="table-container">
        <table>
          <thead>
            <tr>
              <th>ID</th>
              <th>Nome</th>
              <th class="coluna-email">Email</th>
              <th>
                <div class="center-div">
                  <ion-icon name="settings-outline"></ion-icon>
                </div>
              </th>
            </tr>
          </thead>
          <tbody>
          <?php foreach($usuarios as $usuario): ?>
            <tr class="accordion">
              <td><?= $usuario->id ?></td>
              <td><?= $usuario->nome ?></td>
              <td class="coluna-email"><?= $usuario->email ?></td>
              <td class="celula-icone hidden">
                <div class="center-div">
                  <ion-icon name="chevron-down-outline"></ion-icon>
                </div>
              </td>
              <td class="celula-acoes">
                <div class="div-botoes">
                  <button onclick="abrirModal('visualizacao<?= $usuario->id ?>')">
                    <ion-icon name="eye-outline"></ion-icon>
                  </button>
                  <button onclick="abrirModal('edicao<?= $usuario->id ?>')">
                    <ion-icon name="create-outline"></ion-icon>
                  </button>
                  <button
                    class="botao-destrutivo"
                    onclick="abrirModal('excluir<?= $usuario->id ?>')"
                  >
                    <ion-icon name="trash-outline"></ion-icon>
                  </button>
                </div>
              </td>
            </tr>
            <tr class="hidden-content linha-email">
              <td colspan="3">Email: <?= $usuario->email ?></td>
            </tr>
            <tr class="hidden-content">
              <td colspan="4">
                <button onclick="abrirModal('visualizacao<?= $usuario->id ?>')">
                  <ion-icon name="eye-outline"></ion-icon>
                </button>
                <button onclick="abrirModal('edicao<?= $usuario->id ?>')">
                  <ion-icon name="create-outline"></ion-icon>
                </button>
                <button
                  class="botao-destrutivo"
                  onclick="abrirModal('excluir<?= $usuario->id ?>')"
                >
                  <ion-icon name="trash-outline"></ion-icon>
                </button>
              </td>
            </tr>
          
        <!--Modal visualização-->
        <?php require 'componentes/modais/modal_usuario_visu.php' ?>  

        <!--Modal edição-->
        <?php require 'componentes/modais/modal_usuario_editar.php' ?>

        <!--Modal exclusão-->
        <?php require 'componentes/modais/modal_usuario_excluir.php' ?>


            <?php endforeach; ?>
          </tbody>
        </table>
      </div>

      <div class="paginacao">
        <a class="paginacao-elemento <?= $page <= 1 ? "paginacao-elemento-disabled" : "" ?>" href="?paginacaoUsuario=<?= $page - 1 ?>"><</a>

        <?php for($page_number = 1; $page_number <= $total_pages; $page_number++): ?>
          <a class="paginacao-elemento  <?= $page_number == $page ? "paginacao-elemento-atual" : "paginacao-elemento" ?>" href="?paginacaoUsuario=<?= $page_number ?>"><?= $page_number ?></a>
        <?php endfor ?>
        <a class="paginacao-elemento <?= $page >= $total_pages ? "paginacao-elemento-disabled" : "" ?>"" href="?paginacaoUsuario=<?= $page + 1 ?>">></a>
      </div>
    </div>

    <!--Modal criação-->
      <?php require 'componentes/modais/modal_usuario_criar.php' ?>

    <script
      type="module"
      src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"
    ></script>
    <script
      nomodule
      src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"
    ></script>

    <script src="../../../public/js/lista-usuarios.js"></script>
    <script src="../../../public/js/modals.js"></script>
  </body>
</html>
