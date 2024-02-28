<?php


require_once "../includes/PDO.php";
// include "../includes/debugger.php";
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
        <h2>Mentions Légales</h2>

        <section>
            <h3>Informations générales</h3>
            <p>Raison sociale : IIA Saint-Nazaire</p>
            <p>Adresse : 123 Rue des Programmateurs, 44000 Saint-Nazaire</p>
            <p>Téléphone : +33 1 23 45 67 89</p>
            <p>Email : info@iia-saintnazaire.com</p>
            <p>Directeur de la publication : John Doe</p>
        </section>

        <section>
            <h3>Hébergement du site</h3>
            <p>Nom de l'hébergeur : Hosting Solutions</p>
            <p>Adresse de l'hébergeur : 456 Rue du Serveur, 75000 Datacenter Ville</p>
        </section>

        <section>
            <h3>Propriété intellectuelle</h3>
            <p>Le contenu de ce site est protégé par les lois sur la propriété intellectuelle. Toute reproduction, distribution ou utilisation non autorisée du contenu est interdite.</p>
        </section>
    </main>
    <footer>
        <?php
        include '../includes/footer.php';
        ?>
    </footer>
</body>

</html>