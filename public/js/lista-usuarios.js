const accordions = document.querySelectorAll(".accordion");
const tableContainer = document.querySelector(".table-container");
const table = tableContainer.querySelector("table");

const mudarChevron = (accordion) => {
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
};
accordions.forEach((accordion) => {
  accordion.addEventListener("click", () => {
    mudarChevron(accordion);
    if (table.classList.contains("responsividade-1")) {
      accordion.classList.toggle("open-accordion");
      const panel = accordion.nextElementSibling;
      panel.classList.toggle("hidden-content");
      panel.classList.toggle("display-content");
    }
  });
});

const checarSeTableTransborda = () => {
  const hasHorizontalScroll =
    tableContainer.scrollWidth > tableContainer.clientWidth;
  console.log(hasHorizontalScroll);
  console.log(tableContainer.clientWidth, tableContainer.scrollWidth);
  if (!hasHorizontalScroll) {
    table.classList.remove("responsividade-1");

    table.querySelectorAll(".celula-acoes").forEach((celula) => {
      celula.classList.remove("hidden");
    });
    table.querySelectorAll(".celula-icone").forEach((celula) => {
      celula.classList.add("hidden");
    });
    if (tableContainer.scrollWidth > tableContainer.clientWidth) {
      table.classList.add("responsividade-1");
      table.querySelectorAll(".celula-acoes").forEach((celula) => {
        celula.classList.add("hidden");
      });
      table.querySelectorAll(".celula-icone.hidden").forEach((celula) => {
        celula.classList.remove("hidden");
      });
      accordions.forEach((accordion) => {
        if (accordion.classList.contains("open-accordion")) {
          mudarChevron(accordion);
        }
      });
    }
    accordions.forEach((accordion) => {
      accordion.classList.remove("open-accordion");
      const panel = accordion.nextElementSibling;
      panel.classList.add("hidden-content");
      panel.classList.remove("display-content");
    });
  }
  if (hasHorizontalScroll && !table.classList.contains("reponsividade-1")) {
    table.classList.add("responsividade-1");
    table.querySelectorAll(".celula-acoes").forEach((celula) => {
      celula.classList.add("hidden");
    });
    table.querySelectorAll(".celula-icone.hidden").forEach((celula) => {
      celula.classList.remove("hidden");
    });
  }
};

window.addEventListener("resize", () => {
  checarSeTableTransborda();
});
