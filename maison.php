<?php
include("config/config.php");
$bdd = new PDO('mysql:host=' . $hote . ';port=' . $port . ';dbname=' . $nom_bd, $identifiant, $mot_de_passe, $options);

// affiche info maison
$requete = 'SELECT maison.id_maison,maison.nom_maison, maison.pays_maison, maison.description_maison, createur.id_createur, createur.nom_createur, createur.pays_createur, createur.bio, createur.poste
FROM maison, createur
where maison.id_maison = createur.id_maison 
AND createur.id_createur = createur.id_createur
ORDER BY nom_maison';

$resultats = $bdd->query($requete);
$tabinfo_maison = $resultats->fetchAll(PDO::FETCH_ASSOC);
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

    <script src="js/scriptCacher.js"></script>
</head>

<body>
    <?php
    include 'header.html'
    ?>
    <h1>Les Maisons</h1>
    <div class="Maison">
        <?php
        foreach ($tabinfo_maison as $tab) { // Boucle à travers chaque maison récupérée de la base de données et affiche ses informations
        ?>
            <h2><?php echo $tab["nom_maison"]; ?></h2>
            <button class="button">Description ↓ </button>
            <section class="descriptionMaison" tabindex="0">

                <p class="pays"><u>Pays </u>: <?php echo $tab["pays_maison"]; ?></p>
                <p class="description"><u>Description</u> : <?php echo $tab["description_maison"]; ?></p>
            </section>

            <?php
            if ($tab["nom_createur"]) { // Vérifie si un créateur est associé à la maison
            ?>
                <button class="button">Createur ↓</button>
                <section class="createurMaison" tabindex="0">
                    <p class="nomCreateur"><u>Créateur actuel</u> : <?php echo $tab["nom_createur"]; ?></p>
                    <p class="paysCreateur"><u>Pays du créateur</u> : <?php echo $tab["pays_createur"]; ?></p>
                    <p class="bioCretauer"><u>Biographie</u> : <?php echo $tab["bio"]; ?></p>
                    <p class="posteCreateur"><u>Poste</u> : <?php echo $tab["poste"]; ?></p>
                </section>
        <?php
            }
            echo "<br>"; // Séparation entre les maisons
        }
        ?>
    </div>
    <div class="pagePlus">

        <a href="collection.php"> Collection(s)</a>
        <a href="defile.php"> Défilé(s)</a>

    </div>

    <?php
    include 'footer.html'
    ?>
</body>

</html>