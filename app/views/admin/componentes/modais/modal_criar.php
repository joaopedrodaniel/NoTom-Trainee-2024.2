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