function menuShow() {
  let menuMobile = document.querySelector('.menu-mobile');
  if (menuMobile.classList.contains('open')) {
      menuMobile.classList.remove('open');
      document.querySelector('.icon').src = "assets/img/menu_white_36dp.svg";

  } else {
      menuMobile.classList.add('open');
      document.querySelector('.icon').src = "assets/img/close_white_36dp.svg";
  }
}

//Modal abri e fechar popup login

function abirModal(idModal) {
  document.getElementById(idModal).style.display = "flex";
}

function fecharModal(idModal) {
  document.getElementById(idModal).style.display = "none";
}