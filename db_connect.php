<?php

/**
 * Fonction de connexion à la base de données MySQL
 *
 *  La connexion à la base de données
 */
function connexion_bdd()
{
    // Connexion à la base de données
    $serveur = "localhost"; // Remplacez par votre serveur MySQL
    $utilisateur = "root"; // Remplacez par votre nom d'utilisateur MySQL
    $mot_de_passe = ""; // Remplacez par votre mot de passe MySQL
    $base_de_donnees = "univerdog"; // Remplacez par le nom de votre base de données

    // Connexion à la base de données
    $connexion = new mysqli($serveur, $utilisateur, $mot_de_passe, $base_de_donnees);

    // Vérification de la connexion
    if ($connexion->connect_error) {
        die("La connexion a échoué : " . $connexion->connect_error);
    }

    return $connexion;


}
