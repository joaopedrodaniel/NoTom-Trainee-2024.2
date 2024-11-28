<nav aria-label="Page navigation example">
  <ul class="paginacao">

    <li class="paginacao-elemento ">
      <a class="paginacao-elemento" href="?paginacaoNumero=<? $page - 1 ?>">
        < </a>
    </li>

    <?php for ($page_number = 1; $page_number <= $total_pages; $page_number++): ?>

      <li class="paginacao-elemento"><a href="?paginacaoNumero=<?= $page_number ?>"><?= $page_number ?></a></li>

    <?php endfor; ?>

    <li class="paginacao-elemento">

      <a class="paginacao-elemento" href="?paginacaoNumero=<?php $page + 1 ?>">></a></li>

  </ul>

</nav>