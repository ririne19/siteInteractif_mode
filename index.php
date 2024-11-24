<?php
include("config/config.php");
$bdd = new PDO('mysql:host=' . $hote . ';port=' . $port . ';dbname=' . $nom_bd, $identifiant, $mot_de_passe, $options);

// affiche nom maison par ordre alphabétique
$requete = 'SELECT nom_maison FROM maison ORDER BY nom_maison';

$resultats = $bdd->query($requete);
$tabnom_maison = $resultats->fetchAll(PDO::FETCH_ASSOC);
$resultats->closeCursor();

// affiche collections
$requete = 'SELECT nom_collection FROM collection ORDER BY nom_collection';

$resultats = $bdd->query($requete);
$tabnom_collection = $resultats->fetchAll(PDO::FETCH_ASSOC);
$resultats->closeCursor();

// affiche defile
$requete = 'SELECT titre FROM defile ORDER BY titre';

$resultats = $bdd->query($requete);
$tabdefile = $resultats->fetchAll(PDO::FETCH_ASSOC);
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
    <script src="js/scriptCarousel.js"></script>

</head>

<body>
   
        <?php
        include 'header.html'
        ?>
         <div class="maGrille">
        <div class="itemIndexMaison">
            <h1>Les maisons</h1>
            <!-- Affichage des logos des maisons de mode en format carousel -->
            <div id="affichage">
                <img class="slide" src="image_site/logo/chanel.png">
                <div id="boutonSlide">
                    <button id="precedent"><img src="image_site/icone/uicons-round-medium-outline-arrow-left.svg" alt="scrollPrecedent"></button>
                    <button id="pause">Passez en mode pause </button>
                    <button id="suivant"><img src="image_site/icone/uicons-round-medium-outline-arrow-right.svg" alt="scrollSuivant"></button>
                </div>
            </div>

            <div class="nomsMaison">
                <!-- Boucle pour afficher les noms des maisons de mode récupérés de la base de données -->
                <?php
                foreach ($tabnom_maison as $tab) :
                ?>

                    <h3><?php echo $tab["nom_maison"]; ?></h3>

                <?php
                endforeach
                ?>

                <br>

                <!-- Lien vers une page avec plus d'informations sur les maisons de mode -->
                <li class="voirPlus"><a href="maison.php"> Voir plus →</a></li>
            </div>
        </div>

        <div class="itemIndexCollection">
            <h1>Les collections</h1>
            <div class="nomsCollection">

                <!-- Boucle pour afficher les noms des collections récupérés de la base de données -->
                <?php
                foreach ($tabnom_collection as $tab) :
                ?>

                    <h3><?php echo $tab["nom_collection"]; ?></h3>

                <?php
                endforeach
                ?>

                <br>
            </div>
            <li class="voirPlus"><a href="collection.php"> Voir plus →</a></li>
        </div>

        <div class="itemIndexDefile">

            <h1>Les défilés</h1>
            <div class="nomsDefile">

                <!-- Boucle pour afficher les titres des défilés récupérés de la base de données -->
                <?php
                foreach ($tabdefile as $tab) :
                ?>

                    <h3><?php echo $tab["titre"]; ?></h3>

                <?php
                endforeach
                ?>

                <br>
            </div>
            <li class="voirPlus"><a href="defile.php"> Voir plus →</a></li>
        </div>

        <?php
        include 'footer.html';
        ?>
    </div>
</body>

</html>