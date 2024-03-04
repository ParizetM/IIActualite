<?php


require_once "includes/PDO.php";
// include "includes/debugger.php";
require_once "classes/Actualite.php";
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
    <?php 
            if ( isset($_GET['envoi'])&& $_GET['envoi'] == true ) {
                echo "<h1 style='text-align:center;'>Votre message a bien été envoyé!</h1>";
                $_GET['envoi'] = false; 
            }
         ?> 
        <h1> Bienvenue sur les actualité de L'IIA</h1>  
        
        <div class="actu_container">
            <?php 
                $sql= "SELECT titre,texte,lien_image,date,auteurs.nom,auteurs.prenom,actualites.id,date_revision,id_auteur,id_tags,sources FROM actualites,auteurs WHERE id_auteur = auteurs.id ORDER BY date DESC LIMIT 5";
                $resultat = $pdo->query($sql);
                while ($donnees = $resultat->fetch(PDO::FETCH_ASSOC)) {
                    $actualite = new Actualite($donnees['id'],$donnees['titre'],$donnees['texte'],$donnees['lien_image'],$donnees['date'],$donnees['date_revision'],$donnees['prenom'],$donnees['nom'],$donnees['id_tags'],$donnees['sources']);
                    ?> 
                    <div class="actualite"><a href="pages/article.php?id=<?=$actualite->id?>">
                    <img src="uploads/<?=$actualite->lien_image?>" alt="image article" title="image article">
                    <div class="actualite_preview_body">
                    <h2><?=$actualite->titre?></h2>
                    <p><?=$actualite->syntheseTexte()?></p>
                    <small><?=$actualite->prenom_auteur." ".$actualite->nom_auteur." ".$actualite->getDateFr()?></small>
                    </div>
                    </a></div>
                    <?php
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