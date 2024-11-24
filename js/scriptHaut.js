//fonction pour defiler vers le haut avec les coordonnées donné tout en douceur
function retourHautMH() {
  window.scrollTo({
    top: 0,
    left: 0,
    behavior: "smooth",
  });
}
//affiche le bouton Haut lorsque la barre de défilement est à + de 500px
function scrollFonctionMH() {
  let boutonMH = document.getElementById("haut");
  //obtenir le nombre de pixels qui ont été défilé
  let intElemenScrollTopMH = document.documentElement.scrollTop; // en fct de la taille du document
  //définir le nombre de pixels à faire défiler
  //Element.scrollTop = 500 + "px";
  if (intElemenScrollTopMH > 50) {
    boutonMH.style.display = "flex"; //j'attribue pr mon css
  } else {
    boutonMH.style.display = "none";
  }
}

// abonnement via le click
function setupListenersMH() {
  let boutonMH = document.getElementById("haut");
  boutonMH.addEventListener("click", retourHautMH);
  window.addEventListener("scroll", scrollFonctionMH);
}

// lancement de setupListeners au chargement de la page
window.addEventListener("load", setupListenersMH);
