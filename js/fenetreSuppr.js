// Variable globale pour stocker l'identifiant de la popup
let popupMH;

// Fonction pour ouvrir la popup
function ouvrirpopupMH() {
  let ajoutMessageMH = document.getElementById("photoRenvoi"); // Effacer le texte contenu dans le paragraphe dont l'id est message_renvoi quand on clique sur le bouton pour ouvrir la popup
  ajoutMessageMH.textContent = "";
  let photoMH = document.getElementById("photoRenvoi").value; // Récupére le prénom en allant récupérer la valeur du champ d'id prenom
  let idPhotoMH = document.getElementById("photoRenvoi").value; // Récupére l'ID de la photo à partir du champ caché
  // Créer la popup avec les dimensions et inclure l'ID dans l'URL
  popupMH = window.open(
    "adminPopupSupr.php?id_photo=" + idPhotoMH,
    "popup",
    "width=300,height=300"
  );
}

// Fonction pour ajouter le nom rentré dans la fenêtre principal sur la popup
function informerPopupCreeMH(photoMH) {
  // Récupère l'élément qui a l'id ajout dans le html de la popup pour ajouter le prénom
  let ajoutElementMH = popupMH.document.getElementById("idPhoto");
  ajoutElementMH.textContent = photoMH;
}

// Fonction pour remplir la zone dans la fenêtre principal avec le message rentré dans la popup
function remplirChampRetourPopupMH() {
  let ajoutMessageMH = document.getElementById("message_renvoi");
  ajoutMessageMH.textContent = "La photo a bien été supprimé !";
}

// Fonction pour effacer le texte contenu dans l'élément d'id message_renvoi de la fenêtre principale quand dans prénom il n'y a rien
function effacerMH() {
  // Récupérer la valeur du champ de prénom
  let photovaleurMH = photo.value;
  // Si la valeur du champ de prénom est vide, effacer le contenu de ajoutMessage
  if (photovaleurMH === "") {
    let ajoutMessageMH = document.getElementById("supprSur");
    ajoutMessageMH.textContent = "";
  }
}

// Fonction pour configurer les écouteurs d'événements
function setupListenersMH() {
  let boutonMH = document.getElementById("ouvertPopup"); // Sélectionner le bouton qui a pour id "bouton"
  boutonMH.addEventListener("click", ouvrirpopupMH); // Ajouter un écouteur d'événements au bouton pour appeler la fonction ouvrirpopup
  let photoMH = document.getElementById("photoRenvoi"); // Sélectionne l'élément qui a pour id prenom
  photoMH.addEventListener("input", effacerMH); // Ajout un écouteur d'événements au bouton pour appeler la fonction effacer
}
// lancement de setupListeners au chargement de la page
window.addEventListener("load", setupListenersMH);
