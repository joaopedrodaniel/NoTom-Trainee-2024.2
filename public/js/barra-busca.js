let ultimoScrollY = window.scrollY;
const barraBusca = document.querySelector(".barra-busca-container");

window.addEventListener("scroll", () => {
  if (window.scrollY > ultimoScrollY) {
    barraBusca.classList.add("barra-busca-escondida");
  } else {
    barraBusca.classList.remove("barra-busca-escondida");
  }
  ultimoScrollY = window.scrollY;
});
