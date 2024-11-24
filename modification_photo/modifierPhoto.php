
<?php
include("../config/config.php");
$bdd = new PDO('mysql:host=' . $hote . ';port=' . $port . ';dbname=' . $nom_bd, $identifiant, $mot_de_passe, $options);

// Récupération des données envoyées par le formulaire
$nom_photo = $_POST['nom_photo']; // Assurez-vous de valider et d'assainir ces entrées
$description_photo = $_POST['description_photo'];
$id_photo = $_POST['id_photo'];

// Préparation de la requête de mise à jour
$requete = $bdd->prepare('UPDATE photo SET nom_photo = :nom_photo, description_photo = :description_photo WHERE id_photo = :id_photo');

// Exécution de la requête avec les valeurs
$requete->execute(array(
    ':nom_photo' => $nom_photo,
    ':description_photo' => $description_photo,
    ':id_photo' => $id_photo
));

// Redirection
header('Location: ../index.php');
exit();
?>
