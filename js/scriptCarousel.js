// Tableau des chemins d'Images du carrousel.
let ImagesMH = [
  "image_site/logo/chanel.png",
  "image_site/logo/dior.png",
  "image_site/logo/gucci.png",
  "image_site/logo/LV.svg",
];
let numeroMH = 0; // Index de l'image actuellement affichée.
let changecarrouselMH; // Identifiant pour le timer du défilement automatique.
let etatActifDefilementMH = true; // État du défilement (true pour actif).

// Fonction pour changer d'image dans le carrousel.
function ChangeImageMH(sens) {
  numeroMH += sens;
  if (numeroMH < 0) numeroMH = ImagesMH.length - 1; // Boucle à la fin si l'index est inférieur à 0.
  if (numeroMH >= ImagesMH.length) numeroMH = 0; // Boucle au début si l'index dépasse la longueur du tableau.
  document.querySelector(".slide").src = ImagesMH[numeroMH]; // Change la source de l'image.
}

// Fonction pour arrêter le défilement automatique.
function stopdefilementMH() {
  clearInterval(changecarrouselMH);
  changecarrouselMH = null;
}

// Fonction pour gérer le défilement (pause ou reprise).
function toggleDefilementMH() {
  if (etatActifDefilementMH) {
    stopdefilementMH(); // Arrête le défilement automatique.
    document.getElementById("pause").textContent = "Reprendre le défilement";
    document.getElementById("precedent").disabled = false; //mettre false à tous pour qu'ils fonctionnent tous le temps
    document.getElementById("suivant").disabled = false;
  } else {
    changecarrouselMH = setInterval(() => ChangeImageMH(1), 3000); // Redémarre le défilement automatique.
    document.getElementById("pause").textContent = "Passez en mode pause";
    document.getElementById("precedent").disabled = false;
    document.getElementById("suivant").disabled = false;
  }
  etatActifDefilementMH = !etatActifDefilementMH; // Bascule l'état du défilement.
}

// abonnement via le click
function initCarrouselMH() {
  document
    .getElementById("precedent")
    .addEventListener("click", () => ChangeImageMH(-1));
  document
    .getElementById("pause")
    .addEventListener("click", toggleDefilementMH);
  document
    .getElementById("suivant")
    .addEventListener("click", () => ChangeImageMH(1));
  // Démarrage du carrousel.
  changecarrouselMH = setInterval(() => ChangeImageMH(1), 3000);
}

// lancement de initCarrouselMH au chargement de la page
document.addEventListener("DOMContentLoaded", initCarrouselMH);
