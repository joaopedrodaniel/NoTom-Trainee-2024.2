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