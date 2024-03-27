<?php
require_once "../classes/Menu.php";
// Menu::issetId();

$menu = new Menu($_GET['id']);
if (!isset($_GET['verifsuppr'])) {

    if (isset($_GET['deleteverif']) && $_GET['deleteverif'] == 1) {
        $menu->deleteLigneMenuEditCategorieEtSousCat($_GET['delete']);
    }
    if (isset($_GET['deleteCate'])) {
        $menu->deleteLigneMenuEditCategorie($_GET['deleteCate']);
    }
    if (isset($_GET['delete-sous-cate'])) {
        $menu->deleteLigneMenuEditSousCategorie($_GET['delete-sous-cate']);
    }
    if (isset($_GET['id-ligne'], $_GET['nom-ligne'], $_GET['lien-ligne']) && !isset($_GET['nom-categorie'])) {
        $menu->updateLigneMenuEditCategorie($_GET['id-ligne'], $_GET['nom-ligne'], $_GET['lien-ligne']);
    }
    if (isset($_GET['id-ligne'], $_GET['nom-ligne'], $_GET['lien-ligne']) && isset($_GET['nom-categorie'])) {
        $menu->updateLigneMenuEditSousCate($_GET['id-ligne'], $_GET['nom-ligne'], $_GET['lien-ligne'], $_GET['nom-categorie']);
    }
    if (isset($_GET['add-cate'], $_GET['nom-add-ligne'], $_GET['lien-add-ligne'])) {
        $menu->addLigneMenuEditCategorie($_GET['nom-add-ligne'], $_GET['lien-add-ligne']);
    }
    if (isset($_GET['add-sous-cate'], $_GET['nom-add-ligne'], $_GET['lien-add-ligne'], $_GET['nom-categorie'])) {
        $menu->addLigneMenuEditSousCategorie($_GET['nom-add-ligne'], $_GET['lien-add-ligne'], $_GET['nom-categorie']);
    }
    if (isset($_GET['move-up-cate'])) {
        $menu->move($_GET['move-up-cate'], 1,1);
    }
    if (isset($_GET['move-up-sous-cate'])) {
        $menu->move($_GET['move-up-sous-cate'], 0,1);
    }
    if (isset($_GET['move-down-cate'])) {
        $menu->move($_GET['move-down-cate'], 1,0);
    }
    if (isset($_GET['move-down-sous-cate'])) {
        $menu->move($_GET['move-down-sous-cate'], 0,0);
    }
}
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
        <?php
        if (isset($_GET['verifsuppr'])) {
            $menu->verifSupprCategorie($_GET['verifsuppr']);
        } else {
        ?>
            <div class="edit_container">
                <h1>Modifier le menu "<?= $menu->getNomMenu() ?>"</h1>
                <h3 id="text-apercu">aperçu :</h3>
                <?php $menu->afficherEditMenu(); ?>
                <?php $menu->editligneMenu(); ?>
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