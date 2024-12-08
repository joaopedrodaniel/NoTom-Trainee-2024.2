document.getElementById("open_btn").addEventListener("click", function () {
  document.getElementById("sidebar").classList.toggle("open-sidebar");
});

const sideItems = document.querySelectorAll(".side-item");

sideItems.forEach((item) => {
  item.addEventListener("click", () => {
    sideItems.forEach((i) => i.classList.remove("active"));

    item.classList.add("active");
  });
});
