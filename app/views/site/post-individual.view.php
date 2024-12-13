<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../../../public/css/post-individual.css" />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Lobster&display=swap"
    />

    <title>Post Individual</title>
  </head>

  <body>
    <div class="container">
      <div class="esquerda">
        <div class="header">
          <div class="imagem">
            <img src="<?= '/' . $post->imagem ?>"
            alt="Imagem de Teste">
          </div>
          <div class="titulo"><?= $post->titulo ?></div>
        </div>
      </div>
      <div class="direita">
        <div class="mid">
          <div class="descricao"><?= $post->descricao ?></div>
          <div class="texto"><?= $post->texto ?></div>
        </div>
        <div class="footer">
          <?php 
              $autor = null;
              foreach ($usuarios as $usuario) {
                  if ($usuario->id == $post->id_autor) {
                      $autor = $usuario->nome;
                      break;
                  }
              }
          ?>
          <div class="autor">Nome do Autor: <?= $autor ?></div>
          <div class="data">Data da Postagem: <?= date_format(new DateTime($post->criado_em), 'd/m/Y'); ?></div>
        </div>
      </div>
    </div>
  </body>
</html>
