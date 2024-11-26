<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Lista de Posts - Admin</title>
  <link rel="stylesheet" href="../../../public/css/lista-posts-admin.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet" />
</head>

<body>
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
          <?php foreach ($_posts as $post): ?>
            <tr class="accordion">
              <td><?= $post->id ?></td>
              <td><?= $post->titulo ?></td>
              <td class="coluna-responsiva">Fulano da Silva</td>
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
            <tr class="hidden-content linha-responsiva">
              <td colspan="3"><span style="font-weight: bold">Autor: </span>Fulano da Silva</td>
            </tr>
            <tr class="hidden-content linha-responsiva">
              <td colspan="3"><span style="font-weight: bold">Criado Em: </span> <?= $post->criado_em ?></td>
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
    </div>
  
  <!-- Modais -->
    
    <!-- pop up excluir post -->
    <?php require(__DIR__ . './../admin/componentes/modais/modal_excluir.php') ?>
    <!---->
  
    <!-- pop up editar post -->
    <?php require(__DIR__ . './../admin/componentes/modais/modal_editar.php') ?>
     <!---->

    <!-- pop up Visualizar Post -->
    <?php require(__DIR__ . './../admin/componentes/modais/modal_visualizar.php') ?>
    <!---->
    <?php endforeach; ?>
  </table>

    <!-- pop up criar post -->
    <?php require(__DIR__ . './../admin/componentes/modais/modal_criar.php') ?>
    <!---->

  </div>
  </div>
  <!----Paginacao--->
  <?php require(__DIR__ . './../admin/componentes/paginacao.php') ?>
  </div>


  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
  <script src="../../../public/js/lista-posts-admin.js"></script>
</body>

</html>