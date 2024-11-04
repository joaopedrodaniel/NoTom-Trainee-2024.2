const accordions = document.querySelectorAll(".accordion");
const tableContainer = document.querySelector(".table-container");
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

const checarSeTableTransborda = () => {
  const hasHorizontalScroll =
    tableContainer.scrollWidth > tableContainer.clientWidth;
  console.log(hasHorizontalScroll);
};

window.addEventListener("resize", checarSeTableTransborda);

checarSeTableTransborda();
