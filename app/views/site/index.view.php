<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="../../../public/css/lista-usuarios.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Lobster&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto&display=swap"
      rel="stylesheet"
    />
  </head>
  <body>
    <div class="tela"></div>
    <div class="pagina-lista-usuarios">
      <h1 class="titulo texto-branco">Usuários</h1>
      <div id="div-botao-criar-usuario">
        <button class="botao-construtivo" onclick="abrirModal('criacao')">
          <ion-icon name="add-outline"></ion-icon>
        </button>
      </div>
      <div class="table-container">
        <table>
          <thead>
            <tr>
              <th>ID</th>
              <th>Nome</th>
              <th class="coluna-email">Email</th>
              <th>
                <div class="center-div">
                  <ion-icon name="settings-outline"></ion-icon>
                </div>
              </th>
            </tr>
          </thead>
          <tbody>
          <?php foreach($usuarios as $usuario): ?>
            <tr class="accordion">
              <td><?= $usuario->id ?></td>
              <td><?= $usuario->nome ?></td>
              <td class="coluna-email"><?= $usuario->email ?></td>
              <td class="celula-icone hidden">
                <div class="center-div">
                  <ion-icon name="chevron-down-outline"></ion-icon>
                </div>
              </td>
              <td class="celula-acoes">
                <div class="div-botoes">
                  <button onclick="abrirModal('visualizacao<?= $usuario->id ?>')">
                    <ion-icon name="eye-outline"></ion-icon>
                  </button>
                  <button onclick="abrirModal('edicao<?= $usuario->id ?>')">
                    <ion-icon name="create-outline"></ion-icon>
                  </button>
                  <button
                    class="botao-destrutivo"
                    onclick="abrirModal('excluir<?= $usuario->id ?>')"
                  >
                    <ion-icon name="trash-outline"></ion-icon>
                  </button>
                </div>
              </td>
            </tr>
            <tr class="hidden-content linha-email">
              <td colspan="3">Email: <?= $usuario->email ?></td>
            </tr>
            <tr class="hidden-content">
              <td colspan="4">
                <button onclick="abrirModal('visualizacao<?= $usuario->id ?>')">
                  <ion-icon name="eye-outline"></ion-icon>
                </button>
                <button onclick="abrirModal('edicao<?= $usuario->id ?>')">
                  <ion-icon name="create-outline"></ion-icon>
                </button>
                <button
                  class="botao-destrutivo"
                  onclick="abrirModal('excluir<?= $usuario->id ?>')"
                >
                  <ion-icon name="trash-outline"></ion-icon>
                </button>
              </td>
            </tr>

    <!--Modal visualização-->
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

        <!--Modal edição-->
    <div class="modal edicao" id="edicao<?= $usuario->id ?>" >
      <form method="POST" action="/usuario/editar">
        <h1>Edição</h1>

        <input required="true" type="hidden" name="id" id="usuario-id" value="<?= $usuario->id ?>">

        <label class="titulo-conteudo-modal" for="input-nome">Nome:</label>
        <input required="true" id="input-nome" type="text" name="nome" placeholder="Digite seu nome..." />

        <label class="label-com-margem titulo-conteudo-modal" for="email"
          >E-mail:</label
        >
        <input required="true" id="email" type="email" name="email" placeholder="exemplo@email.com" />

        <label class="label-com-margem titulo-conteudo-modal" for="senha"
          >Senha:</label
        >
        <input required="true" id="senha" type="password" name="senha" placeholder="Digite sua senha..." />
        <div class="modal-botoes">
          <button type="button" class="botao-destrutivo" onclick="fecharModal('edicao<?= $usuario->id ?>')">
            Cancelar
          </button>
          <button class="botao-construtivo">Salvar</button>
        </div>
      </form>
    </div>

        <!--Modal exclusão-->
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
          <button class="botao-destrutivo">Excluir</button>
        </div>
      </form>
    </div>



            <?php endforeach; ?>
          </tbody>
        </table>
      </div>

      <div class="paginacao">
        <a class="paginacao-elemento" href="#"><</a>
        <a class="paginacao-elemento paginacao-elemento-atual" href="#">1</a>
        <a class="paginacao-elemento" href="#">2</a>
        <a class="paginacao-elemento" href="#">3</a>
        <div>...</div>
        <a class="paginacao-elemento" href="#">9</a>
        <a class="paginacao-elemento" href="#">10</a>
        <a class="paginacao-elemento" href="#">></a>
      </div>
    </div>

    <!--Modal criação-->
    <div class="modal criacao" id="criacao">
      <form method="POST" action="/usuario/criacao">
        <h1>Criar usuário</h1>
        <label class="titulo-conteudo-modal" for="input-nome">Nome:</label>
        <input required="true" id="input-nome" name="nome" type="text" placeholder="Digite seu nome..." />

        <label class="label-com-margem titulo-conteudo-modal" for="email"
          >E-mail:</label
        >
        <input required="true" id="email" name="email" type="email" placeholder="exemplo@email.com" />

        <label class="label-com-margem titulo-conteudo-modal" for="senha"
          >Senha:</label
        >
        <input required="true" id="senha" name="senha" type="password" placeholder="Digite sua senha..." />
        <div class="modal-botoes">
          <button type="button" class="botao-destrutivo" onclick="fecharModal('criacao')">
            Cancelar
          </button>
          <button class="botao-construtivo">Criar</button>
        </div>
      </form>
    </div>

    <script
      type="module"
      src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"
    ></script>
    <script
      nomodule
      src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"
    ></script>
    <script src="../../../public/js/lista-usuarios.js"></script>
    <script src="../../../public/js/modals.js"></script>
  </body>
