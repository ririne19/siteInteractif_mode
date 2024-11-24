<?php
include("config/config.php");
$bdd = new PDO('mysql:host=' . $hote . ';port=' . $port . ';dbname=' . $nom_bd, $identifiant, $mot_de_passe, $options);

//affiche le nom de la collection en lien avec les pièces
$requete = 'SELECT * from collection WHERE id_collection=' . $_GET["id_collection"];
// je selectionne la collection grâce à l'url
$resultats = $bdd->query($requete);
$collection = $resultats->fetch(PDO::FETCH_ASSOC);
$resultats->closeCursor();



// Affiche les images en fonction de la piece
// affiche que les photos lié a la collection
$requete = 'SELECT piece.id_piece, piece.nom_piece, piece.type, piece.description_piece, piece.id_collection,
photo.id_photo, photo.nom_photo, photo.url, photo.description_photo
FROM photo, piece, montre
WHERE piece.id_piece = montre.id_piece
AND photo.id_photo = montre.id_photo
AND piece.id_collection = ' . $_GET['id_collection'];


$resultats = $bdd->query($requete);
$tabpiece = $resultats->fetchAll(PDO::FETCH_ASSOC);
$resultats->closeCursor();

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SAE 203 site sur la mode</title>
    <!--lien fichier CSS-->
    <link href="style/style.css" rel="stylesheet" type="text/css" media="screen">

</head>

<body>
    <?php
    include 'header.html'
    ?>
    <!-- Affiche le nom de la collection -->
    <h1>Les pièces : <?php echo $collection["nom_collection"] ?></h1>

    <?php
    // Boucle à travers chaque pièce et affiche ses informations, y compris l'image
    foreach ($tabpiece as $tab) :
    ?>
        <div class="pieceContainer">
            <div class="pieceImg">
                <img src="<?php echo $tab["url"]; ?>" alt="<?php echo $tab["description_photo"]; ?>"><br>
            </div>

            <div class="pieceInfo">


                <p>Nom : <?php echo $tab["nom_piece"]; ?></p>
                <p>Type :<?php echo $tab["type"]; ?></p>
                <p>Description : <?php echo $tab["description_piece"]; ?></p>
            </div>
        </div>
    <?php

    endforeach;

    include 'footer.html';
    ?>
</body>

</html>