<?php
include("config/config.php");
$bdd = new PDO('mysql:host=' . $hote . ';port=' . $port . ';dbname=' . $nom_bd, $identifiant, $mot_de_passe, $options);

//liste les photo
$requete = 'SELECT * from photo WHERE id_photo=' . $_GET["id_photo"];
// je selectionne la photo grâce à l'url
$resultats = $bdd->query($requete);
$photo = $resultats->fetch(PDO::FETCH_ASSOC);
$resultats->closeCursor();


?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SAE 203 site sur la mode : Page d'administration</title>
    <!--lien fichier CSS-->
    <link href="style/style.css" rel="stylesheet" type="text/css" media="screen">
    <script src="js/popupSuppr.js"></script>
</head>

<body>
    <!--<?php
        //include 'header.html'
        ?>

    <h1>Page d'administration : <?php //echo $photo["nom_photo"] 
                                ?></h1>
-->
    <!-- Formulaire pour supprimer la photo actuelle -->
    <popup>
        <!--input pour ajouter le nom de la photo rentrer dans le texte-->
        <p>Etes-vous sûr de vouloir <b><i>supprimer</i></b> cette photo : <input type="" name="id_photo" value="<?php echo $photo["nom_photo"]; ?>" /> ?
        </p>
        <form action="../SAE_203/modification_photo/supprimerPhoto.php" method="POST">
            <!-- Champ caché contenant l'ID de la photo à supprimer -->
            <input id="idPhoto" type="hidden" name="id_photo" value="<?php echo $photo["id_photo"]; ?>" />
            <!-- Bouton pour soumettre le formulaire et supprimer la photo -->
            <button id="supprSur" type="submit">Oui, je suis sûr, Supprimer l'image</button>
            <!--Bouton pour annuler son choix et fermer la popup-->
            <button id="fermer">Annuler</button>
        </form>
    </popup>

    <!--
    <?php
    //include 'footer.html'
    ?>-->
</body>

</html>