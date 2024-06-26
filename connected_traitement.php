<?php


// utf-8 pour le jeu de caractères
ini_set('default_charset', 'UTF-8');


// Démarre une session
session_start();

// Vérifie si l'utilisateur est déjà connecté, redirige vers la page d'accueil s'il l'est
if (isset($_SESSION['utilisateur_connecte'])) {
    header("Location: accueil.php");
    exit();
}

// Inclure le fichier de connexion à la base de données
require_once ('db_connect.php');

// Obtenir la connexion à la base de données
$connexion = connexion_bdd();


if ($connexion->connect_error) {
    die("La connexion a échoué : " . $connexion->connect_error);
}

//...

// Récupération des données du formulaire
$email = $_POST['email'];
$mot_de_passe_saisi = $_POST['password'];

// Hashage du mot de passe saisi
$mot_de_passe_hash = hash('sha256', $mot_de_passe_saisi);


// Vérification du mot de passe
$requete = "SELECT mot_de_passe FROM proprietaire WHERE email =?";
$resultat = $connexion->prepare($requete);
$resultat->bind_param("s", $email);
$resultat->execute();
$resultat = $resultat->get_result();
$resultat = $resultat->fetch_assoc();

// Vérification du mot de passe
if ($resultat !== false && $resultat !== null && is_array($resultat)) {
    $mot_de_passe_hash_bdd = $resultat['mot_de_passe'];


    // Vérification du mot de passe
    if ($mot_de_passe_hash == $mot_de_passe_hash_bdd) {

        // Connexion reussie
        $_SESSION['utilisateur_connecte'] = true;
        header('Location: accueil.php');
    } else {
        // Mot de passe incorrect
        echo '<br>Mot de passe incorrect';
        header('Location: connected.php?message=Mot%20de%20passe%20incorrect');
    }
} else {
    // Email introuvable dans la base de données
    header('Location: connected.php?message=Email%20introuvable');
}

// Fermeture de la connexion
$connexion->close();
?>