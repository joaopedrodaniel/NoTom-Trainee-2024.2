let ultimoScrollY = window.scrollY;
const barraBusca = document.querySelector(".barra-busca-container");
const iconeLupa = document.querySelector(
  '.barra-busca ion-icon[name="search-outline"]'
);
const iconeX = document.querySelector(
  '.barra-busca ion-icon[name="close-outline"]'
);
const buscaInput = barraBusca.querySelector("#busca-input");

window.addEventListener("scroll", () => {
  if (window.scrollY > ultimoScrollY) {
    barraBusca.classList.add("barra-busca-escondida");
  } else {
    barraBusca.classList.remove("barra-busca-escondida");
  }
  ultimoScrollY = window.scrollY;
});

iconeLupa.addEventListener("click", () => {
  iconeX.classList.add("icone-ativo");
});

iconeX.addEventListener("click", () => {
  if (iconeX.classList.contains("icone-ativo")) {
    iconeX.classList.remove("icone-ativo");
    buscaInput.value = "";
  }
});
