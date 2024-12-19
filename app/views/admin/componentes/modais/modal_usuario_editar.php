<div class="modal edicao" id="edicao<?= $usuario->id ?>">
  <form method="POST" action="/usuario/editar">
    <h1>Edição</h1>

    <input required="true" type="hidden" name="id" id="usuario-id-<?= $usuario->id ?>" value="<?= $usuario->id ?>">

    <label class="titulo-conteudo-modal" for="input-nome-<?= $usuario->id ?>">Nome:</label>
    <input required="true" id="input-nome-<?= $usuario->id ?>" data-type="nome" type="text" name="nome" value="<?= htmlspecialchars($usuario->nome) ?>" placeholder="Digite seu nome...">
    <div style="display: flex; flex-direction: row; justify-content: space-between;">
    <span id="aviso-nome-<?= $usuario->id ?>" class="aviso"></span>
    <span id="contador-nome-<?= $usuario->id ?>" class="contador"></span>
    </div>
    <label class="label-com-margem titulo-conteudo-modal" for="email-<?= $usuario->id ?>">E-mail:</label>
    <input required="true" id="email-<?= $usuario->id ?>" data-type="email" type="email" name="email" value="<?= htmlspecialchars($usuario->email) ?>" placeholder="exemplo@email.com">

    <span id="aviso-email-<?= $usuario->id ?>" class="aviso"></span>

    <label class="label-com-margem titulo-conteudo-modal" for="senha-<?= $usuario->id ?>">Senha:</label>
    <input required="true" id="senha-<?= $usuario->id ?>" data-type="senha" type="password" name="senha" value="<?= htmlspecialchars($usuario->senha) ?>" placeholder="Digite sua senha...">

    <span id="aviso-senha-<?= $usuario->id ?>" class="aviso"></span>
    <span id="contador-senha-<?= $usuario->id ?>" class="contador"></span>

    <div class="modal-botoes">
      <button type="button" class="botao-destrutivo" onclick="fecharModal('edicao<?= $usuario->id ?>')">Cancelar</button>
      <button class="botao-construtivo">Salvar</button>
    </div>
  </form>
</div>
