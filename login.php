<?php
// Affiche les erreurs en mode développement (à désactiver en production)
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Connexion à la base de données
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupération des données POST
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Logique d'authentification avec les données POST
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user && $user['password'] === $password) {
        // Connexion réussie
        echo json_encode(["status" => "success", "message" => "Connexion with success !"]);
    } else {
        // Échec de la connexion
        echo json_encode(["status" => "error", "message" => "Nom d'utilisateur ou mot de passe incorrect."]);
    }
    $stmt->close();
} else if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $data = json_decode(file_get_contents("php://input"), true);

    if (isset($data['username']) && isset($data['password'])) {
        $username = $data['username'];
        $password = $data['password'];

        // Requête pour récupérer l'utilisateur avec les données JSON
        $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        if ($user && $user['password'] === $password) {
            echo json_encode(["status" => "success", "message" => "Connexion réussie !"]);
        } else {
            echo json_encode(["status" => "error", "message" => "Nom d'utilisateur ou mot de passe incorrect."]);
        }
        $stmt->close();
    } else {
        echo json_encode(["status" => "error", "message" => "Les datas 'username' et 'password' sont manquantes."]);
    }
}
?>