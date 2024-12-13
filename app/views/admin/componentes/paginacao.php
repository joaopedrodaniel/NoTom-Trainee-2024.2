<nav aria-label="Page navigation example">
  <ul class="paginacao">


<!-- Esta secao contem so duas variaveis importantes, $page = página em que você se encontra agora, -->
<!-- e $total_paages = total de páginas,  caso precise modificar algo, fique atento aos dois        -->
<!---------------------------------------------------------------------------------------------------->


 <!-- Botão de recuar uma pagina -->

    <li class="paginacao-elemento paginacao-icone"<?= $page <= 1 ? "disabled" : "" ?>>
      <a  href="?paginacaoNumero=<?= $page - 1 ?>">
      <ion-icon name="caret-back-outline"></ion-icon> </a>
    </li>
<!----------------------------->


 <!-- A lógica é, a paginação vai mostrar sempre 7 páginas (numero arbitrário). Caso tenhamos mais de 7 páginas,    -->
 <!-- o programa ira mostrar apenas a primeira, as duas anteriores, a atual,as próximas duas e a última. Nas        -->
 <!-- pontas, esta lógica se dobra, a fim de sempre terem 7 páginas da tela, a primeira de todase a ultima de todas -->
 <!------------------------------------------------------------------------------------------------------------------->
 <!--verifica se tem mais de 6 páginas, usa dois ifs para saber se tá nas pontas (se tiver adiciona o três pontinhos 
 e o numero), e mostra os dois últimos itens e os dois próximos                                                     -->
  <!-- Se tivermos mais de 6 páginas -->
    <?php if ($total_pages > 6): ?>
        <!-- Se a pagina atual for maior que a 3 -->

        <?php if ($page < 3): ?>
        <li class="paginacao-elemento"><a href="?paginacaoNumero=1"></a></li>
        <?php endif; ?>

      <?php if ($page > 3): ?>
        <li class="paginacao-elemento"><a href="?paginacaoNumero=1">1</a></li>
        <li class="paginacao-elemento">...</li>
      <?php endif; ?>

      <?php for ($page_number = max(1, $page - 2); $page_number <= min($total_pages, $page + 2); $page_number++): ?>
        <li class="<?=$page_number == $page ? 'paginacao-elemento paginacao-elemento-atual' : 'paginacao-elemento' ?>">
          <a href="?paginacaoNumero=<?= $page_number ?>"><?= $page_number ?></a></li>
      <?php endfor; ?>

      <?php if ($page < $total_pages - 2): ?>
        <li class="paginacao-elemento">...</li>
        <li class="paginacao-elemento"><a href="?paginacaoNumero=<?= $total_pages ?>"><?= $total_pages ?></a></li>
      <?php endif; ?>


    <?php else: ?>
      <?php for ($page_number = 1; $page_number <= $total_pages; $page_number++): ?>
        <li class="<?=$page_number == $page ? 'paginacao-elemento paginacao-elemento-atual' : 'paginacao-elemento' ?>">
          <a href="?paginacaoNumero=<?= $page_number ?>"><?= $page_number ?></a></li>
      <?php endfor; ?>
    <?php endif; ?>
<!----------------------------->

 <!-- Botão de avançar uma pagina -->
    <li class="paginacao-elemento paginacao-icone"<?= $page >= $total_pages ? "disabled" : "" ?>>
      <a  href="?paginacaoNumero=<?= $page + 1 ?>">
      <ion-icon name="caret-forward-outline"></ion-icon> </a>
    </li>
<!----------------------------->


  </ul>
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</nav>