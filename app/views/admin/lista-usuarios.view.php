<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="../../../public/css/lista-usuarios.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Lobster&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto&display=swap"
      rel="stylesheet"
    />
  </head>
  <body>
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
    <div class="modal visualizacao" id="visualizacao<?= $usuario->id ?>">
      <h1>Visualização</h1>
      <label class="titulo-conteudo-modal" for="input-nome">ID:</label>
      <p class="conteudo-visualizacao"><?= $usuario->id ?></p>

      <label class="label-com-margem titulo-conteudo-modal" for="email"
        >Nome:</label
      >
      <p class="conteudo-visualizacao"><?= $usuario->nome ?></p>

      <label class="label-com-margem titulo-conteudo-modal" for="senha"
        >Email:</label
      >
      <p class="conteudo-visualizacao"><?= $usuario->email ?></p>
      <div class="modal-botoes">
        <button
        type="button"  
          class="botao-fechar-modal"
          onclick="fecharModal('visualizacao<?= $usuario->id ?>')"
        >
          Fechar
        </button>
      </div>
    </div>

        <!--Modal edição-->
    <div class="modal edicao" id="edicao<?= $usuario->id ?>" >
      <form method="POST" action="/usuario/editar">
        <h1>Edição</h1>

        <input required="true" type="hidden" name="id" id="usuario-id" value="<?= $usuario->id ?>">

        <label class="titulo-conteudo-modal" for="input-nome">Nome:</label>
        <input required="true" id="input-nome" type="text" name="nome" value="<?= htmlspecialchars($usuario->nome)?>"  placeholder="Digite seu nome..." />

        <label class="label-com-margem titulo-conteudo-modal" for="email"
          >E-mail:</label
        >
        <input required="true" id="email" type="email" name="email" value="<?= htmlspecialchars($usuario->email)?>"  placeholder="exemplo@email.com" />

        <label class="label-com-margem titulo-conteudo-modal" for="senha"
          >Senha:</label
        >
        <input required="true" id="senha" type="password" name="senha" value="<?= htmlspecialchars($usuario->senha)?>" placeholder="Digite sua senha..." />
        <div class="modal-botoes">
          <button type="button" class="botao-destrutivo" onclick="fecharModal('edicao<?= $usuario->id ?>')">
            Cancelar
          </button>
          <button class="botao-construtivo">Salvar</button>
        </div>
      </form>
    </div>

        <!--Modal exclusão-->
    <div class="modal excluir" id="excluir<?= $usuario->id ?>">
      <form method="POST" action="/usuario/excluir">
        <h1>Excluir</h1>
        
        <input type="hidden" name="id" value="<?= $usuario->id ?>">

        <p class="dados-usuario-excluir p-com-margem">ID: <?= $usuario->id ?></p>
        <p class="dados-usuario-excluir">Nome: <?= $usuario->nome ?></p>
        <div class="modal-botoes botoes-com-margem">
          <button type="button" class="botao-fechar-modal" onclick="fecharModal('excluir<?= $usuario->id ?>')">
            Cancelar
          </button>
          <button class="botao-excluir-modal">Excluir</button>
        </div>
      </form>
    </div>



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
    <div class="modal criacao" id="criacao">
      <form method="POST" action="/usuario/criacao">
        <h1>Criar usuário</h1>
        <label class="titulo-conteudo-modal" for="input-nome">Nome:</label>
        <input required="true" id="input-nome" name="nome" type="text" placeholder="Digite seu nome..." />

        <label class="label-com-margem titulo-conteudo-modal" for="email"
          >E-mail:</label
        >
        <input required="true" id="email" name="email" type="email" placeholder="exemplo@email.com" />

        <label class="label-com-margem titulo-conteudo-modal" for="senha"
          >Senha:</label
        >
        <input required="true" id="senha" name="senha" type="password" placeholder="Digite sua senha..." />
        <div class="modal-botoes">
          <button type="button" class="botao-destrutivo" onclick="fecharModal('criacao')">
            Cancelar
          </button>
          <button class="botao-construtivo">Criar</button>
        </div>
      </form>
    </div>

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
