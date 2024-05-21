<?php
// mdp_traitment.php
// utf-8 pour le jeu de caractères
ini_set('default_charset', 'UTF-8');

// Démarrage de la session
session_start();

// Inclure le fichier de connexion à la base de données
require_once('db_connect.php');

// Obtenir la connexion à la base de données
$connexion = connexion_bdd();

// Vérification de la connexion
if ($connexion->connect_error) {
    die("La connexion a échoué : " . $connexion->connect_error);
}

// Récupération des données du formulaire
$motdepasse1 = $_POST['password1'];
$motdepasse2 = $_POST['password2'];
//echo 'Mot de passe 1 :'.$motdepasse1.'<br>';
//echo 'Mot de passe 2 :'.$motdepasse2.'<br>'; // Correction du message pour mot de passe 2

// Vérification que les deux mots de passe sont identiques
if ($motdepasse1 != $motdepasse2) {
    die("Les mots de passe ne correspondent pas.");
}

$mot_de_passe = $motdepasse1; // Utilisation du premier mot de passe

$email = $_GET['email'];
$token = $_GET['token'];

//echo 'Email :'.$email.'<br>';
//echo 'Token :'.$token.'<br>';

// Hashage complexe du mot de passe
$mot_de_passe_hash = hash('sha256', $mot_de_passe);

// Vérification de l'existence d'un propriétaire avec le même email
$requete = "SELECT * FROM proprietaire WHERE email = ?";
$stmt = $connexion->prepare($requete);
$stmt->bind_param("s", $email);
$stmt->execute();
$resultat = $stmt->get_result();

// Si l'utilisateur existe déjà, mise à jour du mot de passe
if ($resultat->num_rows > 0) {
    // Requête de mise à jour dans la table PROPRIETAIRE
    $requete_proprietaire = "UPDATE `proprietaire` SET `mot_de_passe` = ? WHERE `email` = ?;";
    $stmt = $connexion->prepare($requete_proprietaire);
    $stmt->bind_param("ss", $mot_de_passe_hash, $email);
    if ($stmt->execute()) {
        $_SESSION['message'] = "Mise à jour réussie.";
		header('Location: connected.php');
    } else {
        $_SESSION['message'] = "Erreur lors de la mise à jour.";
		echo $_SESSION['message'];
    }
} else {
    //echo "Aucun utilisateur trouvé avec cet email.<br>";
    //echo '<button onclick="window.history.back()">Retour</button>';
	$_SESSION['message'] = "Aucun utilisateur trouvé avec cet email.";
	echo $_SESSION['message'];
}

// Fermeture de la connexion à la base de données
$connexion->close();
?>
