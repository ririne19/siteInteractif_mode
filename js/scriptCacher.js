//Fonction pour afficher et masquer une section avec 1 bouton
function masqueMH() {
  // Sélectionne la sectionMH suivant immédiatement le bouton cliqué et bascule son affichage.
  let sectionMH = event.target.nextElementSibling; // Trouve l'élément suivant, qui doit être la section à masquer/afficher
  if (getComputedStyle(sectionMH).display !== "none") {
    sectionMH.style.display = "none";
  } else {
    sectionMH.style.display = "block";
  }
}

// abonnement via le click
// Configure des écouteurs sur tous les boutons '.button' pour activer la fonction masqueMH() au clic.
function setupListenersMH() {
  document.querySelectorAll(".button").forEach((button) => {
    button.addEventListener("click", masqueMH);
  });
}

// lancement de setupListeners au chargement de la page
window.addEventListener("load", setupListenersMH);
