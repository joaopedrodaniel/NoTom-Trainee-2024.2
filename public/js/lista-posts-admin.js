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

//Java Script Lucas -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

//Script verificar se escolheu uma foto no criar

var temFotoNoCriar = false;

avisoContadorFoto.textContent = "Você deve escolher uma foto *";
avisoContadorFoto.style.color = "#ff0000";
avisoContadorFoto.style.paddingBottom = "20px";

const inputDeFileNoCriar = document.getElementById("file");

inputDeFileNoCriar.addEventListener("change", () => {
  if (inputDeFileNoCriar.files.length > 0) {
    temFotoNoCriar = true;
    avisoContadorFoto.style.display = "none";
  } else {
    temFotoNoCriar = false;
  }
  verificarBotaoCriarPost();
});

//Java Script logica dos Modais
function abirModal(idModal) {
  document.getElementById(idModal).style.display = "flex";
}

function fecharModal(idModal) {
  document.getElementById(idModal).style.display = "none";
}

//Java Script Contador

//Titulo

var meuTextoTitulo = document.getElementById("inputTitulo");
var resultadoTitulo = document.getElementById("contadorTitulo");
var limiteTitulo = 75;
var verdadeTitulo = false;
var verdadeDescricao = false;
var verdadeParagrafo = false;

botaoCriarPost.style.display = "none";

resultadoTitulo.textContent = 0 + "/" + limiteTitulo;
resultadoTitulo.style.color = "#ff0000";

meuTextoTitulo.addEventListener("input", function () {
  var tamanhoDoTextoTitulo = meuTextoTitulo.value.length;
  resultadoTitulo.textContent = tamanhoDoTextoTitulo + "/" + limiteTitulo;

  if (tamanhoDoTextoTitulo > limiteTitulo || tamanhoDoTextoTitulo === 0) {
    resultadoTitulo.style.color = "#ff0000";
    if (tamanhoDoTextoTitulo === 0) {
      avisoContadorTitulo.textContent = "O Título não pode ficar vazio*";
      avisoContadorTitulo.style.color = "#ff0000";
      verdadeTitulo = false;
    }
    if (tamanhoDoTextoTitulo > limiteTitulo) {
      avisoContadorTitulo.textContent =
        "O Tamanho Máximo do Título é de 75 Caracteres*";
      avisoContadorTitulo.style.color = "#ff0000";
      verdadeTitulo = false;
    }
  } else {
    resultadoTitulo.style.color = "#737373";
    avisoContadorTitulo.textContent = "";
    verdadeTitulo = true;
  }
  verificarBotaoCriarPost();
});
//-----------

//Descricao
var meuTextoDescricao = document.getElementById("inputDaDescricao");
var resultadoDescricao = document.getElementById("contadorDescricao");
var limiteDescricao = 130;

resultadoDescricao.textContent = 0 + "/" + limiteDescricao;
resultadoDescricao.style.color = "#ff0000";

meuTextoDescricao.addEventListener("input", function () {
  var tamanhoDoTextoDescricao = meuTextoDescricao.value.length;
  resultadoDescricao.textContent =
    tamanhoDoTextoDescricao + "/" + limiteDescricao;

  if (
    tamanhoDoTextoDescricao > limiteDescricao ||
    tamanhoDoTextoDescricao === 0
  ) {
    resultadoDescricao.style.color = "#ff0000";
    if (tamanhoDoTextoDescricao === 0) {
      avisoContadorDescricao.textContent = "A Descrição não pode ficar vazia*";
      avisoContadorDescricao.style.color = "#ff0000";
      verdadeDescricao = false;
    }
    if (tamanhoDoTextoDescricao > limiteDescricao) {
      avisoContadorDescricao.textContent =
        "O Tamanho Máximo da Descrição é de 130 Caracteres*";
      avisoContadorDescricao.style.color = "#ff0000";
      verdadeDescricao = false;
    }
  } else {
    resultadoDescricao.style.color = "#737373";
    avisoContadorDescricao.textContent = "";
    verdadeDescricao = true;
  }
  verificarBotaoCriarPost();
});
//-----------

//Paragrafo
var meuTextoParagrafo = document.getElementById("inputDoParagrafo");
var resultadoParagrafo = document.getElementById("contadorParagrafo");
var limiteParagrafo = 1300;

resultadoParagrafo.textContent = 0 + "/" + limiteParagrafo;
resultadoParagrafo.style.color = "#ff0000";

meuTextoParagrafo.addEventListener("input", function () {
  var tamanhoDoTextoParagrafo = meuTextoParagrafo.value.length;
  resultadoParagrafo.textContent =
    tamanhoDoTextoParagrafo + "/" + limiteParagrafo;

  if (
    tamanhoDoTextoParagrafo > limiteParagrafo ||
    tamanhoDoTextoParagrafo === 0
  ) {
    resultadoParagrafo.style.color = "#ff0000";
    if (tamanhoDoTextoParagrafo === 0) {
      avisoContadorParagrafo.textContent = "O Conteudo não pode ficar vazio*";
      avisoContadorParagrafo.style.color = "#ff0000";
      verdadeParagrafo = false;
    }
    if (tamanhoDoTextoParagrafo > limiteParagrafo) {
      avisoContadorParagrafo.textContent =
        "O Tamanho Máximo do Texto é de 1300 Caracteres*";
      avisoContadorParagrafo.style.color = "#ff0000";
      verdadeParagrafo = false;
    }
  } else {
    resultadoParagrafo.style.color = "#737373";
    avisoContadorParagrafo.textContent = "";
    verdadeParagrafo = true;
  }
  verificarBotaoCriarPost();
});

function verificarBotaoCriarPost() {
  if (verdadeTitulo && verdadeDescricao && verdadeParagrafo && temFotoNoCriar) {
    botaoCriarPost.style.display = "flex";
    botaoCriarPost.style.justifyContent = "space-around";
  } else {
    botaoCriarPost.style.display = "none";
  }
}
//-----------
const inputsImagemEdicao = document.querySelectorAll('[name="imagem"]');

inputsImagemEdicao.forEach((input) => {
  const inputId = input.id;
  const inputAtualizaImagem = document.querySelector(
    `[name="atualizarImagem"][id=atualiza_${inputId}]`
  );
  input.addEventListener("change", () => {
    if (input.files.length > 0) {
      inputAtualizaImagem.value = true;
      return;
    }
    inputAtualizaImagem.value = false;
  });
});

//-----------

//-----------
