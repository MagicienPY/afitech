<?php
$host = 'localhost'; // Remplacez par votre hôte
$user = 'root';      // Remplacez par votre nom d'utilisateur
$password = '';      // Remplacez par votre mot de passe
$database = 'ParrainageSysteme'; // Remplacez par le nom de votre base de données

// Création de la connexion
$mysqli = new mysqli($host, $user, $password, $database);

// Vérifiez la connexion
if ($mysqli->connect_error) {
    die('Erreur de connexion (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}
?>
