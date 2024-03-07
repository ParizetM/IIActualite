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
            $resultat = Actualite::getActualiteArticle($pdo);
            while ($donnees = $resultat->fetch(PDO::FETCH_ASSOC)) {
                $actualite = new Actualite($donnees, $pdo);

        ?>
                <div class="actu_container_article">
                    <h1><?= $actualite->titre ?></h1>
                    <img src="../uploads/<?= $actualite->lien_image ?>" alt="lien image" title="lien image" width="600px">
                    <p><?= $actualite->texte ?></p>
                    <p> Ecrit par <?= $actualite->getNomPrenomAuteur() ?> Le <?= $actualite->getDateFr() ?></p>
                    <p>Revision Le <?= $actualite->getDateRevisionFr() ?></p>
                    <?= $actualite->getTags() ?>
                </div>
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