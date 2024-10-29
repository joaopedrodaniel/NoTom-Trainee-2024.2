let ultimoScrollY = window.scrollY;
const titulo = document.querySelector(".titulo");
const barraBuscaContainer = document.querySelector(".barra-busca-container");
const iconeLupa = document.querySelector(
  '.barra-busca ion-icon[name="search-outline"]'
);
const iconeX = document.querySelector(
  '.barra-busca ion-icon[name="close-outline"]'
);
const buscaInput = barraBuscaContainer.querySelector("#busca-input");

window.addEventListener("scroll", () => {
  if (window.scrollY >= 135) {
    barraBuscaContainer.classList.remove(
      "barra-busca-container-com-espaco-para-titulo"
    );
    barraBuscaContainer.classList.add("barra-busca-container-fixa");
    titulo.classList.add("barra-busca-container-fixa-titulo");
  } else {
    if (
      window.scrollY < 90 &&
      barraBuscaContainer.classList.contains("barra-busca-container-fixa")
    ) {
      barraBuscaContainer.classList.add(
        "barra-busca-container-com-espaco-para-titulo"
      );
    }
    if (window.scrollY < 55) {
      barraBuscaContainer.classList.remove(
        "barra-busca-container-com-espaco-para-titulo"
      );
      barraBuscaContainer.classList.remove("barra-busca-container-fixa");
      titulo.classList.remove("barra-busca-container-fixa-titulo");
    }
  }
  if (window.scrollY > ultimoScrollY) {
    barraBuscaContainer.classList.add("barra-busca-escondida");
  } else {
    barraBuscaContainer.classList.remove("barra-busca-escondida");
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
