// Fonction pour fermer la popup
function fermerpopupMH() {
  // fermerMH la popup
  window.close();
}

/*
 Fonction pour fermer la popup en renvoyant un message lorsque supprime la photo
Pas la connaissance de mettre le script suppression php et lié avec la popup js
 */
function fermerSupprpopupMH() {
  // Appel à la fonction remplirChampRetourPopup pour retourner le message après suppression
  console.log("popup");
  window.opener.remplirChampRetourPopupMH("La photo a bien été supprimé !");
  window.close();
}
// Fonction pour configurer les écouteurs d'événements
function setupListenersMH() {
  // Sélectionner le bouton qui a pour id "fermer" pour fermer la popup sans aucun effet
  let fermerMH = document.getElementById("fermer");
  fermerMH.addEventListener("click", fermerpopupMH);
  let fermerSupprMH = document.getElementById("supprSur");
  fermerSupprMH.addEventListener("click", fermerSupprpopupMH);
}

// lancement de setupListeners au chargement de la page
window.addEventListener("load", setupListenersMH);
