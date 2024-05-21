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
            <h3 style="font-size:12px">Nouveau de mot de passe</h3>
            
			<br><form action="mdp_traitement.php?email=<?php echo $_GET['email'];?>&token=<?php echo $_GET['token'];?>" method="post">
                <!-- Champ mot de passe -->
                <input type="password" id="password1" name="password1" placeholder="Saisir un nouveau mot de passe" required>
				<!-- Champ mot de passe -->
                <input type="password" id="password2" name="password2" placeholder="Confirmer le nouveau mot de passe" required>

                <!-- Bouton de connexion -->
                <button type="submit" class="login-button">Envoyer</button>
            </form>

        </div>
    </div><br>
    <p></p>
    <!-- Fin DIV pour le contenu de cette page  -->
	<!-- Script -->
	<script>
// JavaScript pour vérifier que les mots de passe correspondent
var password = document.getElementById("password1"),
    confirm_password = document.getElementById("password2");

function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Les mots de passe ne correspondent pas.");
  } else {
    confirm_password.setCustomValidity('');
  }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;
</script>
</body>

</html>