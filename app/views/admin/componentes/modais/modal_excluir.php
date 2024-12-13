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