<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="../../../public/css/lista-posts.css" />
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
  <div class="topo" ><?php require 'header.php' ?></div>
    <div class="pagina-lista-posts">
      <h1 class="titulo">Posts</h1>
      <div class="barra-busca-container">
        <div class="barra-busca">
          <input type="text" id="busca-input" placeholder="Buscar post..." />
          <ion-icon name="close-outline"></ion-icon>
          <ion-icon name="search-outline" class="icone-ativo"></ion-icon>
        </div>
      </div>
      <div class="conteudo-central">
        <div class="lista-posts">
          <?php foreach ($posts as $post): $user = App\Core\App::get('database')->select('usuarios', $post->id_autor)[0]; ?>
            <div class="post">
            <img src=<?=$post->imagem ?> alt="" />
            <div class="post-texto">
              <div class="post-conteudo">
                <div class="post-titulo"><?=$post->titulo ?></div>
                <div class="post-conteudo-texto">
                  <?=$post->descricao?>
                </div>
              </div>
              <div class="post-conteudo-texto">Por: <?=$user->nome ?></div>
            </div>
            </div>
          <?php endforeach; ?>
          
          
          
          
        </div>
        <?php require 'componentes/publicPostsPaginacao.php' ?>
      </div>
    </div>
    <div class="teste1234"><?php require 'footer.php' ?></div>  
    <script
      type="module"
      src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"
    ></script>
    <script
      nomodule
      src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"
    ></script>
    <script src="../../../public/js/barra-busca.js"></script>
  </body>
</html>