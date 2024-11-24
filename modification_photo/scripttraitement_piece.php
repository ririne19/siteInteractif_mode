<?php
include("../config/config.php");
$bdd = new PDO('mysql:host=' . $hote . ';port=' . $port . ';dbname=' . $nom_bd, $identifiant, $mot_de_passe, $options);

// taille autorisées (min & max -- en octets)
$file_min_size = 0;
$file_max_size = 10000000;
// On vérifie la présence d"un fichier à uploader
if (($_FILES["limage"]["size"] > $file_min_size) && ($_FILES["limage"]["size"] < $file_max_size)) :
    // dossier où sera déplacé le fichier; ce dossier doit exister
    // besoin de remonter dans les fichier pr bien enregistré
    $content_dir = "../image_site/piece/";
    $tmp_file = $_FILES["limage"]["tmp_name"];
    if (!is_uploaded_file($tmp_file)) {
        echo "Fichier non trouvé";
    }
    // on vérifie l"extension
    $path = $_FILES["limage"]["name"];
    $ext = pathinfo($path, PATHINFO_EXTENSION); // on récupère l"extension
    if (!strstr($ext, "jpg") && !strstr($ext, "png")) {
        echo "EXTENSION " . $ext . " NON AUTORISEE";
    }
    // Si le formulaire est validé, on copie le fichier dans le dossier de destination
    if (empty($errors)) {
        $name_file = md5(uniqid(rand(), true)) . "." . $ext; // on crée un nom unique en conservant l"extension
        if (!move_uploaded_file($tmp_file, $content_dir . $name_file)) {
            echo "Il y a des erreurs! Impossible de copier le fichier dans le dossier cible";
        }
    }
    // On récupère l"url du fichier envoyé attention enleve $content_dir pr avoir le bon url sans les 2 points
    $url_image = "image_site/collection/" . $name_file;
    echo "image enregistrée avec chemin =" . $url_image;

    // requete pour inserer l'image et ajout
    // ajout d'une photo
    $requete_preparee = $bdd->prepare('INSERT into photo (id_photo, nom_photo, url, description_photo) VALUES (null, :nom_photo, :url, :description_photo)');
    $requete_preparee->bindValue(':nom_photo', $_POST["nom_photo"], PDO::PARAM_STR);
    $requete_preparee->bindValue(':description_photo', $_POST["description_photo"], PDO::PARAM_STR);
    $requete_preparee->bindValue(':url', $url_image, PDO::PARAM_STR);
    $res = $requete_preparee->execute();

    $id_photo = $bdd->lastInsertId();


    //ajout de la photo lié a la piece
    $requete_preparee = $bdd->prepare('INSERT into represente (id_photo, id_piece) VALUES(:id_photo, :id_piece)');
    $requete_preparee->bindValue(':id_photo', $id_photo, PDO::PARAM_STR);
    $requete_preparee->bindValue(':id_piece', $_POST["id_piece"], PDO::PARAM_STR);
    $res = $requete_preparee->execute();


//

elseif ($_FILES["upfiles"]["size"] > $file_max_size) :
    echo "le fichier dépasse la limite autorisée";
else :
    echo "Pas de fichier joint";
endif;

header('Location: ../index.php');
exit();
