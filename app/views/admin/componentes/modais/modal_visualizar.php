<div class="background-popup" id="modalVisualizar<?= $post->id ?>">
  <div class=" caixa-popup-visualizar">

    <div class="parte-superior-visualizar">
      <div>
        <h2>Visualizar Post ID#<?= $post->id ?></h2>
        <br>
      </div>
      <div>
        <h1><?= $post->titulo ?></h1>
        <h3><?= $post->descricao ?></h3>
      </div>
    </div>
    <div class="parte-media-visualizar">

      <div class="teste2">
        <div class="area-da-foto-visualizar">
          <img src="<?= '/' . $post->imagem ?>"
            alt="Imagem de Teste">
        </div>
        <div class=teste>
          <p><?= $post->texto ?></p>
        </div>
      </div>
      <div class="autor-e-data-visualizar ">
        <div>
          <?php $user = App\Core\App::get('database')->select('usuarios', $post->id_autor)[0]; ?>
          <h3>Autor:</h3>
          <h2><?= $user->nome ?></h2>
        </div>
        <div>
          <h3>Data do Post:</h3>
          <h2><?= date_format(new DateTime($post->criado_em), 'd/m/Y'); ?></h2>
        </div>
      </div>
    </div>

    <div class=parte-inferior>
      <button onclick="fecharModal('modalVisualizar<?= $post->id ?>')" class="botao-destrutivo" type="button">Sair</button>
    </div>
  </div>
</div>