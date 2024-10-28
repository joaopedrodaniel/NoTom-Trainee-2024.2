const accordions = document.querySelectorAll(".accordion");
accordions.forEach((accordion) => {
  accordion.addEventListener("click", () => {
    if (accordion.classList.contains("open-accordion")) {
      const cell = accordion.querySelector(".celula-icone");
      cell.innerHTML = "";
      const icon = document.createElement("ion-icon");
      icon.setAttribute("name", "chevron-down-outline");
      cell.appendChild(icon);
    } else {
      const cell = accordion.querySelector(".celula-icone");
      cell.innerHTML = "";
      const icon = document.createElement("ion-icon");
      icon.setAttribute("name", "chevron-up-outline");
      cell.appendChild(icon);
    }
    accordion.classList.toggle("open-accordion");
    const panel = accordion.closest("tr").nextElementSibling;
    panel.classList.toggle("hidden-content");
    panel.classList.toggle("display-content");
  });
});
