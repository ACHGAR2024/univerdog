<?php
// Démarre une session
session_start();

// Vérifie si l'utilisateur est connecté, redirige vers la page d'accueil s'il l'est
if (isset($_SESSION['utilisateur_connecte'])) {

    header("Location: accueil.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="FR-fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style_connected.css">
    <title>Login Page</title>

</head>

<body>
    <!-- DIV qui contient le logo et le titre de la page -->
    <div class="logo">
        <!-- Image du logo -->
        <img src="images/logochien.png" alt="logo chien" width="200px">
    </div>
    <!-- DIV qui contient le formulaire de connexion -->
    <div class="login-container">
        <!-- DIV qui contient le formulaire -->
        <div class="login-form">
            <!-- Espacement entre les éléments du formulaire -->
            <br>
            <br>
            <!-- Titre de la page -->
            <h1>Bienvenue</h1>
            <!-- Affiche un message d'erreur si il y en a un -->
            <?php
            if (isset($_GET["message"])) {
                echo '<p id="message" style="color:#ffff00;-webkit-animation: flash 1s linear;animation: flash 1s linear;"> <img  src="images/attention.png" width="24px" height="24px"> ' . htmlspecialchars($_GET["message"]) . '! <img  src="images/attention.png" width="24px" height="24px"></p>';
            } else {
                echo '<p>Veuillez vous connecter à votre compte.</p>';
            }

            ?>



            <!-- Formulaire de connexion -->
            <form action="connected_traitement.php" method="post">
                <!-- Champ email -->
                <input type="email" id="email" name="email" placeholder="Email" required>
                <!-- Champ mot de passe -->
                <input type="password" id="password" name="password" placeholder="Mot de passe" required>
                <!-- Lien pour oublier le mot de passe -->
                <a href="motdepasseoublier.php">
                    <p class="text-password">Vous avez oublié votre mot de passe ?</p>
                </a>

                <!-- Bouton de connexion -->
                <button type="submit" class="login-button">Se connecter</button>
            </form>
            <!-- lien vers le bouton de connexion via Google et Facebook -->
            <p class="compte lien">Ou connectez-vous avec</p>

            <div class="social-buttons">
                <!-- Bouton de connexion via Google -->
                <button class="google-button">
                    <!-- Tableau qui contient l'image du logo de Google et le texte -->
                    <table>
                        <tr>
                            <!-- Image du logo de Google -->
                            <td><img class="logo-google" src="images/logo_google_48.png" width="24px" height="24px"
                                    alt="Google"></td>
                            <!-- Texte du bouton -->
                            <td style="padding: 5px 10px;">Google</td>
                        </tr>
                    </table>
                </button>
                <!-- Bouton de connexion via Facebook -->
                <button class="facebook-button">
                    <!-- Tableau qui contient l'image du logo de Facebook et le texte -->
                    <table>
                        <tr>
                            <!-- Image du logo de Facebook -->
                            <td><img class="logo-google" src="images/facebook_100.png" width="24px" height="24px"
                                    alt="Google"></td>
                            <!-- Texte du bouton -->
                            <td style="padding: 5px 10px;">Facebook</td>
                        </tr>
                    </table>
                </button>
            </div>
            <!-- Lien vers la page d'inscription -->
            <p class="compte lien">Vous n'avez pas de compte ? <a id="lien" href="inscreption.php">S'inscrire</a></p>
        </div>
    </div>
</body>

</html>