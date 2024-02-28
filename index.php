<?php
session_start();

require_once "includes/PDO.php";
include "includes/debugger.php";
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="icon" href="medias/logo-iia-200x200.png" type="image/icon type" />
    <title>IIActualité - accueil</title>
</head>

<body>
    <header>
        <?php
        include 'includes/header-index.php';
        ?>
    </header>
    <main>
        <h1> Bienvenue sur les actualité de L'IIA</h1>  
        <div class="actu_container">
            <?php 
                $sql= "SELECT titre,texte,lien_image,date,auteurs.nom,auteurs.prenom,actualites.id FROM actualites,auteurs WHERE id_auteur = auteurs.id ORDER BY date DESC LIMIT 5";
                $resultat = $pdo->query($sql);
                while ($donnees = $resultat->fetch(PDO::FETCH_ASSOC)) {
                    echo '<div class="actualite"><a href="pages/article.php?'.$donnees['id'].'">';
                    echo '<img src="uploads/'.$donnees['lien_image'].'" alt="image article" title="image article">';
                    echo '<div class="actualite_preview_body">';
                    echo '<h2>'.$donnees['titre'].'</h2>';
                    echo '<p>'.substr($donnees['texte'],0,100).'...</p>';
                    echo '<small>'.$donnees['nom'].' '.$donnees['prenom'].' '.$donnees['date'].'</small>';
                    echo '</div>';
                    echo '</div></a>';
                }

             ?> 
                
         </div>
    </main>
    <footer>
        <?php
        include 'includes/index-footer.php';
        ?>
    </footer>
</body>

</html>