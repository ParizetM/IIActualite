<?php


require_once "../includes/PDO.php";
// include "../includes/debugger.php";
require_once "../classes/Actualite.php";

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
        <?php
            $resultat = Actualite::getActualiteArticle();
            while ($donnees = $resultat->fetch(PDO::FETCH_ASSOC)) {
                $actualite = new Actualite($donnees);

        ?>
                 <div class="actualite"><a href="pages/article.php?id=<?= $actualite->id ?>">
                        <img src="uploads/<?= $actualite->lien_image ?>" alt="image article" title="image article">
                        <div class="actualite_preview_body">
                            <h2><?= $actualite->titre ?></h2>
                            <p><?= $actualite->syntheseTexte() ?></p>
                            <small><?= $actualite->getNomPrenomAuteur() . " " . $actualite->getDateFr() ?></small>
                        </div>
                    </a></div>
        <?php
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