</html>



<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../public/css/landing-page.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Lobster&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Lobster&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <title>No Tom</title>
</head>
<body> 
    
    <div class="container">
        <div class="textos">
            <h1>no tom</h1>
            <h2>Ame e sinta a música <span style="color: rgb(232, 191, 8);">no tom</span> <br> sua vida</h2>
        </div>
        <img src="../../../public/assets/notom.jpeg" class="imagemprincipal" alt="imagem">
        <img src="../../../public/assets/image1.jpg" class="imagemsecundaria" alt="imagem">
   
    </div>
        <div class="slide-container">
            <h2>INFORMAÇÕES SOBRE SEUS <br> ARTISTAS FAVORITOS</h2>
            <h3>Saiba tudo o que seu artista favorito faz e descubra novos talentos da música</h3>
            <div class="slide">
                <div class="carrossel-infinito">
                    <div class="nomeartista"><div class="red"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/09/TIM_MAIA_SONIA_D%27ALMEIDA_1987_%28cropped%29.jpg/640px-TIM_MAIA_SONIA_D%27ALMEIDA_1987_%28cropped%29.jpg"></div><p>Tim Maia</p></div>
                    <div class="nomeartista"><div class="red"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQKHOQiEzQtmQ3-Y77h1OEEbYICuIDjtQV1kA&shttps://upload.wikimedia.org/wikipedia/commons/thumb/0/09/TIM_MAIA_SONIA_D%27ALMEIDA_1987_%28cropped%29.jpg/640px-TIM_MAIA_SONIA_D%27ALMEIDA_1987_%28cropped%29.jpg"></div><p>Chico Buarque</p></div>
                    <div class="nomeartista"><div class="red"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSFuW31n0o5wrEMXV_qWXXKFLLaKBcpsymWEw&s"></div><p>Nirvana</p></div>
                    <div class="nomeartista"><div class="red"><img src="https://musicanobrasil.com.br/wp-content/uploads/2024/03/djavan-album-luz.jpg"></div><p>Djavan</p></div>
                    <div class="nomeartista"><div class="red"><img src="https://musicanobrasil.com.br/wp-content/uploads/2024/01/Rita-Lee-album-Entradas-e-Bandeiras.png"></div><p>Rita Lee</p></div>
                    <div class="nomeartista"><div class="red"><img src="https://lastfm.freetls.fastly.net/i/u/avatar170s/9158138e3ef72dce4d8715e82930dc03"></div><p>Guns n' Roses</p></div>
                    <div class="nomeartista"><div class="red"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQHDda-1fti4NpTtgheGcLE-SfgKZanGgTXpQ&s"></div><p>Charlie Brown Jr.</p></div>
                    <div class="nomeartista"><div class="red"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQHDda-1fti4NpTtgheGcLE-SfgKZanGgTXpQ&s"></div><p>Charlie Brown Jr.</p></div>
                    <div class="nomeartista"><div class="red"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/09/TIM_MAIA_SONIA_D%27ALMEIDA_1987_%28cropped%29.jpg/640px-TIM_MAIA_SONIA_D%27ALMEIDA_1987_%28cropped%29.jpg"></div><p>Tim Maia</p></div>
                    <div class="nomeartista"><div class="red"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQKHOQiEzQtmQ3-Y77h1OEEbYICuIDjtQV1kA&shttps://upload.wikimedia.org/wikipedia/commons/thumb/0/09/TIM_MAIA_SONIA_D%27ALMEIDA_1987_%28cropped%29.jpg/640px-TIM_MAIA_SONIA_D%27ALMEIDA_1987_%28cropped%29.jpg"></div><p>Chico Buarque</p></div>
                    <div class="nomeartista"><div class="red"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSFuW31n0o5wrEMXV_qWXXKFLLaKBcpsymWEw&s"></div><p>Nirvana</p></div>
                    <div class="nomeartista"><div class="red"><img src="https://musicanobrasil.com.br/wp-content/uploads/2024/03/djavan-album-luz.jpg"></div><p>Djavan</p></div>
                    <div class="nomeartista"><div class="red"><img src="https://musicanobrasil.com.br/wp-content/uploads/2024/01/Rita-Lee-album-Entradas-e-Bandeiras.png"></div><p>Rita Lee</p></div>
                    <div class="nomeartista"><div class="red"><img src="https://lastfm.freetls.fastly.net/i/u/avatar170s/9158138e3ef72dce4d8715e82930dc03"></div><p>Guns n' Roses</p></div>
                    <div class="nomeartista"><div class="red"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQHDda-1fti4NpTtgheGcLE-SfgKZanGgTXpQ&s"></div><p>Charlie Brown Jr.</p></div>
                    <div class="nomeartista"><div class="red"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQHDda-1fti4NpTtgheGcLE-SfgKZanGgTXpQ&s"></div><p>Charlie Brown Jr.</p></div>
                    <div class="nomeartista"><div class="red"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQHDda-1fti4NpTtgheGcLE-SfgKZanGgTXpQ&s"></div><p>Charlie Brown Jr.</p></div>
                    <div class="nomeartista"><div class="red"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQHDda-1fti4NpTtgheGcLE-SfgKZanGgTXpQ&s"></div><p>Charlie Brown Jr.</p></div>
               
                </div>
                <div class="carrossel-infinito">
                    <div class="nomeartista"><div class="red"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/09/TIM_MAIA_SONIA_D%27ALMEIDA_1987_%28cropped%29.jpg/640px-TIM_MAIA_SONIA_D%27ALMEIDA_1987_%28cropped%29.jpg"></div><p>Tim Maia</p></div>
                    <div class="nomeartista"><div class="red"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQKHOQiEzQtmQ3-Y77h1OEEbYICuIDjtQV1kA&shttps://upload.wikimedia.org/wikipedia/commons/thumb/0/09/TIM_MAIA_SONIA_D%27ALMEIDA_1987_%28cropped%29.jpg/640px-TIM_MAIA_SONIA_D%27ALMEIDA_1987_%28cropped%29.jpg"></div><p>Chico Buarque</p></div>
                    <div class="nomeartista"><div class="red"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSFuW31n0o5wrEMXV_qWXXKFLLaKBcpsymWEw&s"></div><p>Nirvana</p></div>
                    <div class="nomeartista"><div class="red"><img src="https://musicanobrasil.com.br/wp-content/uploads/2024/03/djavan-album-luz.jpg"></div><p>Djavan</p></div>
                    <div class="nomeartista"><div class="red"><img src="https://musicanobrasil.com.br/wp-content/uploads/2024/01/Rita-Lee-album-Entradas-e-Bandeiras.png"></div><p>Rita Lee</p></div>
                    <div class="nomeartista"><div class="red"><img src="https://lastfm.freetls.fastly.net/i/u/avatar170s/9158138e3ef72dce4d8715e82930dc03"></div><p>Guns n' Roses</p></div>
                    <div class="nomeartista"><div class="red"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQHDda-1fti4NpTtgheGcLE-SfgKZanGgTXpQ&s"></div><p>Charlie Brown Jr.</p></div>
                    <div class="nomeartista"><div class="red"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQHDda-1fti4NpTtgheGcLE-SfgKZanGgTXpQ&s"></div><p>Charlie Brown Jr.</p></div>
                    <div class="nomeartista"><div class="red"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/09/TIM_MAIA_SONIA_D%27ALMEIDA_1987_%28cropped%29.jpg/640px-TIM_MAIA_SONIA_D%27ALMEIDA_1987_%28cropped%29.jpg"></div><p>Tim Maia</p></div>
                    <div class="nomeartista"><div class="red"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQKHOQiEzQtmQ3-Y77h1OEEbYICuIDjtQV1kA&shttps://upload.wikimedia.org/wikipedia/commons/thumb/0/09/TIM_MAIA_SONIA_D%27ALMEIDA_1987_%28cropped%29.jpg/640px-TIM_MAIA_SONIA_D%27ALMEIDA_1987_%28cropped%29.jpg"></div><p>Chico Buarque</p></div>
                    <div class="nomeartista"><div class="red"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSFuW31n0o5wrEMXV_qWXXKFLLaKBcpsymWEw&s"></div><p>Nirvana</p></div>
                    <div class="nomeartista"><div class="red"><img src="https://musicanobrasil.com.br/wp-content/uploads/2024/03/djavan-album-luz.jpg"></div><p>Djavan</p></div>
                    <div class="nomeartista"><div class="red"><img src="https://musicanobrasil.com.br/wp-content/uploads/2024/01/Rita-Lee-album-Entradas-e-Bandeiras.png"></div><p>Rita Lee</p></div>
                    <div class="nomeartista"><div class="red"><img src="https://lastfm.freetls.fastly.net/i/u/avatar170s/9158138e3ef72dce4d8715e82930dc03"></div><p>Guns n' Roses</p></div>
                    <div class="nomeartista"><div class="red"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQHDda-1fti4NpTtgheGcLE-SfgKZanGgTXpQ&s"></div><p>Charlie Brown Jr.</p></div>
                    <div class="nomeartista"><div class="red"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQHDda-1fti4NpTtgheGcLE-SfgKZanGgTXpQ&s"></div><p>Charlie Brown Jr.</p></div>
                    <div class="nomeartista"><div class="red"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQHDda-1fti4NpTtgheGcLE-SfgKZanGgTXpQ&s"></div><p>Charlie Brown Jr.</p></div>
                    <div class="nomeartista"><div class="red"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQHDda-1fti4NpTtgheGcLE-SfgKZanGgTXpQ&s"></div><p>Charlie Brown Jr.</p></div>
               
                </div>
            </div>
        </div>
    </div>

    <div class="descricao_carrossel">
        <h1>VEJA OS POSTS MAIS RECENTES</h1>
        <h3>Aqui você pode acessar os cinco últimos posts feitos pelos usuários</h3>
    </div>

        <?php
       
             $posts = array_slice($posts, -5); 
        ?>
    
    <div class="postagem swiper-container">
       <div class="swiper-button-next"></div>
        <div class="swiper-wrapper">
        <?php foreach($posts as $post): ?>
            <?php 
            $usuario = null;
            foreach($usuarios as $usuario) {
                if ($usuario->id == $post->id_autor) {
                    break;
                }
            }
            ?>
            <div class="swiper-slide">
                <div class="car1">
                <img src="<?= $post->imagem ?>" alt="<?= $post->titulo ?>">
                <h2><?= $post->titulo ?></h2>
                <p class="perfil"><?= $usuario->nome ?></p> 
                <p class="post-texto" id="texto-<?= $post->id ?>" style="font-size: 13px;"><?= $post->texto ?></p>
                <a href="#" class="ver-mais" id="ver-mais-<?= $post->id ?>" onclick="toggleText(<?= $post->id ?>)">Ver Mais</a>
                <a href="post.php?id=<?= $post->id ?>"><button>Ver Mais</button></a>
         </div>
            </div>
                <?php endforeach;?>
        
        </div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-pagination"></div>
    </div>   
    <script src="../../../public/js/landing-page.js"></script>
</body>
</html> 
