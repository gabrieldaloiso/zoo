<?php
require 'db.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    $username = $data['username'];
    $password = $data['password'];

    $stmt = $conn->prepare("SELECT id, password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $stored_password);
        $stmt->fetch();

        if ($password === $stored_password) {
            echo json_encode(["status" => "success", "message" => "Connexion enabled.", "user_id" => $id]);
        } else {
            echo json_encode(["status" => "error", "message" => "Mot de passe incorrect."]);
        }
    } else {
        echo json_encode(["status" => "error", "message" => "user no find."]);
    }

    $stmt->close();
}
?>
