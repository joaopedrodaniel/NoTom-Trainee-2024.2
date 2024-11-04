// Aperta botao = Abre o Modal Separado:

//Verificar erros/bugs com Scrum em uma data futura

//Muito provavelmente deve ter como fazer as 4 funções abaixo em uma so, verificar novamente no futuro com alguem
function abirModalCriar(modalCriar){
  document.getElementById(modalCriar).style.display = "flex";
}

function fecharModalCriar(modalCriar){
  document.getElementById(modalCriar).style.display = "none";
}

function abirModalExcluir(modalExcluir){
  document.getElementById(modalExcluir).style.display = "flex";
}

function fecharModalExcluir(modalExcluir){
  document.getElementById(modalExcluir).style.display = "none";
}


// Acordeao tabela
const accordions = document.querySelectorAll(".accordion");
accordions.forEach((accordion) => {
  accordion.addEventListener("click", () => {
    if (accordion.classList.contains("open-accordion")) {
      const cell = accordion.querySelector(".celula-icone");
      const cellDiv = cell.querySelector(".center-div");
      cellDiv.innerHTML = "";
      const icon = document.createElement("ion-icon");
      icon.setAttribute("name", "chevron-down-outline");
      cellDiv.appendChild(icon);
    } else {
      const cell = accordion.querySelector(".celula-icone");
      const cellDiv = cell.querySelector(".center-div");
      cellDiv.innerHTML = "";
      const icon = document.createElement("ion-icon");
      icon.setAttribute("name", "chevron-up-outline");
      cellDiv.appendChild(icon);
    }
    accordion.classList.toggle("open-accordion");
    const panel = accordion.nextElementSibling;
    panel.classList.toggle("hidden-content");
    panel.classList.toggle("display-content");
  });
});

