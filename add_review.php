<?php
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    $user_id = $data['user_id'];
    $enclos_id = $data['enclos_id'];
    $note = $data['note'];
    $commentaire = $data['commentaire'];

    $stmt = $conn->prepare("INSERT INTO avis (user_id, enclos_id, note, commentaire) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("iiis", $user_id, $enclos_id, $note, $commentaire);
    if ($stmt->execute()) {
        echo json_encode(["status" => "success", "message" => "Review added successfully!"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Error adding review."]);
    }
    $stmt->close();
}
?>