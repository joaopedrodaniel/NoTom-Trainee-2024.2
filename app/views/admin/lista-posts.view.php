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
  <title>Lista Posts</title>
  <link rel="stylesheet" href="../../../public/css/lista-posts-admin.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet" />
  <link rel="icon" href="../../../public/assets/favicon-logo-sem-nome.png" type="image/png">
</head>

<body>
<div class="lateral"><?php require 'sidebar.php' ?></div>
  <div class="pagina-lista-usuarios">
    <h1 class="titulo texto-branco">Posts</h1>

    <div id="div-botao-criar-usuario">
      <button onclick="abirModal('modalCriar')" class="botao-construtivo" id="botao-construtivo">
        <ion-icon name="add-outline"></ion-icon>
      </button>
    </div>

    <div class="table-container">
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>Título</th>
            <th class="coluna-responsiva">Autor</th>
            <th class="coluna-responsiva">Data</th>
            <th>
              <div class="center-div">
                <ion-icon name="settings-outline"></ion-icon>
              </div>
            </th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($posts as $post):
            $user = App\Core\App::get('database')->select('usuarios', $post->id_autor)[0]; ?>
            <tr class="accordion">
              <td><?= $post->id ?></td>
              <td><?= $post->titulo ?></td>
              <td class="coluna-responsiva"><?= $user->nome ?></td>
              <td class="coluna-responsiva"><?= date_format(new DateTime($post->criado_em), 'd/m/Y'); ?></td>
              <td class="celula-icone hidden">
                <div class="center-div">
                  <ion-icon name="chevron-down-outline"></ion-icon>
                </div>
              </td>
              <td class="celula-acoes">
                <div class="div-botoes">

                  <button onclick="abirModal('modalVisualizar<?= $post->id ?>')">
                    <ion-icon name="eye-outline"></ion-icon>
                  </button>

                  <button onclick="abirModal('modalEditar<?= $post->id ?>')">
                    <ion-icon name="create-outline"></ion-icon>
                  </button>

                  <button onclick="abirModal('modalExcluir<?= $post->id ?>')" class="botao-destrutivo">
                    <ion-icon name="trash-outline"></ion-icon>
                  </button>

                </div>
              </td>
            </tr>

            <!-- Parte Responsiva da Tabela, O que mudar na parte não responsiva, mudar na parte responsiva -->
            <tr class="hidden-content linha-responsiva">
              <td colspan="3"><span style="font-weight: bold">Autor: </span><?= $user->nome ?></td>
            </tr>
            <tr class="hidden-content linha-responsiva">
              <td colspan="3"><span style="font-weight: bold">Criado Em: </span> <?= date_format(new DateTime($post->criado_em), 'd/m/Y');?></td>
            </tr>
            <tr class="hidden-content">
              <td colspan="5">

                <button onclick="abirModal('modalVisualizar<?= $post->id ?>')">
                  <ion-icon name="eye-outline"></ion-icon>
                </button>


                <button onclick="abirModal('modalEditar<?= $post->id ?>')">
                  <ion-icon name="create-outline"></ion-icon>
                </button>

                <button onclick="abirModal('modalExcluir<?= $post->id ?>')" class="botao-destrutivo">
                  <ion-icon name="trash-outline"></ion-icon>
                </button>
              </td>
            </tr>
            <!-------------->
    </div>

    <!-- Modais -->

    <!-- pop up excluir post -->
    <?php require 'componentes/modais/modal_excluir.php' ?>
    <!---->

    <!-- pop up editar post -->
    <?php require 'componentes/modais/modal_editar.php' ?>
    <!---->

    <!-- pop up Visualizar Post -->
    <?php require 'componentes/modais/modal_visualizar.php' ?>
    <!---->
  <?php endforeach; ?>
  </table>

  <!-- pop up criar post -->
  <?php require 'componentes/modais/modal_criar.php' ?>
  <!---->

  </div>
  </div>
  <!----Paginacao--->
  <?php require 'componentes/paginacao.php' ?>
  </div>


  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
  <script src="../../../public/js/lista-posts-admin.js"></script>
</body>

</html>