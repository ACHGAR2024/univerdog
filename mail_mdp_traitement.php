<?php
$mail_mdp_oubl = $_POST["email"]; // Assurez-vous de valider et de nettoyer cette variable correctement
$token = "k542215ppgppg";
$message = <<<EOT
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Changement de Mot de Passe</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            margin: 20px 0;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }
        .button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Changement de votre mot de passe</h1>
        <p>Bonjour,</p>
        <p>Vous avez demandé à réinitialiser votre mot de passe sur Univerdog. Veuillez cliquer sur le bouton ci-dessous pour choisir un nouveau mot de passe.</p>
        <a href="http://localhost/univerdog/mdp_changement.php?email={$mail_mdp_oubl}&token={$token}" . uniqid() . "' class='button'>Changer mon mot de passe</a>
        <p>Si vous n'avez pas demandé à changer de mot de passe, veuillez ignorer cet e-mail ou nous prévenir immédiatement.</p>
        <p>Cordialement,</p>
        <p>L'équipe Univerdog</p>
    </div>
</body>
</html>
EOT;
echo $message;
/*
// Assurez-vous que les en-têtes sont correctement définis pour le contenu HTML
$headers = "From: contact@univerdog.fr";
$headers .= "\r\nReply-To: contact@univerdog.fr";
$headers .= "\r\nContent-type: text/html; charset=UTF-8";

// Envoi du mail
$envoi = mail($mail_mdp_oubl, "Mot de passe oublié", $message, $headers);

// Vérification de l'envoi
if ($envoi) {
    echo "Le mail a été envoyé avec succès.";
} else {
    echo "Une erreur s'est produite lors de l'envoi du mail.";
}*/
?>