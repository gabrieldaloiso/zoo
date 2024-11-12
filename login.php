<?php
// Affiche les erreurs en mode développement (à désactiver en production)
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Connexion à la base de données
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupération des données POST classiques
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Logique d'authentification avec les données POST
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
    $stmt->execute([':username' => $username]);
    $user = $stmt->fetch();

    if ($user && $user['password'] === $password) {
        // Connexion réussie
        echo json_encode(["status" => "success", "message" => "Connexion réussie !"]);
    } else {
        // Échec de la connexion
        echo json_encode(["status" => "error", "message" => "Nom d'utilisateur ou mot de passe incorrect."]);
    }
} else if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Récupération des données JSON de la requête
    $data = json_decode(file_get_contents("php://input"), true);

    if (isset($data['username']) && isset($data['password'])) {
        $username = $data['username'];
        $password = $data['password'];

        // Requête pour récupérer l'utilisateur avec les données JSON
        $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->execute([':username' => $username]);
        $user = $stmt->fetch();

        if ($user && $user['password'] === $password) {  // Comparaison directe
            // Connexion réussie
            echo json_encode(["status" => "success", "message" => "Connexion réussie !"]);
        } else {
            // Échec de la connexion
            echo json_encode(["status" => "error", "message" => "Nom d'utilisateur ou mot de passe incorrect."]);
        }
    } else {
        echo json_encode(["status" => "error", "message" => "Les données 'username' et 'password' sont manquantes."]);
    }
}
?>