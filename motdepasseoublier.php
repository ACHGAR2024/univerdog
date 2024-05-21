<!DOCTYPE html>
<html lang="FR-fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style_connected.css">
    <title>Mot de passe oublier</title>

</head>

<body>

    <!-- DIV pour le logo -->
    <div class="logo">
        <!-- image du logo -->
        <img src="images/logochien.png" alt="logo chien" width="200px">
    </div>
    <!-- DIV pour le contenu de la page  -->
    <div class="login-form">
        <div class="login-container">
            <h1>Formulaire de recupération de Mot de passe</h1>
            <form action="mail_mdp_traitement.php" method="post">
                <!-- Champ email -->
                <input type="email" id="email" name="email" placeholder="Votre Email ici" required>

                <!-- Bouton de connexion -->
                <button type="submit" class="login-button">Envoyer</button>
            </form>

        </div>
    </div><br>
    <p></p>
    <!-- Fin DIV pour le contenu de cette page  -->
</body>

</html>