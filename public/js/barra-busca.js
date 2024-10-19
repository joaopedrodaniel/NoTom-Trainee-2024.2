const verificaTamanhoTelaParaAjustarBarraBusca = () => {
  const barraBusca = document.querySelector(".barra-busca");
  const iconeLupa = barraBusca.querySelector('[name="search-outline"]');
  if (window.innerWidth <= 1172) {
    iconeLupa.classList.add("barra-busca-dinamica");
    return;
  }
  iconeLupa.classList.remove("barra-busca-dinamica");
  const iconeRetornar = barraBusca.querySelector('[name="arrow-back-outline"]');
  if (iconeRetornar) {
    iconeRetornar.remove();
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
      const iconeRetornar = document.createElement("ion-icon");
      iconeRetornar.setAttribute("name", "arrow-back-outline");
      iconeRetornar.addEventListener("click", () => {
        barraBusca.classList.remove("barra-busca-aberta");
        iconeLupa.classList.remove("barra-busca-aberta");
        iconeRetornar.remove();
      });

      barraBusca.appendChild(iconeRetornar);
    }
  });

verificaTamanhoTelaParaAjustarBarraBusca();
window.addEventListener("resize", verificaTamanhoTelaParaAjustarBarraBusca);
