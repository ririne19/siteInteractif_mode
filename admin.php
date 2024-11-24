<?php
include("config/config.php");
$bdd = new PDO('mysql:host=' . $hote . ';port=' . $port . ';dbname=' . $nom_bd, $identifiant, $mot_de_passe, $options);

//liste les photo
$requete = 'SELECT * from photo WHERE id_photo=' . $_GET["id_photo"];
// je selectionne la photo grâce à l'url
$resultats = $bdd->query($requete);
$photo = $resultats->fetch(PDO::FETCH_ASSOC);
$resultats->closeCursor();

// affiche les pieces
$requete = 'SELECT * FROM  piece';
$resultats = $bdd->query($requete);
$tabpiece = $resultats->fetchAll(PDO::FETCH_ASSOC);
$resultats->closeCursor();

// affiche les collections
$requete = 'SELECT * FROM  collection';
$resultats = $bdd->query($requete);
$tabcollection = $resultats->fetchAll(PDO::FETCH_ASSOC);
$resultats->closeCursor();


// affiche les defiles
$requete = 'SELECT * FROM  defile';
$resultats = $bdd->query($requete);
$tabdefile = $resultats->fetchAll(PDO::FETCH_ASSOC);
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
    <script src="js/fenetreSuppr.js"></script>
</head>

<body>
    <?php
    include 'header.html'
    ?>

    <h1>Page d'administration : <?php echo $photo["nom_photo"] ?></h1>

    <!-- Formulaire pour supprimer la photo actuelle -->
    <form action="../SAE_203_V2/modification_photo/supprimerPhoto.php" method="POST">
        <!-- Champ caché contenant l'ID de la photo à supprimer -->
        <input type="hidden" name="id_photo" value="<?php echo $photo["id_photo"]; ?>" />
        <!-- Bouton pour soumettre le formulaire et supprimer la photo -->
        <button type="submit" value="Supprimer la photo avec php">Supprimer la photo via php</button>
    </form>
    <!-- Champ caché contenant l'ID de la photo à supprimer -->
    <input id="photoRenvoi" type="hidden" name="id_photo" value="<?php echo $photo["id_photo"]; ?>" />
    <!-- Bouton pour soumettre le formulaire et supprimer la photo -->
    <button id="ouvertPopup" type="submit" value="Supprimer la photo">Supprimer la photo (popup)</button>
    <p id="message_renvoi"></p>



    <div class="adminContainer">


        <!-- Section pour modifier la photo actuelle -->
        <h2>Modification : <?php echo $photo["nom_photo"] ?></h2>

        <form action="../SAE_203/modification_photo/modifierPhoto.php" method="POST">
            <!-- Champ caché contenant l'ID de la photo à modifier -->
            <input type="hidden" name="id_photo" value="<?php echo $photo["id_photo"]; ?>" />
            <!--modification du titre et descriptif-->
            Titre : <input type="text" name="nom_photo" required="required" value="<?php echo $photo["nom_photo"]; ?>" /><br />
            Descriptif : <input type="text" name="description_photo" required="required" value="<?php echo $photo["description_photo"]; ?>" /><br />
            Photo de base : <input type="image" name="url" value="<?php echo $photo["url"]; ?>" /><br />

            </select><br /><br />
            <!-- Bouton pour soumettre le formulaire de modification -->
            <input type="submit" value="Modifier" />
        </form>
    </div>

    <div class="adminContainer">
        <!-- Section pour ajouter une nouvelle photo à une collection -->
        <h2>Ajout d'une photo</h2>
        <h3>Photo d'une collection</h3>
        <div class="adminPhotoForm">


            <form action="./modification_photo/scripttraitement_collection.php" method="POST" enctype="multipart/form-data">

                Titre : <input type="text" name="nom_photo" required="required" /><br />
                Descriptif : <input type="text" name="description_photo" required="required" /><br />
                <!-- Sélection d'une collection pour la nouvelle photo -->
                Nom de la collection : <select name="id_collection" require="required">
                    <?php
                    foreach ($tabcollection as $tab) :
                    ?>
                        <option value="<?php echo $tab["id_collection"]; ?>"><?php echo $tab["nom_collection"]; ?></option>
                    <?php
                    endforeach;
                    ?>
                </select><br /><br />

                <!-- Champ pour télécharger la photo -->
                <p><label for="limage">Photo : </label>
                    <input type="file" name="limage" />(<i> *.jpg *.png</i>)
                </p>

                <!-- Bouton pour soumettre le formulaire d'ajout -->
                <input type="submit" value="Ajouter la photo" />
            </form>

            <h3>Photo d'une pièce</h3>
            <form action="./modification_photo/scripttraitement_piece.php" method="POST" enctype="multipart/form-data">

                Titre : <input type="text" name="nom_photo" required="required" /><br />
                Descriptif : <input type="text" name="description_photo" required="required" /><br />
                Photo : <input type="image" name="url" required="required" /><br />

                Nom de la pièce: <select name="id_piece" require="required">
                    <?php
                    foreach ($tabpiece as $tab) :
                    ?>
                        <option value="<?php echo $tab["id_piece"]; ?>"><?php echo $tab["nom_piece"]; ?></option>
                    <?php
                    endforeach;
                    ?>
                </select><br /><br />
                <p><label for="limage">Photo : </label>
                    <input type="file" name="limage" />(<i> *.jpg *.png</i>)
                </p>

                <input type="submit" value="Ajouter la photo" />
            </form>

            <h3>Photo d'un défilé</h3>
            <form action="./modification_photo/scripttraitement_piece.php" method="POST" enctype="multipart/form-data">

                Titre : <input type="text" name="nom_photo" required="required" /><br />
                Descriptif : <input type="text" name="description_photo" required="required" /><br />
                Photo : <input type="image" name="url" required="required" /><br />

                Nom du défilé : <select name="id_defile" require="required">
                    <?php
                    foreach ($tabdefile as $tab) :
                    ?>
                        <option value="<?php echo $tab["id_defile"]; ?>"><?php echo $tab["titre"]; ?></option>
                    <?php
                    endforeach;
                    ?>
                </select><br /><br />

                <p><label for="limage">Photo : </label>
                    <input type="file" name="limage" />(<i> *.jpg *.png</i>)
                </p>

                <input type="submit" value="Ajouter la photo" />
            </form>
        </div>
    </div>
    <?php
    include 'footer.html'
    ?>
</body>

</html>