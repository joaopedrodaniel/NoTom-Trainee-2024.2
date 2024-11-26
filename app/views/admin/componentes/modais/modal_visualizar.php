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