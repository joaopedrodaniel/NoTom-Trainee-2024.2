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
      if (table.classList.contains("responsividade-2")) {
        panel1.classList.toggle("hidden-content");
        panel1.classList.toggle("display-content");
      }

      panel2.classList.toggle("hidden-content");
      panel2.classList.toggle("display-content");
    }
  });
});

const checarSeTableTransborda = () => {
  const hasHorizontalScroll =
    tableContainer.scrollWidth > tableContainer.clientWidth;
  console.log(hasHorizontalScroll);
  console.log(tableContainer.clientWidth, tableContainer.scrollWidth);
  if (!hasHorizontalScroll && table.classList.contains("responsividade-2")) {
    table.classList.remove("responsividade-2");
    if (tableContainer.scrollWidth > tableContainer.clientWidth) {
      table.classList.add("responsividade-2");
    } else {
      table.querySelectorAll(".linha-email").forEach((tr) => {
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
        if (table.classList.contains("responsividade-2")) {
          panel1.classList.add("hidden-content");
          panel1.classList.remove("display-content");
        }

        panel2.classList.add("hidden-content");
        panel2.classList.remove("display-content");
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
      if (accordion.classList.contains("open-accordion")) {
        panel1.classList.remove("hidden-content");
        panel1.classList.add("display-content");
      }
    });
  }
};

window.addEventListener("resize", () => {
  checarSeTableTransborda();
});

setTimeout(checarSeTableTransborda, 100);

// Contador Java Script

// Nome
var inputNome = document.getElementById("input-nome");
var avisoNome = document.getElementById("aviso-nome");
var contadorNome = document.getElementById("contador-nome");
var limiteNome = 50;

contadorNome.textContent = "0/" + limiteNome;
contadorNome.style.color = "#ff0000";

inputNome.addEventListener("input", function () {
  var tamanhoNome = inputNome.value.length;
  contadorNome.textContent = tamanhoNome + "/" + limiteNome;

  if (tamanhoNome > limiteNome || tamanhoNome === 0) {
    contadorNome.style.color = "#ff0000";
    if (tamanhoNome === 0) {
      avisoNome.textContent = "O Nome não pode ficar vazio*";
    } else {
      avisoNome.textContent = "O Tamanho Máximo do Nome é de 50 Caracteres*";
    }
  } else {
    contadorNome.style.color = "#737373";
    avisoNome.textContent = "";
  }
});

// Email
var inputEmail = document.getElementById("email");
var avisoEmail = document.getElementById("aviso-email");

inputEmail.addEventListener("input", function () {
  var email = inputEmail.value;
  var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

  if (!emailRegex.test(email)) {
    avisoEmail.textContent = "Formato de e-mail inválido*";
    avisoEmail.style.color = "#ff0000";
  } else {
    avisoEmail.textContent = "";
  }
});

// Senha
var inputSenha = document.getElementById("senha");
var avisoSenha = document.getElementById("aviso-senha");
var contadorSenha = document.getElementById("contador-senha");
var limiteSenha = 20;

contadorSenha.textContent = "0/" + limiteSenha;
contadorSenha.style.color = "#ff0000";

inputSenha.addEventListener("input", function () {
  var tamanhoSenha = inputSenha.value.length;
  contadorSenha.textContent = tamanhoSenha + "/" + limiteSenha;

  if (tamanhoSenha > limiteSenha || tamanhoSenha === 0) {
    contadorSenha.style.color = "#ff0000";
    if (tamanhoSenha === 0) {
      avisoSenha.textContent = "A Senha não pode ficar vazia*";
    } else {
      avisoSenha.textContent = "O Tamanho Máximo da Senha é de 20 Caracteres*";
    }
  } else {
    contadorSenha.style.color = "#737373";
    avisoSenha.textContent = "";
  }
});
