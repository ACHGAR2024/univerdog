<?php
// Démarre une session
session_start();
$mes = "<h1>veuillez vous inscrire</h1>";
// Vérifie si l'utilisateur est connecté, redirige vers la page d'accueil s'il l'est
if (isset($_SESSION['utilisateur_connecte'])) {
    header("Location: accueil.php");
    $mes = '<h1 style ="font-size: 14px;margin-bottom: 10px;            
    color: #ffd761;">veuillez vous inscrire</h1>';
    exit();
} else {
    if (isset($_SESSION["message"])) {
        $mes = $_SESSION['message'];
    }
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

    <div class="login-container">




        <div class="login-form" style="max-width: 400px;padding-top: 100px;">

            <!-- image du logo -->
            <br>
            <p><img src="images/logochien.png" alt="logo chien" width="200px" style="margin-top: 300px;"></p>

            <!-- Affiche le message d'erreur si il y en a un -->
            <?php
            if (isset($mes)) {
                echo $mes;
            } else {
                echo '<p style="color:#272727;font-size: 14px;-webkit-animation: flash 1s linear;animation: flash 1s linear;">Veuillez vous s’inscrire.</p>';
            }


            ?>
            <br>
            <!-- Formulaire d'inscription -->
            <form action="traitement.php" method="POST" onsubmit="return verifSaisie()">

                <!-- Nom du chien -->
                <input type="text" id="nom_chien" name="nom_chien" placeholder="Saisissez le nom de chien" required
                    pattern="^[a-zA-ZàâäèéêëîïôœùûüÿçÀÂÄÈÉÊËÎÏÔŒÙÛÜŸÇ\s-]+$"
                    title="Le nom ne doit contenir que des lettres" style="margin-bottom: 10px;">
                <!-- Affiche un message d'erreur si le nom n'est pas valide -->
                <br>

                <!-- Date de naissance du chien -->
                <input type="date" id="date" name="date" required placeholder="La date de naissance de Chien"
                    pattern="^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$"
                    title="La de naissance du chien doit être au format AAAA-MM-JJ" style="margin-bottom: 10px;">
                <!-- Affiche un message d'erreur si la date n'est pas valide -->
                <br>


                <!-- Race du chien -->
                <select id="select" name="race" required
                    style="background-color: #fff; border: 1px solid #ccc; border-radius: 5px; padding: 10px; width: 100%; box-sizing: border-box; color: #000;margin-bottom: 10px;">
                    <option value="" disabled selected style="color: #000;">Sélectionnez la race de votre chien</option>
                    <option value="Bichon Frise" style="color: #000;">Bichon Frise</option>
                    <option value="Bernésse" style="color: #000;">Bernésse</option>
                    <option value="Beagle" style="color: #000;">Beagle</option>
                    <option value="Bloodhound" style="color: #000;">Bloodhound</option>
                    <option value="Boulonnais" style="color: #000;">Boulonnais</option>
                    <option value="Briard" style="color: #000;">Briard</option>
                    <option value="Chien d'Arrée" style="color: #000;">Chien d'Arrée</option>
                    <option value="Chien de berger" style="color: #000;">Chien de berger</option>
                    <option value="Chien de Terre" style="color: #000;">Chien de Terre</option>
                    <option value="Chihuahua" style="color: #000;">Chihuahua</option>
                    <option value="Chien de prairie" style="color: #000;">Chien de prairie</option>
                    <option value="Dalmatien" style="color: #000;">Dalmatien</option>
                    <option value="Dogo Argentino" style="color: #000;">Dogo Argentino</option>
                    <option value="Doberman" style="color: #000;">Doberman</option>
                    <option value="Fox Terrier" style="color: #000;">Fox Terrier</option>
                    <option value="Golden Retriever" style="color: #000;">Golden Retriever</option>
                    <option value="Gran Danes" style="color: #000;">Gran Danes</option>
                    <option value="Great Dane" style="color: #000;">Great Dane</option>
                    <option value="Hachiko" style="color: #000;">Hachiko</option>
                    <option value="Hound" style="color: #000;">Hound</option>
                    <option value="Irish Setter" style="color: #000;">Irish Setter</option>
                    <option value="Jack Russell Terrier" style="color: #000;">Jack Russell Terrier</option>
                    <option value="Labrador Retriever" style="color: #000;">Labrador Retriever</option>
                    <option value="Lhasa Apso" style="color: #000;">Lhasa Apso</option>
                    <option value="Maltese" style="color: #000;">Maltese</option>
                    <option value="Mastiff" style="color: #000;">Mastiff</option>
                    <option value="Poodle" style="color: #000;">Poodle</option>
                    <option value="Pudelpointer" style="color: #000;">Pudelpointer</option>
                    <option value="Rhodesian Ridgeback" style="color: #000;">Rhodesian Ridgeback</option>
                    <option value="Rottweiler" style="color: #000;">Rottweiler</option>
                    <option value="Schipperke" style="color: #000;">Schipperke</option>
                    <option value="Samoyed" style="color: #000;">Samoyed</option>
                    <option value="Setter" style="color: #000;">Setter</option>
                    <option value="Shar Pei" style="color: #000;">Shar Pei</option>
                    <option value="Siberian Husky" style="color: #000;">Siberian Husky</option>
                    <option value="Sighthound" style="color: #000;">Sighthound</option>
                    <option value="Terrier" style="color: #000;">Terrier</option>
                    <option value="Tibetain" style="color: #000;">Tibetain</option>
                    <option value="Vizsla" style="color: #000;">Vizsla</option>
                    <option value="Yorkshire Terrier" style="color: #000;">Yorkshire Terrier</option>
                    <option value="Autre" style="color: #000;">Autre</option>
                </select>
                <br>
                <!-- Formulaire de contact pour les utilisateurs -->
                <textarea id="message"
                    style="margin-bottom: 10px; width: 400px; resize: vertical; padding: 10px; border: 1px solid #ccc; border-radius: 5px; font-family: cursive;"
                    name="message" rows="4" placeholder="Parlez nous de votre chien" required
                    pattern="^[a-zA-ZàâäèéêëîïôœùûüÿçÀÂÄÈÉÊËÎÏÔŒÙÛÜŸÇ\s.,;:?!()-]+$"
                    title="Le message ne doit contenir que des lettres et des signes de ponctuation"></textarea>

                <!-- Champs de saisie pour l'envoi du formulaire -->
                <br>
                <hr>
                <br>
                <!-- Nom du chien -->
                <input type="text" id="nom_proprietaire" name="nom_proprietaire" placeholder="Saisissez votre nom"
                    required pattern="^[a-zA-ZàâäèéêëîïôœùûüÿçÀÂÄÈÉÊËÎÏÔŒÙÛÜŸÇ\s-]+$"
                    title="Le nom ne doit contenir que des lettres" style="margin-bottom: 10px;">
                <!-- Affiche un message d'erreur si le nom n'est pas valide -->
                <br>
                <!-- Email de l'utilisateur -->
                <input type="email" id="email" name="email" placeholder="Saisissez votre email" required
                    pattern="^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$"
                    title="Le format de l'email est invalide">
                <br>
                <!-- Numéro de téléphone de l'utilisateur -->
                <input type="tel" name="tel" pattern="^\d{10}$" placeholder="Votre numéro de téléphone" required
                    title="Le numéro de téléphone doit être composé de 10 chiffres">
                <br>




                <!-- Mot de passe de l'utilisateur -->
                <input type="password" name="password" id="passwordInput" placeholder="Mot de passe" required
                    pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$"
                    title="Le mot de passe doit contenir au moins 8 caractères, au moins une lettre minuscule, au moins une lettre majuscule, au moins un chiffre et au moins un caractère spécial">
                <br>
                <!-- Bouton de validation du formulaire -->
                <br>
                <hr>
                <br>

                <!-- Case à cocher pour accepter les conditions générales -->
                <div>

                    <table>

                        <tr>
                            <!--  conditions d'utilisation -->
                            <td tyle="top: 5px"><input type="checkbox" id="check" name="check" value="1" required
                                    style="color: #fff;margin-left: 10px" /></td>

                            <td
                                style="font-size: 0.8em; color: #fff;text-align: left; padding-left:10px;font-size: 10px;">
                                En cochant
                                cette case, je
                                confirme que j'ai lu et
                                que j'accepte les
                                règlements
                                de la
                                plateforme. </td>
                        </tr>
                    </table>
                </div>
                <br>
                <!-- Bouton de validation du formulaire -->
                <input type="submit" class="login-button" value="Envoyer">
            </form>

            <script>
                // Vérification de la saisie des champs obligatoires
                function verifSaisie() {
                    let nom = document.getElementById("nom").value;
                    let email = document.getElementById("email").value;
                    let date = document.getElementById("date").value;
                    let tel = document.getElementById("tel").value;
                    let situation = document.getElementById("select").value;
                    let password = document.getElementById("passwordInput").value;
                    let message = document.getElementById("message").value;

                    if (nom == "" || email == "" || date == "" || tel == "" || situation == "" || password == "" || message == "") {
                        alert("Veuillez remplir tous les champs obligatoires");
                        return false;
                    }
                }
            </script>
            <p class="compte lien">Ou connectez-vous directement</p>

            </p>
            <!-- Bouton de connexion -->
            <div class="social-buttons">
                <button class="google-button" onclick="window.location.href='connected.php'">
                    <table>
                        <tr>

                            <td style="padding: 7px 5px 10px 4px;">Connectez-vous</td>
                        </tr>
                    </table>
                </button>



            </div>
        </div>
    </div>
</body>

</html>
<?php

?>