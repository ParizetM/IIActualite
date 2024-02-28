<?php


require_once "../includes/PDO.php";
// include "../includes/debugger.php";
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/style.css">
    <link rel="icon" href="medias/logo-iia-200x200.png" type="image/icon type" />
    <title>IIActualité - Mentions légales</title>
</head>

<body>
    <header>
        <?php
        include '../includes/header.php';
        ?>
    </header>
    <main>
    <?php       if (isset($_GET['id'])) {
                $sql= "SELECT titre,texte,lien_image,date,date_revision,auteurs.nom,auteurs.prenom,actualites.id,id_tags FROM actualites,auteurs WHERE id_auteur = auteurs.id AND actualites.id = ".$_GET['id']." ORDER BY date DESC LIMIT 1";
                $resultat = $pdo->query($sql);
                while ($donnees = $resultat->fetch(PDO::FETCH_ASSOC)) {
                   echo '<div class="actu_container_article">';
                   echo '<img src="../uploads/'.$donnees['lien_image'].'" alt="lien image" title="lien image" width="800px">';
                   echo '<h1>'.$donnees['titre'].'</h1>';
                   echo '<p>'.$donnees['texte'].'</p>';
                   echo '<p> Ecrit par '.$donnees['nom'].' '.$donnees['prenom'].' Le '.$donnees['date'].'</p>';
                   echo '<p>Revision Le '.$donnees['date_revision'].'</p>';
                   echo '<p>';
                   $table_id_tag = explode('&', $donnees['id_tags']);
                   foreach ($table_id_tag as $id_tag) {
                    $sql2= "SELECT nom FROM tags WHERE ".$id_tag." = id";
                    $resultat2 = $pdo->query($sql2);
                    while ($donnees2 = $resultat2->fetch(PDO::FETCH_ASSOC)) {
                        echo '<p class="tags">#'.$donnees2['nom']." </p>";
                    }
                }
                   echo '</p>';
                
                   
                   echo '</div>';
                }
            }
             ?> 
    </main>
    <footer>
        <?php
        include '../includes/footer.php';
        ?>
    </footer>
</body>

</html>