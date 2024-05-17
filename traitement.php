<?php
// traitement.php
// utf-8 pour le jeu de caractères
ini_set('default_charset', 'UTF-8');

// Démarrage de la session
session_start();

// Inclure le fichier de connexion à la base de données
require_once ('db_connect.php');

// Obtenir la connexion à la base de données
$connexion = connexion_bdd();


// Vérification de la connexion
if ($connexion->connect_error) {
    die("La connexion a échoué : " . $connexion->connect_error);
}


// Récupération des données du formulaire
$nom_chien = $_POST['nom_chien'];
$date_naissance_chien = $_POST['date'];
$race = $_POST['race'];
$message = isset($_POST['message']) ? $_POST['message'] : "";

$nom_proprietaire = $_POST['nom_proprietaire'];
$email = $_POST['email'];

// Vérification de la présence des champs facultatifs
$mot_de_passe = isset($_POST['password']) ? $_POST['password'] : "";


$accepte_reglement = isset($_POST['check']);
$telephone = $_POST['tel'];

// Hashage complexedu mot de passe
$mot_de_passe_hash = hash('sha256', $mot_de_passe);



// Vérification de l'existence d'un étudiant avec le même email
$requete = "SELECT * FROM proprietaire WHERE email =?";
$stmt = $connexion->prepare($requete);
$stmt->bind_param("s", $email);
$stmt->execute();
$resultat = $stmt->get_result();

// Affichage d'un message d'erreur si l'utilisateur existe déjà
if ($resultat->num_rows > 0) {
    echo "Un proprietaire avec cet email existe déjà.<br>";
    // echo '<button onclick="window.history.back()">Retour</button>';
    $_SESSION['message'] = "cet email existe déjà.";
    header('Location: ' . $_SERVER['HTTP_REFERER']);
} else {
    // Début de la transaction
    $connexion->begin_transaction();

    // Requête d'insertion dans la table PROPRIETAIRE
    $requete_proprietaire = "INSERT INTO proprietaire (nom, email, mot_de_passe, telephone) VALUES (?,?,?,?)";
    $stmt = $connexion->prepare($requete_proprietaire);
    $stmt->bind_param("ssss", $nom_proprietaire, $email, $mot_de_passe_hash, $telephone);

    if ($stmt->execute()) {
        // Récupération de l'ID du propriétaire nouvellement créé
        $id_proprietaire = $stmt->insert_id;

        // Requête d'insertion dans la table CHIENS
        $requete_chien = "INSERT INTO chiens (nom, date_naissance, race, information, id_proprietaire) VALUES (?,?,?,?,?)";
        $stmt = $connexion->prepare($requete_chien);
        $stmt->bind_param("ssssi", $nom_chien, $date_naissance_chien, $race, $message, $id_proprietaire);

        if ($stmt->execute()) {
            // Commit de la transaction si les deux insertions réussissent
            $connexion->commit();
            $_SESSION['message'] = '<h1 style ="font-size: 14px;margin-bottom: 10px;            
            color: #ffd761;">Votre inscription a bien été prise en compte. Merci de votre intérêt pour notre site.</h1>';
            header('Location: connected.php');
            exit();
        } else {
            // Rollback de la transaction en cas d'échec de l'insertion dans CHIENS
            $connexion->rollback();
            $_SESSION['message'] = "Erreur lors de l'insertion des données du chien : " . $stmt->error;
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit();
        }
    } else {
        // Rollback de la transaction en cas d'échec de l'insertion dans PROPRIETAIRE
        $connexion->rollback();
        $_SESSION['message'] = "Erreur lors de l'insertion des données du propriétaire : " . $stmt->error;
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit();
    }
}
$_SESSION['message'] = '<p id="message" style="color:#ffff00;-webkit-animation: flash 1s linear;animation: flash 1s linear;"> <img  src="images/attention.png" width="24px" height="24px"> ' . $_SESSION['message'] . '! <img  src="images/attention.png" width="24px" height="24px"></p>';

// Fermeture de la connexion à la base de données
$connexion->close();
?>