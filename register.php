<?php
// Affiche les erreurs pour le développement (à désactiver en production)
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Connexion à la base de données
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupération des données du formulaire HTML
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prépare et exécute l'insertion dans la base de données
    $stmt = $pdo->prepare("INSERT INTO users (username, email, password) VALUES (:username, :email, :password)");

    try {
        $stmt->execute([
            ':username' => $username,
            ':email' => $email,
            ':password' => $password  // Enregistre le mot de passe en clair
        ]);
        echo json_encode(["status" => "success", "message" => "Inscription réussie !"]);
    } catch (PDOException $e) {
        echo json_encode(["status" => "error", "message" => "Erreur lors de l'inscription."]);
    }
} else if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Récupération des données JSON de la requête pour l'API
    $data = json_decode(file_get_contents("php://input"), true);

    // Vérifie que toutes les données sont présentes
    if (isset($data['username']) && isset($data['email']) && isset($data['password'])) {
        $username = $data['username'];
        $email = $data['email'];
        $password = $data['password'];  // Stocke directement le mot de passe en clair

        // Prépare et exécute l'insertion dans la base de données
        $stmt = $pdo->prepare("INSERT INTO users (username, email, password) VALUES (:username, :email, :password)");

        try {
            $stmt->execute([
                ':username' => $username,
                ':email' => $email,
                ':password' => $password  // Enregistre le mot de passe en clair
            ]);
            echo json_encode(["status" => "success", "message" => "Inscription réussie !"]);
        } catch (PDOException $e) {
            echo json_encode(["status" => "error", "message" => "Erreur lors de l'inscription."]);
        }
    } else {
        echo json_encode(["status" => "error", "message" => "Les données 'username', 'email' et 'password' sont requises."]);
    }
}
?>