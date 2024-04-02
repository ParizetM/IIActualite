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
    function editligneMenu()
    {
        $sql = "SELECT * FROM " . $this->nom_table . " WHERE is_categorie = 1 ORDER BY priorite";
        $resultat = BDD::selectBDD($sql);
    ?>
        <div class="tableaux-edit">
            <h2>Catégories :</h2>
            <h2>Sous-catégories :</h2>
        </div>
        <div class="tableaux-edit">
            <table class="tableau-edit">

                <tr>
                    <td>Nom</td>
                    <td>Lien</td>
                </tr>
                <?php
                while ($donnees = $resultat->fetch(PDO::FETCH_ASSOC)) {
                ?>


                    <tr>

                        <form action="" method="get">
                            <input type="hidden" value="<?= $donnees['id'] ?>" name="id-ligne">
                            <input type="hidden" value="<?= $this->getNomMenu() ?>" name="id">
                            <input type="hidden" value="0" name="nom-categorie">
                            <td><input type="text" value="<?= $donnees['nom'] ?>" name="nom-ligne"></td>
                            <td><input type="text" value="<?= $donnees['lien'] ?>" name="lien-ligne"></td>
                            <td class="no_border">
                                <div class="boutons_tableau">

                                    <a href="<?php echo $_SERVER['PHP_SELF']; ?>?id=<?= $this->getNomMenu() ?>&deleteCate=<?= $donnees['id'] ?>&is_categorie=1" title="Supprimer"><ion-icon name="trash-outline"></ion-icon></a>

                                    <div class="move_tableau no_border">
                                        <?php
                                        $sql = "SELECT priorite FROM " . $this->nom_table . " WHERE is_categorie = 1 ORDER BY priorite";
                                        $prioPremier = BDD::selectFirstBDD($sql)['priorite'];
                                        if ($donnees['priorite'] != $prioPremier) {
                                        ?>
                                            <a href="<?php echo $_SERVER['PHP_SELF']; ?>?id=<?= $this->getNomMenu() ?>&move-up-cate=<?= $donnees['id'] ?>" title="Monter"><ion-icon name="chevron-up-outline"></ion-icon></a>
                                        <?php
                                        }
                                        $sql = "SELECT priorite FROM " . $this->nom_table . " WHERE is_categorie = 1 ORDER BY priorite";
                                        $prioDernier = BDD::selectLastBDD($sql)['priorite'];
                                        if ($donnees['priorite'] != $prioDernier) {
                                        ?>
                                            <a href="<?php echo $_SERVER['PHP_SELF']; ?>?id=<?= $this->getNomMenu() ?>&move-down-cate=<?= $donnees['id'] ?>" title="Descendre"><ion-icon name="chevron-down-outline"></ion-icon></a>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                    <button submit><ion-icon name="checkmark-circle-outline"></ion-icon></button>
                                </div>
                            </td>
                        </form>
                    </tr>


                <?php
                }
                ?>
                <form action="" method="get">
                    <input type="hidden" value="<?= $this->getNomMenu() ?>" name="id">
                    <input type="hidden" value="0" name="nom-categorie">
                    <td><input required type="text" placeholder="Nom de catégorie" name="nom-add-ligne"></td>
                    <td><input required type="text" placeholder="Lien de catégorie" value="#" name="lien-add-ligne"></td>
                    <td class="no_border">
                        <div class="boutons_tableau">
                            <button submit title="ajouter"><ion-icon name="add-circle-outline"></ion-icon></button>
                        </div>
                </form>
            </table>
            <table class="tableau-edit">

                <tr>
                    <td>Nom</td>
                    <td>Lien</td>
                </tr>
                <?php
                $sql = "SELECT * FROM " . $this->nom_table . " WHERE is_categorie = 0 ORDER BY priorite";
                $resultat = BDD::selectBDD($sql);
                while ($donnees = $resultat->fetch(PDO::FETCH_ASSOC)) {
                ?>


                    <tr>
                        <form action="" method="get">
                            <input type="hidden" value="<?= $donnees['id'] ?>" name="id-ligne">
                            <input type="hidden" value="<?= $this->getNomMenu() ?>" name="id">
                            <td><input type="text" value="<?= $donnees['nom'] ?>" name="nom-ligne"></td>
                            <td><input type="text" value="<?= $donnees['lien'] ?>" name="lien-ligne"></td>
                            <td><?php echo $this->generateSelectCate($donnees['id_categorie']) ?></td>
                            <td class="no_border">
                                <div class="boutons_tableau">

                                    <a href="<?php echo $_SERVER['PHP_SELF']; ?>?id=<?= $this->getNomMenu() ?>&deleteCate=<?= $donnees['id'] ?>&is_categorie=0" title="Supprimer"><ion-icon name="trash-outline"></ion-icon></a>

                                    <div class="move_tableau no_border">
                                        <?php
                                        $sql = "SELECT priorite FROM " . $this->nom_table . " WHERE is_categorie = 0 ORDER BY priorite";
                                        $prioPremier = BDD::selectFirstBDD($sql)['priorite'];
                                        if ($donnees['priorite'] != $prioPremier) {
                                        ?>
                                            <a href="<?php echo $_SERVER['PHP_SELF']; ?>?id=<?= $this->getNomMenu() ?>&move-up-sous-cate=<?= $donnees['id'] ?>" title="Monter"><ion-icon name="chevron-up-outline"></ion-icon></a>
                                        <?php
                                        }
                                        $sql = "SELECT priorite FROM " . $this->nom_table . " WHERE is_categorie = 0 ORDER BY priorite";
                                        $prioDernier = BDD::selectLastBDD($sql)['priorite'];
                                        if ($donnees['priorite'] != $prioDernier) {
                                        ?>
                                            <a href="<?php echo $_SERVER['PHP_SELF']; ?>?id=<?= $this->getNomMenu() ?>&move-down-sous-cate=<?= $donnees['id'] ?>" title="Descendre"><ion-icon name="chevron-down-outline"></ion-icon></a>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                    <button submit><ion-icon name="checkmark-circle-outline"></ion-icon></button>
                                </div>
                            </td>
                        </form>
                    </tr>


                <?php
                }
                ?>
                <form action="" method="get">
                    <input type="hidden" value="<?= $this->getNomMenu() ?>" name="id">
                    <td><input required type="text" placeholder="Nom de catégorie" name="nom-add-ligne"></td>
                    <td><input required type="text" placeholder="Lien de catégorie" value="#" name="lien-add-ligne"></td>
                    <td><?php echo $this->generateSelectCate(0) ?></td>
                    <td class="no_border">
                        <div class="boutons_tableau">
                            <button submit title="ajouter"><ion-icon name="add-circle-outline"></ion-icon></button>
                        </div>
                </form>
            </table>
        </div>
    <?php
    }
    function move($id, $isCategorie, $direction)
    {
        $sql = "SELECT priorite FROM " . $this->nom_table . " WHERE id = " . $id;
        $priorite = BDD::selectFirstBDD($sql)['priorite'];

        if ($direction == 1) {
            $sql = "SELECT id FROM " . $this->nom_table . " WHERE is_categorie = " . $isCategorie . " AND priorite < " . $priorite . " ORDER BY priorite DESC";
            $idDessus = BDD::selectFirstBDD($sql)['id'];
            $sql = "SELECT id FROM " . $this->nom_table . " WHERE is_categorie = " . $isCategorie . " AND priorite < " . ($priorite - 1);
            $resultat = BDD::selectBDD($sql);
            $prioScale = 1;
            foreach ($resultat as $donnees) {
                $sql = "SELECT priorite,id FROM " . $this->nom_table . " WHERE id = " . $id;
                $prioriteActuelle = BDD::selectFirstBDD($sql)['priorite'];
                $prioScale += 1;
                $sql = "UPDATE " . $this->nom_table . " SET priorite = " . ($prioriteActuelle - $prioScale) . " WHERE id = " . $donnees['id'];

                BDD::insertBDD($sql);
            }
            $sql = "UPDATE " . $this->nom_table . " SET priorite = " . $priorite . " WHERE id = " . $idDessus;
            BDD::insertBDD($sql);
            $sql = "UPDATE " . $this->nom_table . " SET priorite = " . ($priorite - 1) . " WHERE id = " . $id;
            BDD::insertBDD($sql);
        } elseif ($direction == 0) {
            $sql = "SELECT id FROM " . $this->nom_table . " WHERE is_categorie = " . $isCategorie . " AND priorite > " . $priorite . " ORDER BY priorite ASC";
            $idDessous = BDD::selectFirstBDD($sql)['id'];
            $sql = "SELECT id FROM " . $this->nom_table . " WHERE is_categorie = " . $isCategorie . " AND priorite > " . ($priorite + 1);
            $resultat = BDD::selectBDD($sql);
            $prioScale = 1;
            foreach ($resultat as $donnees) {
                $sql = "SELECT priorite,id FROM " . $this->nom_table . " WHERE id = " . $id;
                $prioriteActuelle = BDD::selectFirstBDD($sql)['priorite'];
                $prioScale += 1;
                $sql = "UPDATE " . $this->nom_table . " SET priorite = " . ($prioriteActuelle + $prioScale) . " WHERE id = " . $donnees['id'];

                BDD::insertBDD($sql);
            }
            $sql = "UPDATE " . $this->nom_table . " SET priorite = " . $priorite . " WHERE id = " . $idDessous;
            BDD::insertBDD($sql);
            $sql = "UPDATE " . $this->nom_table . " SET priorite = " . ($priorite + 1) . " WHERE id = " . $id;
            BDD::insertBDD($sql);
        }

        header("location: ../pages/edit-menu.php?id=" . $this->nom_table);
    }
    private function generateSelectCate($cate_actuelle)
    {
        $sql = "SELECT * FROM " . $this->nom_table . " WHERE is_categorie = 1 ORDER BY priorite";
        $resultat = BDD::selectBDD($sql);
        $select = '<select name="nom-categorie" id="" class="no_border">';
        while ($donnees = $resultat->fetch(PDO::FETCH_ASSOC)) {
            if ($donnees['id'] == $cate_actuelle) {
                $select .= '<option value="' . $donnees['id'] . '" selected>' . $donnees['nom'] . '</option>';
            } else {
                $select .= '<option value="' . $donnees['id'] . '">' . $donnees['nom'] . '</option>';
            }
        }
        $select .= '</select>';
        return $select;
    }
    function addLigneMenuEditCategorie($nom, $lien, $id_categorie)
    {
        $is_categorie = ($id_categorie == 0) ? 1 : 0;
        $sql = "SELECT priorite FROM " . $this->nom_table . " WHERE is_categorie = " . $is_categorie . " ORDER BY priorite DESC";
        $resultat = BDD::selectFirstBDD($sql)['priorite'];
        $resultat += 1;
        $sql = "INSERT INTO " . $this->nom_table . " (nom, id_categorie, is_categorie, priorite, lien) VALUES ('" . $nom . "', " . $id_categorie . ", " . $is_categorie . ", " . $resultat . ", '" . $lien . "')";
        BDD::insertBDD($sql);
        header("location: ../pages/edit-menu.php?id=" . $this->nom_table);
    }
    function deleteLigneMenuEdit($id, $is_categorie)
    {
        if ($is_categorie == 1) {
            $sql = "SELECT id FROM " . $this->nom_table . " WHERE id_categorie = " . $id;
            $resultat = BDD::selectBDD($sql);
            if ($resultat->rowCount() > 0) {
                header("location: ../pages/edit-menu.php?id=" . $this->nom_table . "&verifsuppr=" . $id);
                exit();
            }
        }
        $sql = "DELETE FROM " . $this->nom_table . " WHERE id = " . $id;
        BDD::insertBDD($sql);
        header("location: ../pages/edit-menu.php?id=" . $this->nom_table);
    }
    function deleteLigneMenuEditCategorieEtSousCat($id)
    {
        $sql = "SELECT id FROM " . $this->nom_table . " WHERE id_categorie = " . $id;
        $resultat = BDD::selectBDD($sql);
        foreach ($resultat as $donnees) {
            $sql = "DELETE FROM " . $this->nom_table . " WHERE id = " . $donnees['id'];
            BDD::insertBDD($sql);
        }
        $sql = "DELETE FROM " . $this->nom_table . " WHERE id = " . $id;
        BDD::insertBDD($sql);
        header("location: ../pages/edit-menu.php?id=" . $this->nom_table);
    }
    function verifSupprCategorie($id)
    {
        $sql = "SELECT nom FROM " . $this->nom_table . " WHERE id = " . $id;
        $nom = BDD::selectFirstBDD($sql)['nom'];
        $sql = "SELECT * FROM " . $this->nom_table . " WHERE id_categorie = " . $id;
        $resultat = BDD::selectBDD($sql);

    ?>
        <div class="verif_suppr">
            <h2>Attention !</h2>
            <h1>Vous êtes sur le point de supprimer une catégorie contenant des sous-catégories. Voulez-vous vraiment supprimer cette catégorie et toutes ses sous-catégories ?</h1>
            <h2>Catégorie : <?= $nom ?></h2>
            <h3>Sous-catégories :</h3>
            <?php
            foreach ($resultat as $donnees) {
                echo '<h3>-' . $donnees['nom'] . '<br/></h3>';
            }
            ?>
            <div class="boutons_verif">
                <a href="<?php echo $_SERVER['PHP_SELF']; ?>?id=<?= $this->getNomMenu() ?>&delete=<?= $id ?>&deleteverif=1" title="Supprimer"><ion-icon name="trash-outline" size="large"></ion-icon></a>
                <a href="<?php echo $_SERVER['PHP_SELF']; ?>?id=<?= $this->getNomMenu() ?>" title="Annuler"><ion-icon name="close-outline" size="large"></ion-icon></a>
            </div>
    <?php
    }
    function updateLigneMenuEdit($id, $nom, $lien, $id_categorie)
    {
        if ($id_categorie == 0) {
            $sql = "UPDATE " . $this->nom_table . " SET nom = '" . $nom . "', lien = '" . $lien . "' WHERE id = " . $id;
        } else {
            $sql = "UPDATE " . $this->nom_table . " SET nom = '" . $nom . "', lien = '" . $lien . "', id_categorie = " . $id_categorie . " WHERE id = " . $id;
        }
        BDD::insertBDD($sql);
        header("location: ../pages/edit-menu.php?id=" . $this->nom_table);
    }
}
