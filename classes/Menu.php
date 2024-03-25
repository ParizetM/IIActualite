<?php
require_once "BDD.php";
class Menu extends BDD
{
    /**Nom de la table */
    public string $nom_table;
    public function __construct(string $nom_table)
    {
        $this->nom_table = $nom_table;
    }
    static function issetId()
    {

        if (isset($_GET['id'])) {
            $tableName = $_GET['id'];
            $sql = "SHOW TABLES LIKE '$tableName'";
            $result = BDD::selectBDD($sql);
            if ($result->rowCount() == 0) {
                // La table n'existe pas
                header("location: ../index.php?message=Erreur de chargement de la page(la table n'existe pas)");
                exit();
            }
        } else {

            header("location: ../index.php?message=Erreur de chargement de la page");
            return "ca marche du tout";
        }
    }
    function afficherMenu()
    {
?>
        <div class="menu">
            <ion-icon name="menu" size="large" title="menu"></ion-icon>
            <div class="menu_body">

                <?=
                $this->afficherCategorieMenu();
                ?>
                <a href="../pages/edit-menu.php?id=<?= $this->nom_table ?>" class="menu_edit"><ion-icon name="create-outline" size="large" title="modifier"></ion-icon></a>
            </div>
        </div>
    <?php
    }
    function afficherCategorieMenu()
    {

        $sql = "SELECT * FROM " . $this->nom_table . " WHERE is_categorie = 1 ORDER BY priorite";
        $resultat = BDD::selectBDD($sql);
        while ($donnees = $resultat->fetch(PDO::FETCH_ASSOC)) {

            echo '<ul><li class="menu_categorie"><a href="' . $donnees['lien'] . '" >' . $donnees['nom'] . '</a><li>';
            $sql = "SELECT * FROM " . $this->nom_table . " WHERE id_categorie = " . $donnees['id'] . " ORDER BY priorite";
            $resultat_sous_menu = BDD::selectBDD($sql);
            while ($donnees_sous_menu = $resultat_sous_menu->fetch(PDO::FETCH_ASSOC)) {
                echo '<li><a href="' . $donnees_sous_menu['lien'] . '" class="menu_sous_categorie">' . $donnees_sous_menu['nom'] . '</a></li>';
            }
            echo '</ul>';
        }
    }
    function afficherEditMenu()
    {
    ?>
        <div class="menu menu-apercu">
            <ion-icon name="menu" size="large" title="menu"></ion-icon>
            <div class="menu_body">

                <?=
                $this->afficherCategorieMenu();
                ?>
                <a href="../pages/edit-menu.php?id=<?= $this->nom_table ?>" class="menu_edit"></a>

            </div>
        </div>
<?php
    }
    function getNomMenu()
    {
        return $this->nom_table;
    }
}
