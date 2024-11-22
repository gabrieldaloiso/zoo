<?php
error_reporting(E_ALL);

// Connexion à la base de données
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);
    $username = isset($data['username']) ? $data['username'] : $_POST['username'];
    $password = isset($data['password']) ? $data['password'] : $_POST['password'];

    // Logique d'authentification avec les données POST ou JSON
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user && password_verify($password, $user['password'])) {
        // Connexion réussie
        echo json_encode([
            "status" => "success",
            "message" => "Connexion réussie !",
            "user" => [
                "id" => $user['id'],
                "is_admin" => $user['is_admin']
            ]
        ]);
    } else {
        // Échec de la connexion
        echo json_encode(["status" => "error", "message" => "Nom d'utilisateur ou mot de passe incorrect."]);
    }
    $stmt->close();
}
?>