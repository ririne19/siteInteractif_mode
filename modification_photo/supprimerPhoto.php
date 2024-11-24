<?php
include("../config/config.php");
$bdd = new PDO('mysql:host=' . $hote . ';port=' . $port . ';dbname=' . $nom_bd, $identifiant, $mot_de_passe, $options);

// suppression d'une photo
$requete = 'DELETE FROM photo WHERE id_photo=' . $_POST["id_photo"];
$nbsuppression = $bdd->exec($requete);

// redirection
header('Location: ../index.php');
exit();
