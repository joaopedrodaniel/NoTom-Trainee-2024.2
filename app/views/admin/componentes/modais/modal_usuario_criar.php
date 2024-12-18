<div class="modal criacao" id="criacao">
  <form method="POST" action="/usuario/criacao">
    <h1>Criar usuário</h1>

    <label class="titulo-conteudo-modal" for="input-nome">Nome:</label>
    <input required="true" data-type="input-usuario" id="nome" name="nome" type="text" placeholder="Digite seu nome..." />
    <div class="avisos-do-texto">
      <p id="aviso-nome"></p>
      <p class="contador" id="contador-nome"></p>
    </div>

    <label class="label-com-margem titulo-conteudo-modal" for="email">E-mail:</label>
    <input required="true" data-type="input-email" id="email" name="email" type="email" placeholder="exemplo@email.com" />
    <div class="avisos-do-texto">
      <p id="aviso-email"></p>
    </div> 

    <label class="label-com-margem titulo-conteudo-modal" for="senha">Senha:</label>
    <input required="true" data-type="input-senha" id="senha" name="senha" type="password" placeholder="Digite sua senha..." />
    <div class="avisos-do-texto">
      <p id="aviso-senha"></p>
      <p class="contador" id="contador-senha"></p>
    </div>

    <div class="modal-botoes">
      <button type="button" class="botao-destrutivo" onclick="fecharModal('criacao')">Cancelar</button>
      <button id="botao-criar" class="botao-construtivo">Criar</button>
    </div>
  </form>
</div>