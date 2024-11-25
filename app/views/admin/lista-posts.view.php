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
              <td colspan="3" ><span style="font-weight: bold">Autor: </span>Fulano da Silva</td>
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
    <?php endforeach; ?>
     <!-- Modais -->
    <?php foreach ($_posts as $post): ?>
    <!-- pop up excluir post -->
    <div class="background-popup" id="modalExcluir<?= $post->id ?>">
      <form method="POST" action="/admin/posts/delete">
        <input type="hidden" name="id" value="<?= $post->id ?>">

        <div class="caixa-popup-excluir">
          <div class="parte-superior-excluir">
            <div class="titulo-popup-excluir">
              <h1>Você Deseja Mesmo Excluir este Post? </h1>
              <h2>Esta ação não é reversivel.</h2>
            </div>
          </div>
          <div class="parte-inferior">
            <button onclick="fecharModal('modalExcluir<?= $post->id ?>')" class="botao-construtivo" type="button">Cancelar</button>
            <button class="botao-destrutivo" type="submit" id="botao-cancelar">Excluir</button>
          </div>
        </div>
      </form>
    </div>
    <?php endforeach; ?>
    <?php foreach ($_posts as $post): ?>
    <!-- pop up editar post -->
    <div class="background-popup" id="modalEditar<?= $post->id ?>">
      <form method="POST" action="/admin/posts/edit">
        <input type="hidden" name="id" value="<?= $post->id ?>">
        <div class="caixa-popup">
          <div class="parte-superior">

            <div class="titulo-popup">
              <h1>Edite a Publicação ID#<?= $post->id ?></h1>
            </div>

            <div class="area-do-input-titulo">
              <label for="input-titulo">Novo Titulo: </label>
              <input id="input-titulo" name="titulo" required="true" class=input-titulo-popup placeholder="Digite seu Título *" />
            </div>



            <div class="area-do-input-descricao">
              <label for="area-da descricao">Escreva uma breve descricao de seu post: </label>
              <textarea id="area-de-texto" name="descricao" class="input-paragrafo-popup" placeholder=" Digite seu Conteudo *"></textarea>
            </div>

            <div class="area-do-input-paragrafo">
              <label for="input-titulo">Digite o Texto Novo: </label>
              <textarea id="input-paragrafo" name="texto" class="input-paragrafo-popup" placeholder=" Conteudo Novo *"></textarea>
            </div>

            <div class="autor-e-data">
              <div>
                <h3>Autor:</h3>
                <h2>Fulano de Tal</h2>
              </div>
              <div>
                <h3>Data do Post:</h3>
                <h2><h2><?= date_format(new DateTime($post->criado_em), 'd/m/Y'); ?></h2></h2>
              </div>
            </div>

            <div class=imagem-popup>
              <button class="botao-adiciona-foto">
                <label for="file" class="local-de-input-foto">
                  <p>Adicionar Foto Nova * </p>
                  <ion-icon name="cloud-upload-outline"></ion-icon>
                </label>

              </button>
            </div>
          </div>
          <div class=parte-inferior>
            <button onclick="fecharModal('modalEditar<?= $post->id ?>')" type="button" class="botao-destrutivo" id="botao-cancelar">Cancelar</button>
            <button class="botao-construtivo" type="submit" id="botao-criar-post">Editar</button>
          </div>
        </div>
      </form>
    </div>
    <?php endforeach; ?>
    <?php foreach ($_posts as $post): ?>
    <!-- pop up Visualizar Post -->
    <div class="background-popup" id="modalVisualizar<?= $post->id ?>">
      <div class=" caixa-popup-visualizar">

        <div class="parte-superior-visualizar">
          <div>
            <h2>Visualizar Post ID#<?= $post->id ?></h2>
            <br>
          </div>
          <div>
            <h1><?= $post->titulo ?></h1>
          </div>
        </div>
        <div class="parte-media-visualizar">
          <div class="teste2">
            <div class="area-da-foto-visualizar">
              <img src="https://th.bing.com/th/id/OIP.uTPJEPTVL_wSg-CdDls00gHaFL?rs=1&pid=ImgDetMain"
                alt="Imagem de Teste">
            </div>
            <div class=teste>
              <p><?= $post->texto ?></p>
            </div>
          </div>
          <div class="autor-e-data-visualizar ">
            <div>
              <h3>Autor:</h3>
              <h2>Fulano de Tal</h2>
            </div>
            <div>
              <h3>Data do Post:</h3>
              <h2><?= date_format(new DateTime($post->criado_em), 'd/m/Y'); ?></h2>
            </div>
          </div>
        </div>

        <div class=parte-inferior-visualizar>
          <button onclick="fecharModal('modalVisualizar<?= $post->id ?>')" class="botao-destrutivo" type="button">Sair</button>
        </div>
      </div>
    </div>

  <?php endforeach; ?>
  </table>


  <?php foreach ($_posts as $post): ?>
  <!-- pop up criar post -->
  <div class="background-popup" id="modalCriar">
    <form method="POST" action="/admin/posts/create">
      <div class="caixa-popup">

        <div class="parte-superior">

          <div class="titulo-popup">
            <h1>Criar Publicação</h1>
          </div>
          <div class="area-do-input-titulo">
            <label for="input-titulo">Titulo: </label>
            <input id="input-titulo" name="titulo" class=input-titulo-popup placeholder="Digite seu Título *" />
          </div>
          <div class="area-do-input-descricao">
            <label for="area-da descricao">Escreva uma breve descricao de seu post: </label>
            <textarea id="area-de-texto" name="descricao" class="input-paragrafo-popup" placeholder=" Digite seu Conteudo *"></textarea>
          </div>
          <div class="area-do-input-paragrafo">
            <label for="area-de-texto">Conteudo: </label>

            <textarea id="area-de-texto" name="texto" class="input-paragrafo-popup" placeholder=" Digite seu Conteudo *"></textarea>
          </div>


          <div class=imagem-popup>
            <button class="botao-adiciona-foto">
              <label for="file" class="local-de-input-foto">
                <p>Adicionar Foto * </p>
                <ion-icon name="cloud-upload-outline"></ion-icon>

              </label>
              <input type="file" id="file" name="file" multiple class="input-file" style="display: none;" />
            </button>
          </div>
        </div>
        <div class="parte-inferior">
          <button class="botao-construtivo" id="botao-criar-post" type="submit">Criar</button>
          <button onclick="fecharModal('modalCriar')" class="botao-destrutivo" type="button" id="botao-cancelar">Cancelar</button>
        </div>
      </div>
    </form>
  </div>
  <?php endforeach; ?>

  <div class="paginacao">
    <a class="paginacao-elemento" href="#"></a>
    <a class="paginacao-elemento paginacao-elemento-atual" href="#">1</a>
    <a class="paginacao-elemento" href="#">2</a>
    <a class="paginacao-elemento" href="#">3</a>
    <div>...</div>
    <a class="paginacao-elemento" href="#">9</a>
    <a class="paginacao-elemento" href="#">10</a>
    <a class="paginacao-elemento" href="#">></a>
  </div>
  </div>

  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
  <script src="../../../public/js/lista-posts-admin.js"></script>
</body>

</html>