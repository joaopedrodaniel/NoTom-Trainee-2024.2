document.getElementById("open_btn").addEventListener("click", function () {
  document.getElementById("sidebar").classList.toggle("open-sidebar");
});

// ativo do item da url atual
const currentPath = window.location.pathname;
const sideItems = document.querySelectorAll(".side-item");

sideItems.forEach((item) => {
  const link = item.querySelector("a");
  if (link.getAttribute("href") === currentPath) {
    item.classList.add("active");
  }

  // altera entre os itens ao clicar
  item.addEventListener("click", () => {
    sideItems.forEach((i) => i.classList.remove("active"));
    item.classList.add("active");
  });
});
