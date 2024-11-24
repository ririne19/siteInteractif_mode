<?php
include("config/config.php");
$bdd = new PDO('mysql:host=' . $hote . ';port=' . $port . ';dbname=' . $nom_bd, $identifiant, $mot_de_passe, $options);

// affiche les photos des piece
$requete = 'SELECT 
photo.id_photo,
photo.nom_photo,
photo.description_photo,
photo.url,
piece.id_piece,
piece.nom_piece
FROM photo, piece, montre
WHERE photo.id_photo = montre.id_photo and  piece.id_piece = montre.id_piece
';

$resultats = $bdd->query($requete);
$tabPhoto_piece = $resultats->fetchAll(PDO::FETCH_ASSOC);
$resultats->closeCursor();

// affiche les photos des collections
$requete = 'SELECT 
photo.id_photo,
photo.nom_photo,
photo.description_photo,
photo.url,
collection.id_collection,
collection.nom_collection
FROM photo, collection, represente
WHERE photo.id_photo = represente.id_photo and collection.id_collection  = represente.id_collection
';

$resultats = $bdd->query($requete);
$tabPhoto_collection = $resultats->fetchAll(PDO::FETCH_ASSOC);
$resultats->closeCursor();


// affiche les photos des défilés
$requete = 'SELECT 
photo.id_photo,
photo.nom_photo,
photo.description_photo,
photo.url,
defile.id_defile,
defile.titre
FROM photo, defile, devoile
WHERE photo.id_photo = devoile.id_photo and defile.id_defile = devoile.id_defile
';

$resultats = $bdd->query($requete);
$tabPhoto_defile = $resultats->fetchAll(PDO::FETCH_ASSOC);
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
    <p>Pour modifier, ajouter ou supprimer une image, sélectionnez cette dernière ! </p>

    <!--affiche toutes les photos sous format de cartes-->
    <div class="container">


        <?php
        // Boucle à travers les photos de pièces et les affiche avec un lien pour la modification
        foreach ($tabPhoto_piece as $tab) {

        ?><a href="admin.php?id_photo=<?php echo $tab["id_photo"]; ?>">
                <div class="card">


                    <img src="<?php echo $tab["url"]; ?>" alt="<?php echo $tab["description_photo"]; ?>">
            </a>

            <p><?php echo $tab["nom_photo"]; ?></p>
    </div>
<?php
        }
        echo "<br>";

?>
</div>
<div class="container">

    <?php
    // Répète le processus pour les photos de collections, incluant le nom de la collection
    foreach ($tabPhoto_collection as $tab) {
    ?><a href="admin.php?id_photo=<?php echo $tab["id_photo"]; ?>">
            <div class="card">
                <img src="<?php echo $tab["url"]; ?>" alt="<?php echo $tab["description_photo"]; ?>">
        </a>
        <p><?php echo $tab["nom_photo"]; ?></p>
        <p>Collection :<?php echo $tab["nom_collection"]; ?></p>
</div>
<?php

    }
    echo "<br>";

?>

</div>
<div class="container">

    <?php
    // Répète le processus pour les photos de défilés, incluant le titre du défilé
    foreach ($tabPhoto_defile as $tab) {
    ?><a href="admin.php?id_photo=<?php echo $tab["id_photo"]; ?>">
            <div class="card">
                <img src="<?php echo $tab["url"]; ?>" alt="<?php echo $tab["description_photo"]; ?>">
        </a>
        <p><?php echo $tab["nom_photo"]; ?></p>
        <p>Défilé :<?php echo $tab["titre"]; ?></p>
</div>
<?php

    }
    echo "<br>";
?>
</div>
<?php
include 'footer.html';
?>
</body>

</html>