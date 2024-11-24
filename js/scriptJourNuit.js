function changerStyleMH() {
  let elementMH = document.body;
  let boutonMH = document.getElementById("bouton");

  // Vérifie si le corps du document a la classe 'styleNuit'
  if (elementMH.classList.contains("styleNuit")) {
    // Change pour le style de jour et met à jour le texte du bouton
    elementMH.classList.remove("styleNuit");
    elementMH.classList.add("styleJour");
    boutonMH.textContent = "Passez en mode nuit";
  } else {
    // Change pour le style de nuit et met à jour le texte du bouton
    elementMH.classList.remove("styleJour");
    elementMH.classList.add("styleNuit");
    boutonMH.textContent = "Passez en mode jour";
  }
}

// abonnement via le click
function setupListenersMH() {
  let boutonMH = document.getElementById("bouton");
  boutonMH.addEventListener("click", changerStyleMH);
}

// lancement de setupListeners au chargement de la page
window.addEventListener("load", setupListenersMH);
