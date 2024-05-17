<?php
// Démarre une session
session_start();

// Vérifie si l'utilisateur est connecté, redirige vers la page de connexion s'il ne l'est pas
if (!isset($_SESSION['utilisateur_connecte'])) {

    header("Location: connected.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="FR-fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style_connected.css">
    <link rel="stylesheet" href="css/style_accueil.css">

    <title>Login Page</title>

</head>

<body>
    <!-- Lien de déconnexion -->
    <div class="deconnexion">
        <a href="deconnexion.php" class="buttonDeconnexion">Déconnexion</a>
    </div>

    <!-- DIV pour le logo -->
    <div class="logo">
        <!-- image du logo -->
        <img src="images/logochien.png" alt="logo chien" width="200px">
    </div>
    <!-- DIV pour le contenu de la page d'accueil -->
    <div class="menu_accueil_images">
        <div class="box_carte_images box1">

            <p class="texte">Toilettage et Coiffure</p>

        </div>
        <div class="box_carte_images box2">

            <p class="texte">Vente de Produits pour Chiens</p>

        </div>
        <div class="box_carte_images box3">

            <p class="texte">Services Vétérinaires </p>

        </div>
        <div class="box_carte_images box4">

            <p class="texte">Localisation de Services</p>

        </div>
        <div class="box_carte_images box5">

            <p class="texte">Formation et Éducation</p>

        </div>
        <div class="box_carte_images box6">

            <p class="texte">Service de Garde pour chiens</p>

        </div>
        <div class="box_carte_images box7">

            <p class="texte">Administration licences enregistrements</p>

        </div>
        <div class="box_carte_images box8">

            <p class="texte">Voyages et destinations pour Chiens</p>

        </div>
        <div class="box_carte_images box9" onclick="window.location.href='chatgpt.html';">

            <p class="texte">Conseil en Intelligence Artificielle</p>

        </div>



    </div><br>
    <p></p>
    <!-- Fin DIV pour le contenu de la page d'accueil -->
</body>

</html>