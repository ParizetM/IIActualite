<?php 

class Auteur {
    /** id de l'auteur */
    public $id;
    /** nom de l'auteur */
    public $nom;
    /** prenom de l'auteur */
    public $prenom;
    /**Constructeur de l'auteur
     * @param string $nom nom de l'auteur
     * @param string $prenom prenom de l'auteur
     * @param string $id id de l'auteur
     */
    public function __construct(int $id, string $nom, string $prenom) {
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
    }
}