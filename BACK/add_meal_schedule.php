<?php
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    if (isset($data['is_admin']) && $data['is_admin'] == 1) {
        $animal_id = $data['animal_id'];
        $heure_repas = $data['heure_repas'];
        $description = $data['description'];

        $stmt = $conn->prepare("INSERT INTO horaires_repas (animal_id, heure_repas, description) VALUES (?, ?, ?)");
        $stmt->bind_param("iss", $animal_id, $heure_repas, $description);
        if ($stmt->execute()) {
            echo json_encode(["status" => "success", "message" => "Meal schedule added successfully!"]);
        } else {
            echo json_encode(["status" => "error", "message" => "Error adding meal schedule."]);
        }
        $stmt->close();
    } else {
        echo json_encode(["status" => "error", "message" => "Access denied."]);
    }
}
?>