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