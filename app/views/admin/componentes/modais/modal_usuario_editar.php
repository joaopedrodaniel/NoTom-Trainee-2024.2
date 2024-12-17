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