<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $user_id = $_POST['user_id'];
    $quantity = $_POST['quantity'];

    $stmt = $pdo->prepare("INSERT INTO tickets (user_id, quantity) VALUES (?, ?)");
    if ($stmt->execute([$user_id, $quantity])) {
        echo json_encode(["message" => "Billets achetés avec succès"]);
    } else {
        echo json_encode(["message" => "Erreur lors de l'achat des billets"]);
    }
}
?>