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
var inputNome = document.querySelector('[data-type="input-usuario"]');
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
      avisoNome.style.color = "#ff0000";
    } else {
      avisoNome.textContent = "O Tamanho Máximo é de 50 Caracteres*";
      avisoNome.style.color = "#ff0000";
    }
  } else {
    contadorNome.style.color = "#737373";
    avisoNome.textContent = "";
  }
});

// Email
var inputEmail = document.querySelector('[data-type="input-email"]');
var avisoEmail = document.getElementById("aviso-email");

inputEmail.addEventListener("input", function () {
  var email = inputEmail.value;
  var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

  if (!emailRegex.test(email)) {
    avisoEmail.textContent = "Formato de e-mail inválido*";
    avisoEmail.style.color = "#ff0000";
  } else {
    avisoEmail.textContent = "";

    fetch("/usuario/verificar-email", {
      method: "POST",
      headers: {
        "Content-Type": "application/x-www-form-urlencoded",
      },
      body: `email=${encodeURIComponent(email)}`,
    })
      .then((response) => response.json())
      .then((data) => {
        if (data.status === "exists") {
          avisoEmail.textContent = "Email já cadastrado*";
          avisoEmail.style.color = "#ff0000";
        } else if (data.status === "available") {
          avisoEmail.textContent = "Email disponível!";
          avisoEmail.style.color = "#00ff00";
        }
      })
      .catch((error) => {
        console.error("Erro na verificação de email:", error);
        avisoEmail.textContent = "Erro ao verificar email.";
        avisoEmail.style.color = "#ff0000";
      });
  }
});

// Senha
var inputSenha = document.querySelector('[data-type="input-senha"]');
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
      avisoSenha.style.color = "#ff0000";
    } else {
      avisoSenha.textContent = "O Tamanho Máximo é de 20 Caracteres*";
      avisoSenha.style.color = "#ff0000";
    }
  } else {
    contadorSenha.style.color = "#737373";
    avisoSenha.textContent = "";
  }
  console.log("Input Nome:", document.getElementById("input-nome"));
  console.log("Aviso Nome:", document.getElementById("aviso-nome"));
  console.log("Contador Nome:", document.getElementById("contador-nome"));
});

// contador para o modal de editar

document.addEventListener("DOMContentLoaded", function () {
  const modaisEdicao = document.querySelectorAll(".modal.edicao"); //pega e implementa em todos modais

  modaisEdicao.forEach((modal) => {
    //aplica pra todos modais

    // Nome
    var inputNomeEdicao = modal.querySelector('[data-type="nome"]');
    var avisoNomeEdicao = modal.querySelector(
      "#" + inputNomeEdicao.getAttribute("id").replace("input", "aviso")
    );
    var contadorNomeEdicao = modal.querySelector(
      "#" + inputNomeEdicao.getAttribute("id").replace("input", "contador")
    );
    var limiteNome = 50;

    if (contadorNomeEdicao) {
      contadorNomeEdicao.textContent = "0/" + limiteNome;
      contadorNomeEdicao.style.color = "#ff0000";
    }

    if (inputNomeEdicao) {
      var tamanhoNome = inputNomeEdicao.value.length;
      contadorNomeEdicao.textContent = tamanhoNome + "/" + limiteNome;

      if (tamanhoNome > limiteNome || tamanhoNome === 0) {
        contadorNomeEdicao.style.color = "#ff0000";
        avisoNomeEdicao.textContent =
          tamanhoNome === 0
            ? "O Nome não pode ficar vazio*"
            : "O Tamanho Máximo do Nome é de 50 Caracteres*";
            avisoNomeEdicao.style.color = "#ff0000";
      } else {
        contadorNomeEdicao.style.color = "#737373";
        avisoNomeEdicao.textContent = "";
      }
      inputNomeEdicao.addEventListener("input", function () {
        var tamanhoNome = inputNomeEdicao.value.length;
        contadorNomeEdicao.textContent = tamanhoNome + "/" + limiteNome;

        if (tamanhoNome > limiteNome || tamanhoNome === 0) {
          contadorNomeEdicao.style.color = "#ff0000";
          avisoNomeEdicao.textContent =
            tamanhoNome === 0
              ? "O Nome não pode ficar vazio*"
              : "O Tamanho Máximo do Nome é de 50 Caracteres*";
              avisoNomeEdicao.style.color = "#ff0000";
        } else {
          contadorNomeEdicao.style.color = "#737373";
          avisoNomeEdicao.textContent = "";
        }
      });
    }

    // Email
    var inputEmailEdicao = modal.querySelector('[data-type="email"]');
    var avisoEmailEdicao = modal.querySelector(
      "#" + inputEmailEdicao.getAttribute("id").replace("input", "aviso")
    );

    if (inputEmailEdicao) {
      inputEmailEdicao.addEventListener("input", function () {
        var email = inputEmailEdicao.value;
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        if (!emailRegex.test(email)) {
          avisoEmailEdicao.textContent = "Formato de e-mail inválido*";
          avisoEmailEdicao.style.color = "#ff0000";
        } else {
          avisoEmailEdicao.textContent = "";

          fetch("/usuario/verificar-email", {
            method: "POST",
            headers: {
              "Content-Type": "application/x-www-form-urlencoded",
            },
            body: `email=${encodeURIComponent(email)}`,
          })
            .then((response) => response.json())
            .then((data) => {
              if (data.status === "exists") {
                avisoEmailEdicao.textContent = "Email já cadastrado*";
                avisoEmailEdicao.style.color = "#ff0000";
              } else if (data.status === "available") {
                avisoEmailEdicao.textContent = "Email disponível!";
                avisoEmailEdicao.style.color = "#00ff00";
              }
            })
            .catch((error) => {
              console.error("Erro na verificação de email:", error);
              avisoEmailEdicao.textContent = "Erro ao verificar email.";
              avisoEmailEdicao.style.color = "#ff0000";
            });
        }
      });
    }

    // Senha
    var inputSenhaEdicao = modal.querySelector('[data-type="senha"]');
    var avisoSenhaEdicao = modal.querySelector(
      "#" + inputSenhaEdicao.getAttribute("id").replace("input", "aviso")
    );
    var contadorSenhaEdicao = modal.querySelector(
      "#" + inputSenhaEdicao.getAttribute("id").replace("input", "contador")
    );
    var limiteSenha = 20;

    if (contadorSenhaEdicao) {
      contadorSenhaEdicao.textContent = "0/" + limiteSenha;
      contadorSenhaEdicao.style.color = "#ff0000";
    }

    if (inputSenhaEdicao) {
      inputSenhaEdicao.addEventListener("input", function () {
        var tamanhoSenha = inputSenhaEdicao.value.length;
        contadorSenhaEdicao.textContent = tamanhoSenha + "/" + limiteSenha;

        if (tamanhoSenha > limiteSenha || tamanhoSenha === 0) {
          contadorSenhaEdicao.style.color = "#ff0000";
          avisoSenhaEdicao.textContent =
            tamanhoSenha === 0
              ? "A Senha não pode ficar vazia*"
              : "O Tamanho Máximo da Senha é de 20 Caracteres*";
        } else {
          contadorSenhaEdicao.style.color = "#737373";
          avisoSenhaEdicao.textContent = "";
        }
      });
    }
  });
});
