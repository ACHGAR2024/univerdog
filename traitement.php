<?php
// traitement.php
// utf-8 pour le jeu de caractères
ini_set('default_charset', 'UTF-8');

// Démarrage de la session
session_start();

// Connexion à la base de données
$serveur = "localhost"; // Remplacez par votre serveur MySQL
$utilisateur = "root"; // Remplacez par votre nom d'utilisateur MySQL
$mot_de_passe = ""; // Remplacez par votre mot de passe MySQL
$base_de_donnees = "ma_base_de_donnees"; // Remplacez par le nom de votre base de données

// Connexion à la base de données
$connexion = new mysqli($serveur, $utilisateur, $mot_de_passe, $base_de_donnees);

// Vérification de la connexion
if ($connexion->connect_error) {
    die("La connexion a échoué : " . $connexion->connect_error);
}


// Récupération des données du formulaire
$nom = $_POST['nom'];
$email = $_POST['email'];
$date_naissance = $_POST['date'];
$telephone = $_POST['tel'];
$race = $_POST['race'];

// Vérification de la présence des champs facultatifs
$mot_de_passe = isset($_POST['password']) ? $_POST['password'] : "";
$message = isset($_POST['message']) ? $_POST['message'] : "";
$accepte_reglement = isset($_POST['check']);


// Hashage complexedu mot de passe
$mot_de_passe_hash = hash('sha256', $mot_de_passe);



// Vérification de l'existence d'un étudiant avec le même email
$requete = "SELECT * FROM chiens WHERE email =?";
$stmt = $connexion->prepare($requete);
$stmt->bind_param("s", $email);
$stmt->execute();
$resultat = $stmt->get_result();

// Affichage d'un message d'erreur si l'utilisateur existe déjà
if ($resultat->num_rows > 0) {
    // echo "Un étudiant avec cet email existe déjà.<br>";
    // echo '<button onclick="window.history.back()">Retour</button>';
    $_SESSION['message'] = "Un étudiant avec cet email existe déjà.";
} else {

    // Requête d'insertion
    $requete = "INSERT INTO chiens (nom, email, date_naissance, telephone, race, mot_de_passe, message, accepte_reglement)
                    VALUES (?,?,?,?,?,?,?,?)";
    $stmt = $connexion->prepare($requete);
    $stmt->bind_param("sssssssi", $nom, $email, $date_naissance, $telephone, $race, $mot_de_passe_hash, $message, $accepte_reglement);

    if ($stmt->execute()) {
        $_SESSION['message'] = "Votre inscription a bien été prise en compte. Merci de votre intérêt pour notre site.";
        header('Location: connected.php');
    } else {
        // echo "Erreur lors de l'insertion des données : " . $stmt->error;
        // echo '<br><button onclick="window.history.back()">Retour</button>';
        $_SESSION['message'] = "Erreur lors de l'insertion des données : " . $stmt->error;
    }
}


$stmt->close();
$connexion->close();

