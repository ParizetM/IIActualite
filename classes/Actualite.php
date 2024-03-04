<?php 
Class Actualite {
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
    /**prenom de l'auteur de l'actualité */
    public $prenom_auteur;
    /**nom de l'auteur de l'actualité */
    public $nom_auteur;

    /**tags liées à l'actualité */
    public $id_tags;
    /**sources de l'actualité */
    public $sources;
    /**Constructeur de la class actualite
     * @param int $id id de l'actualite
     * @param string $titre titre de l'actu
     * @param string $texte texte de l'actu
     * @param string $lien_image lien de l'image de l'actu
     * @param string $date date de creation de l'actu
     * @param string $date_revision date de revision de l'actu
     * @param int $id_auteur id de l'auteuer de l'actu
     * @param string $id_tags tags lié a l'actu
     * @param string $sources sources de l'actu
     */
    public function __construct(int $id,string $titre, string $texte, string $lien_image, string $date,string $date_revision,string $prenom_auteur,string $nom_auteur,string $id_tags,string $sources)
    {
        $this->id = $id;
        $this->titre = $titre;
        $this->texte = $texte;
        $this->lien_image = $lien_image;
        $this->date = $date;
        $this->date_revision = $date_revision;
        $this->prenom_auteur = $prenom_auteur;
        $this->nom_auteur = $nom_auteur;
        $this->id_tags = $id_tags;
        $this->sources =  $sources;
    }
    /**
     * synthése du texte de l'actualité
     * - sans parametres
     */
    public function syntheseTexte() :string{
        return substr($this->texte, 0,100)."...";
    }
    // public function getTitre() :string 
    // {
    //     return $this->titre;
    // }
    // public function getTexte() :string
    // {
    //     return $this->texte;
    // }
    // public function getLien_image() :string 
    // {
    //     return $this->lien_image;
    // }
    // public function getDate() :string
    // {
    //     return $this->date;
    // }
    // public function getDate_revision() : string
    // {
    //     return $this->date_revision;
    // }
    
}

