<?php


require_once "../includes/PDO.php";
// include "../includes/debugger.php";
require_once "../classes/Contact.php";
if (isset($_POST['soumettre'])) {
    $contact = new Contact($pdo, $_POST);
    $contact->envoyerContact();
}
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
        <h1>Contactez-nous</h1>
        
        <form action="Contact.php" method="post">
        
            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="nom" required>

            <label for="prenom">Prénom :</label>
            <input type="text" id="prenom" name="prenom" required>

            <label for="mail">Email :</label>
            <input type="email" id="mail" name="mail" required>

            <label for="titre">Titre du Message :</label>
            <input type="text" id="titre" name="titre" required>

            <label for="message">Message :</label>
            <textarea id="message" name="message" rows="4" required></textarea>

            <input type="submit" name="soumettre" value="Envoyer">
        </form>
    </main>
    <footer>
        <?php
        include '../includes/footer.php';
        ?>
    </footer>
</body>

</html>