const tela = document.querySelector(".tela");

function abrirModal(idModal) {
  document.getElementById(idModal).style.display = "block";
  tela.style.display = "block";
}

function fecharModal(idModal) {
  document.getElementById(idModal).style.display = "none";
  tela.style.display = "none";
}
