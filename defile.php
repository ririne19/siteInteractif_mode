<?php
include("config/config.php");
$bdd = new PDO('mysql:host=' . $hote . ';port=' . $port . ';dbname=' . $nom_bd, $identifiant, $mot_de_passe, $options);

// date du jour
$date = new \DateTime();

// affiche les défilés en cours 
$requete = 'SELECT 
defile.id_defile,
defile.titre,
defile.ville,
defile.annee_defile,
defile.saison_defile,
defile.date_debut,
defile.date_fin
FROM defile
WHERE date_debut<NOW() AND date_fin >NOW()
';

$resultats = $bdd->query($requete);
$tabEn_cours = $resultats->fetchAll(PDO::FETCH_ASSOC);
$resultats->closeCursor();

// affiche les défilés à venir 
$requete = 'SELECT 
defile.id_defile,
defile.titre,
defile.ville,
defile.annee_defile,
defile.saison_defile,
defile.date_debut,
defile.date_fin
FROM defile
WHERE date_debut>NOW()
';

$resultats = $bdd->query($requete);
$tabA_venir = $resultats->fetchAll(PDO::FETCH_ASSOC);
$resultats->closeCursor();

// affiche les défilés passé 
$requete = 'SELECT 
defile.id_defile,
defile.titre,
defile.ville,
defile.annee_defile,
defile.saison_defile,
defile.date_debut,
defile.date_fin
FROM defile
WHERE date_fin<NOW()
';

$resultats = $bdd->query($requete);
$tabPasse = $resultats->fetchAll(PDO::FETCH_ASSOC);
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
    include 'header.html';
    ?>
    <h1>Les défilés</h1>
    <div class="defileSection">
        <!-- Affichage des défilés en cours -->
        <h2> En cours </h2>

        <p>Date du jour : <?php echo $date->format('Y-m-d'); ?> </p>
        <?php foreach ($tabEn_cours as $tab) {
        ?>
            <div class="defileItem">
                <h3><?php echo $tab["titre"]; ?></h3>
                <p>Ville :<?php echo $tab["ville"]; ?></p>
                <p>Saison :<?php echo $tab["saison_defile"]; ?></p>
                <p>Début :<?php echo $tab["date_debut"]; ?></p>
                <p>Fin :<?php echo $tab["date_fin"]; ?></p>

            </div>

        <?php
        }

        ?>
    </div>
    <div class="defileSectionAVenir">
        <!-- Affichage des défilés à venir -->
        <h2>A venir</h2>
        <?php
        foreach ($tabA_venir as $tab) {
        ?>
            <div class="defileItem">
                <h3><?php echo $tab["titre"]; ?></h3>
                <p>Ville :<?php echo $tab["ville"]; ?></p>
                <p>Saison :<?php echo $tab["saison_defile"]; ?></p>
                <p>Début :<?php echo $tab["date_debut"]; ?></p>
                <p>Fin :<?php echo $tab["date_fin"]; ?></p>
            </div>
        <?php
        }

        ?>
    </div>

    <div class="defileSection">
        <!-- Affichage des défilés passés -->
        <h2>Passé</h2>

        <?php
        foreach ($tabPasse as $tab) {
        ?>
            <div class="defileItem">

                <h3><?php echo $tab["titre"]; ?></h3>
                <p>Ville :<?php echo $tab["ville"]; ?></p>
                <p>Saison :<?php echo $tab["saison_defile"]; ?></p>
                <p>Début :<?php echo $tab["date_debut"]; ?></p>
                <p>Fin :<?php echo $tab["date_fin"]; ?></p>

            </div>
        <?php
        }

        ?>
    </div>
    <?php
    include 'footer.html';
    ?>
</body>

</html>