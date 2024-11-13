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
    if (!table.classList.contains("responsividade-1")) {
      return;
    }
    mudarChevron(accordion);
    if (table.classList.contains("responsividade-1")) {
      accordion.classList.toggle("open-accordion");
      const panel1 = accordion.nextElementSibling;
      const panel2 = panel1.nextElementSibling;
      const panel3 = panel2.nextElementSibling;
      if (table.classList.contains("responsividade-2")) {
        panel1.classList.toggle("hidden-content");
        panel1.classList.toggle("display-content");
        panel2.classList.toggle("hidden-content");
        panel2.classList.toggle("display-content");
      }

      panel3.classList.toggle("hidden-content");
      panel3.classList.toggle("display-content");
    }
  });
});

const checarSeTableTransborda = () => {
  const hasHorizontalScroll =
    tableContainer.scrollWidth > tableContainer.clientWidth;
  if (!hasHorizontalScroll && table.classList.contains("responsividade-2")) {
    table.classList.remove("responsividade-2");
    if (tableContainer.scrollWidth > tableContainer.clientWidth) {
      table.classList.add("responsividade-2");
    } else {
      table.querySelectorAll(".linha-responsiva").forEach((tr) => {
        tr.classList.add("hidden-content");
      });
    }
  }
  if (!hasHorizontalScroll && !table.classList.contains("responsividade-2")) {
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
    } else {
      accordions.forEach((accordion) => {
        if (accordion.classList.contains("open-accordion")) {
          mudarChevron(accordion);
        }
        accordion.classList.remove("open-accordion");
        const panel1 = accordion.nextElementSibling;
        const panel2 = panel1.nextElementSibling;
        const panel3 = panel2.nextElementSibling;
        if (table.classList.contains("responsividade-2")) {
          panel1.classList.add("hidden-content");
          panel1.classList.remove("display-content");
          panel2.classList.toggle("hidden-content");
          panel2.classList.toggle("display-content");
        }

        panel3.classList.add("hidden-content");
        panel3.classList.remove("display-content");
      });
    }
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
  if (
    tableContainer.scrollWidth > tableContainer.clientWidth &&
    table.classList.contains("responsividade-1")
  ) {
    table.classList.add("responsividade-2");
    accordions.forEach((accordion) => {
      const panel1 = accordion.nextElementSibling;
      const panel2 = panel1.nextElementSibling;
      if (accordion.classList.contains("open-accordion")) {
        panel1.classList.remove("hidden-content");
        panel1.classList.add("display-content");
        panel2.classList.remove("hidden-content");
        panel2.classList.add("display-content");
      }
    });
  }
};

window.addEventListener("resize", () => {
  checarSeTableTransborda();
});

setTimeout(checarSeTableTransborda, 100);

//Java Script Lucas

function abirModal(idModal){
  document.getElementById(idModal).style.display = "flex";
}

function fecharModal(idModal){
  document.getElementById(idModal).style.display = "none";
}