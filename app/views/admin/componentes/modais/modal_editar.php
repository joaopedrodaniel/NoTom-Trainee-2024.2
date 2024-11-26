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
                <h2>
                  <h2><?= date_format(new DateTime($post->criado_em), 'd/m/Y'); ?></h2>
                </h2>
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