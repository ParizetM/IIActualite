<?php
require_once "../classes/Menu.php";
Menu::issetId();
$menu = new Menu($_GET['id']);
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/style.css">
    <link rel="icon" href="medias/logo-iia-200x200.png" type="image/icon type" />
    <title>IIActualité - Modifier le menu</title>
</head>

<body>
    <header>
        <?php
        include '../includes/header.php';
        ?>
    </header>
    <main>
        <h1>Modifier le menu "<?= $menu->getNomMenu() ?>"</h1>
        <h3 id="text-apercu">aperçu :</h3>
        <?php $menu->afficherEditMenu(); ?>
    </main>
    <footer>
        <?php
        include '../includes/footer.php';
        ?>
    </footer>
</body>

</html>