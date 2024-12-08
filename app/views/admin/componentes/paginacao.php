<nav aria-label="Page navigation example">
  <ul class="paginacao">

    <li class="paginacao-elemento paginacao-icone"<?= $page <= 1 ? "disabled" : "" ?>>
      <a  href="?paginacaoNumero=<?= $page - 1 ?>">
      <ion-icon name="caret-back-outline"></ion-icon> </a>
    </li>

    <?php for ($page_number = 1; $page_number <= $total_pages; $page_number++): ?>
      <li class="<?=$page_number == $page ? 'paginacao-elemento paginacao-elemento-atual' : 'paginacao-elemento' ?>"><a href="?paginacaoNumero=<?= $page_number ?>"><?= $page_number ?></a></li>    
      <?php endfor; ?>

    <li class="paginacao-elemento paginacao-icone"<?= $page >= $total_pages ? "disabled" : "" ?>>
      <a  href="?paginacaoNumero=<?= $page + 1 ?>">
      <ion-icon name="caret-forward-outline"></ion-icon> </a>
    </li>

  </ul>
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</nav>