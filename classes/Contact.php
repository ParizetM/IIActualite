<?php 
class Contact {
    public string $nom;
    public string $prenom;
    public string $mail;
    public string $titre;
    public string $message;
    private $pdo;

    public static function verif_contact() {

    }
    function __construct($pdo, $values) {
        $this->nom = $values['nom'];
        $this->prenom = $values['prenom'];
        $this->mail = $values['mail'];
        $this->titre = $values['titre'];
        $this->message = $values['message'];
        $this->pdo = $pdo;

    }

    function envoyerContact() {
        $query = "INSERT INTO contacts (nom, prenom, mail, titre, message) VALUES (:nom, :prenom, :mail, :titre, :message)";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':nom', $this->nom, PDO::PARAM_STR);
        $stmt->bindParam(':prenom', $this->prenom, PDO::PARAM_STR);
        $stmt->bindParam(':mail', $this->mail, PDO::PARAM_STR);
        $stmt->bindParam(':titre', $this->titre, PDO::PARAM_STR);
        $stmt->bindParam(':message', $this->message, PDO::PARAM_STR);
        $stmt->execute();
        header('Location: ../index.php?envoi=true');
    }
}
