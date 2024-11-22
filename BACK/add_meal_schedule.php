<?php
session_start();
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == 1) {
        $animal_id = $_POST['animal_id'];
        $heure_repas = $_POST['heure_repas'];
        $description = $_POST['description'];

        $stmt = $conn->prepare("INSERT INTO horaires_repas (animal_id, heure_repas, description) VALUES (?, ?, ?)");
        $stmt->bind_param("iss", $animal_id, $heure_repas, $description);
        if ($stmt->execute()) {
            echo json_encode(["status" => "success", "message" => "Horaire de repas ajouté avec succès !"]);
        } else {
            echo json_encode(["status" => "error", "message" => "Erreur lors de l'ajout de l'horaire de repas."]);
        }
        $stmt->close();
    } else {
        echo json_encode(["status" => "error", "message" => "Accès refusé."]);
    }
}
?>