<?php
$host = 'localhost';
$dbname = 'parc_animalier';
$username = 'gabriel';
$password = '';

// Connexion à la base de données avec mysqli
$conn = new mysqli($host, $username, $password, $dbname);

// Vérification de la connexion
if ($conn->connect_error) {
    die("Erreur de connexion : " . $conn->connect_error);
}
?>
