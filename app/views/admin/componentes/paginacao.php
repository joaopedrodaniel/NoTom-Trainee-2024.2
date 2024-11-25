
<nav aria-label="Page navigation example">
  <ul class="paginacao">

    <li class="paginacao-elemento <?= $page <= 1 ? "disabled" : "" ?>">
      <a class="paginacao-elemento" href="?paginacaoNumero=<? $page - 1 ?>"> < </a></li>

    <?php for ($page_number = 1; $page_number <= $total_pages; $page_number++): ?>
      <li class="paginacao-elemento <?= $page_number == $page ? "active" : "" ?>"><a class="paginacao-elemento" href="?paginacaoNumero=<?= $page_number ?>"></a></li>
    <?php endfor; ?>

    <li class="paginacao-elemento <?= $page <= 1 ? "disabled" : "" ?>">
      <a class="paginacao-elemento" href="?paginacaoNumero=<? $page + 1 ?>">></a></li>
  </ul>
</nav>