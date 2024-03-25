<?php
require_once 'BDD.php';
class Actualite extends BDD
{
    /**id de l'actualité */
    public $id;
    /**titre de l'actualité */
    public $titre;
    /**texte de l'actualité */
    public $texte;
    /**lien de l'image de l'actualité */
    public $lien_image;
    /**date de creation de l'actualité */
    public $date;
    /**date de modification de l'actualité */
    public $date_revision;
    /**id de l'auteur */
    public $id_auteur;
    private $pdo;

    /**tags liées à l'actualité */
    public $id_tags;
    /**sources de l'actualité */
    public $sources;
    public static function get5Actualite($pdo)
    {
        
        $sql = "SELECT titre,texte,lien_image,date,actualites.id,date_revision,id_auteur,id_tags,sources FROM actualites ORDER BY date DESC LIMIT 5";
        $resultat = $pdo->query($sql);
        return $resultat;
    }
    public static function getActualiteArticle($pdo)
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $sql = "SELECT titre,texte,lien_image,date,actualites.id,date_revision,id_auteur,id_tags,sources FROM actualites WHERE id = " . $id . " ORDER BY date DESC LIMIT 5";
            $resultat = $pdo->query($sql);
            return $resultat;
        } else {
            header("location: ../index.php");
    }
    }
    public function __construct(array $values, $pdo)
    {
        $this->id = $values['id'];
        $this->titre = $values['titre'];
        $this->texte = $values['texte'];
        $this->lien_image = $values['lien_image'];
        $this->date = $values['date'];
        $this->date_revision = $values['date_revision'];
        $this->id_auteur = $values['id_auteur'];
        $this->id_tags = $values['id_tags'];
        $this->pdo = $pdo;
    }
    /**Fait la synthse de texte limité a 100caractere */
    public function syntheseTexte(): string
    {
        return substr($this->texte, 0, 100) . "...";
    }
    /**donne la date de l'article au format d/m/Y  */
    public function getDateFr(): string
    {
        return date("d/m/Y", strtotime($this->date));
    }
    /**donne la date de revision de l'article au format d/m/Y  */
    public function getDateRevisionFr(): string
    {
        return date("d/m/Y", strtotime($this->date_revision));
    }
    /**donne le nom et le prenom de l'auteur */
    public function getNomPrenomAuteur(): string
    {

        $sql = "SELECT nom, prenom FROM auteurs WHERE " . $this->id_auteur . " = auteurs.id LIMIT 1";
        $resultat_actualite = BDD::selectBDD($sql);

        while ($donnees_actualite = $resultat_actualite->fetch(PDO::FETCH_ASSOC)) {
            return $donnees_actualite['nom'] . " " . $donnees_actualite['prenom'];
        }
        return "";
    }
    /**donne les tags de l'article en liste */
    public function getTags(): string
    {

        $table_id_tag = explode('&', $this->id_tags);
        $tags = "<p>";
        foreach ($table_id_tag as $id_tag) {
            $sql = "SELECT nom FROM tags WHERE " . $id_tag . " = id";
            $resultat = BDD::selectBDD($sql);
            while ($donnees = $resultat->fetch(PDO::FETCH_ASSOC)) {
                $tags .= '<span class="tags">#' . $donnees['nom'] . " </span>";
            }
        }
        return $tags. "</p>";
    }
}
