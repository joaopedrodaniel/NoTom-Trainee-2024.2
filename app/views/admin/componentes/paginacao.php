<nav aria-label="Page navigation example">
  <ul class="paginacao">


    <a class="paginacao-elemento" href="?paginacaoNumero=<?= $page_number ?>">
      < </a>
        <li>
          <?php for ($page_number = 1; $page_number <= $total_pages; $page_number++): ?>
        <li class="paginacao-elemento">
          <a href="?paginacaoNumero=<?= $page_number ?>">
            <?= $page_number ?>
          </a>
        </li>
      <?php endfor; ?>

      <a class="paginacao-elemento" href="?paginacaoNumero=<?= $page_number+1?>"> > </a></li>
  </ul>
</nav>