<div class="background-popup" id="modalCriar">
    <form method="POST" action="/admin/posts/create" enctype="multipart/form-data">
        <div class="caixa-popup">

            <div class="parte-superior">

                <div class="titulo-popup">
                    <h1>Criar Publicação</h1>
                </div>

                <div class="area-do-input-titulo">
                    <label for="input-titulo">Titulo: </label>
                    <input id="inputTitulo" required="true" name="titulo" class=input-titulo-popup placeholder="Digite seu Título *" />

                    <div class="avisos-do-texto">
                        <p id="avisoContadorTitulo"></p>
                        <p class="contador" id="contadorTitulo"></p>
                    </div>

                    <div class="area-do-input-descricao">
                        <label for="area-da descricao">Escreva uma breve descricao de seu post: </label>
                        <textarea id="inputDaDescricao" required="true" name="descricao" class="input-paragrafo-popup" placeholder=" Digite sua descrição *"></textarea>

                        <div class="avisos-do-texto">
                            <p id="avisoContadorDescricao"></p>
                            <p class="contador" id="contadorDescricao"></p>
                        </div>
                    </div>
                </div>
                <div class="area-do-input-paragrafo">
                    <label for="area-de-texto">Conteudo: </label>
                    <textarea required="true" id="inputDoParagrafo" name="texto" class="input-paragrafo-popup" placeholder=" Digite seu Conteudo *"></textarea>
                    <div class="avisos-do-texto">
                        <p id="avisoContadorParagrafo"></p>
                        <p class="contador" id="contadorParagrafo"></p>
                    </div>
                </div>


                <div class=imagem-popup>
                    <button class="botao-adiciona-foto" type="button">
                        <label class="local-de-input-foto">
                            <p>Adicionar Foto * </p>
                            <ion-icon name="cloud-upload-outline"></ion-icon>
                            <input type="file" id="file" name="imagem" multiple class="input-file" style="display: none;" />
                        </label>
                    </button>
                </div>
                <p id="avisoContadorFoto"></p>
                
                <div class="parte-inferior">
                    <button class="botao-construtivo" id="botaoCriarPost" type="submit">Criar</button>
                    <button onclick="fecharModal('modalCriar')" class="botao-destrutivo" type="button" id="botao-cancelar">Cancelar</button>
                </div>
            </div>
    </form>
</div>