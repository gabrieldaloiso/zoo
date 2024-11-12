<?php
$host = 'localhost';
$dbname = 'parc_animalier';
$username = 'gabriel'; // Ton utilisateur phpMyAdmin
$password = ''; // Mot de passe de l'utilisateur "gabriel" (j'en ai pas)

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
?>