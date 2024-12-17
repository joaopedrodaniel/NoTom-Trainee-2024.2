<div class="background-popup" id="modalEditar<?= $post->id ?>">
<form method="POST" action="/admin/posts/edit" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $post->id ?>">
    <div class="caixa-popup">
      <div class="parte-superior">

        <div class="titulo-popup">
          <h1>Edite a Publicação ID#<?= $post->id ?></h1>
        </div>

        <div class="area-do-input-titulo">
          <label for="input-titulo">Novo Titulo: </label>
          <input id="input-titulo" required="true" name="titulo" required="true" class=input-titulo-popup value="<?= $post->titulo ?>" />
        </div>

        <div class="area-do-input-descricao">
          <label for="area-da descricao">Escreva uma breve descricao de seu post: </label>
          <textarea id="area-de-texto" required="true" name="descricao" class="input-paragrafo-popup"><?= $post->descricao ?></textarea>
        </div>

        <div class="area-do-input-paragrafo">
          <label for="input-titulo">Edite o Texto: </label>
          <textarea id="input-paragrafo" required="true" name="texto" class="input-paragrafo-popup"><?= $post->texto ?></textarea>
        </div>
        
         <div class="autor-e-data">
          <div>
            <?php $user = App\Core\App::get('database')->select('usuarios', $post->id_autor)[0]; ?>
            <h3>Autor:</h3>
            <h2><?= $user->nome ?></h2>
          </div>
          <div>
            <h3>Data do Post:</h3>
            <h2>
              <h2><?= date_format(new DateTime($post->criado_em), 'd/m/Y'); ?></h2>
            </h2>
          </div>
        </div>
        <input type="hidden" name="atualizarImagem" id="atualiza_<?= $post->id ?>" >
        <div class=imagem-popup>
                    <button class="botao-adiciona-foto" type="button">
                    <label class="local-de-input-foto">
                            <p>Adicionar Foto * </p>
                            <ion-icon name="cloud-upload-outline"></ion-icon>
                            <input type="file" id="<?= $post->id ?>" name="imagem" multiple class="input-file" style="display: none;" />
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