<?php

if (basename($_SERVER['PHP_SELF']) == 'index.php') {
    require_once "classes/Menu.php";
    $menu = new Menu("menu");
?>

    <a href="index.php"><img src="medias/logo-iia-200x200.png" alt="logo iia" title="logo iia"></a>
    <a href="index.php"><span>Accueil</span></a>
    <div class="menu">
        <ion-icon name="menu" size="large" title="menu"></ion-icon>
        <div class="menu_body">

            <?=
            $menu->afficherCategorieMenu();
            ?>
            <a href="pages/edit-menu.php?id=<?= $menu->nom_table ?>" class="menu_edit"><ion-icon name="create-outline" size="large" title="modifier"></ion-icon></a>
        </div>
    </div>
<?php
} else {
    require_once "../classes/Menu.php";
    $menu = new Menu("menu");
?>
    <a href="../index.php"><img src="../medias/logo-iia-200x200.png" alt="logo iia" title="logo iia"></a>
    <a href="../index.php"><span>Accueil</span></a>

<?php
    $menu->afficherMenu();
}

?>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>