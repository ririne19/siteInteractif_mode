<?php
include("config/config.php");
$bdd = new PDO('mysql:host=' . $hote . ';port=' . $port . ';dbname=' . $nom_bd, $identifiant, $mot_de_passe, $options);

// affiche nom maison par ordre alphabétique
$requete = 'SELECT 
maison.nom_maison,
collection.id_collection, 
collection.nom_collection, 
collection.description_collection, 
collection.style, 
collection.id_defile, 
defile.titre
FROM creer, maison, defile 
JOIN collection ON defile.id_defile = collection.id_defile
WHERE maison.id_maison=creer.id_maison 
AND collection.id_collection=creer.id_collection

';

$resultats = $bdd->query($requete);
$tabcollection = $resultats->fetchAll(PDO::FETCH_ASSOC);
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

    <h1>Les collections</h1>

    <?php
    // Initialisation d'une variable pour mémoriser le nom de la maison actuellement en train d'être traitée.
    $collectionactuelle = "";
    foreach ($tabcollection as $tab) {
        if ($tab["nom_maison"] != $collectionactuelle) {
            // Vérifier si le nom de la maison de l'élément actuel est différent de la maison actuellement mémorisée.
    ?>
            <div class="collectionContainer">


                <h2><?php echo $tab["nom_maison"]; ?></h2>
            <?php $collectionactuelle = $tab["nom_maison"];
        }
        if ($tab["id_collection"]) { // vérifie si une collection est associé
            ?>
                <div class="collectionItem">


                    <p>Nom :<?php echo $tab["nom_collection"]; ?></p>
                    <p>Description :<?php echo $tab["description_collection"]; ?></p>
                    <p>Style :<?php echo $tab["style"]; ?></p>
                </div>
            <?php
        }
        if ($tab["id_defile"]) { //vérifie si un défilé est associé
            ?>
                <div class="collectionDefile">
                    <h3>Défilé <?php echo $tab["titre"]; ?></h3>

                </div>

            <?php
        }
            ?> <div class="btnCollectionPiece">
                <form action="piece.php?id_collection= <?php echo $tab["id_collection"]; ?>" method="GET">
                    <input type="hidden" name="id_collection" value="<?php echo $tab["id_collection"]; ?>">
                    <input type="submit" value="Pièce(s)">
                </form>
            </div>
            </div>
        <?php
    }

    include 'footer.html';
        ?>
</body>

</html>