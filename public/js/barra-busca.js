const verificaTamanhoTelaParaAjustarBarraBusca = () => {
  const barraBusca = document.querySelector(".barra-busca");
  const iconeLupa = barraBusca.querySelector('[name="search-outline"]');
  if (window.innerWidth <= 1172) {
    iconeLupa.classList.add("barra-busca-dinamica");
    return;
  }
  iconeLupa.classList.remove("barra-busca-dinamica");
  const iconeX = barraBusca.querySelector('[name="close-outline"]');
  if (iconeX) {
    iconeX.remove();
    barraBusca.classList.remove("barra-busca-aberta");
    iconeLupa.classList.remove("barra-busca-aberta");
  }
};

document
  .querySelector(".barra-busca ion-icon")
  .addEventListener("click", () => {
    const barraBusca = document.querySelector(".barra-busca");
    const iconeLupa = barraBusca.querySelector(
      '[name="search-outline"].barra-busca-dinamica'
    );
    if (iconeLupa && !iconeLupa.classList.contains("barra-busca-aberta")) {
      barraBusca.classList.toggle("barra-busca-aberta");
      const input = barraBusca.querySelector("input");
      input.classList.toggle("barra-busca-aberta");
      iconeLupa.classList.toggle("barra-busca-aberta");
      const iconeX = document.createElement("ion-icon");
      iconeX.setAttribute("name", "close-outline");
      iconeX.addEventListener("click", () => {
        barraBusca.classList.remove("barra-busca-aberta");
        iconeLupa.classList.remove("barra-busca-aberta");
        iconeX.remove();
      });

      barraBusca.appendChild(iconeX);
    }
  });

verificaTamanhoTelaParaAjustarBarraBusca();
window.addEventListener("resize", verificaTamanhoTelaParaAjustarBarraBusca);
