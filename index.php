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
    <link rel="stylesheet" href="css/style-nuit.css" />
    <link rel="icon" href="medias/logo-iia-200x200.png" type="image/icon type" />
    <title>IIActualité - accueil</title>
    <meta name="description" content="Nous sommes 2 étudiants qui créent un site de partage de fichiers, de plus nos Portefolio, nos CV et nos projets personnels sont disponible sur le site.">
</head>

<body>
    <header>
        <?php
        include 'includes/header-index.php';
        ?>
    </header>
    <main>
        <h1> Bienvenue sur les actualité de L'IIA</h1>  
        <div>
            <?php 

             ?> 



        <!-- <article>
            <img src="" alt="image article" title="image article">
            <div class="article_preview_body">
                <h3></h3>
                <p></p>
                <small></small>

            </div>
        </article> -->
         </div>
    </main>
    <footer>
        <?php
        include 'includes/index-footer.php';
        ?>
    </footer>
</body>

</html>