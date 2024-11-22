<?php
session_start();
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == 1) {
        $enclos_id = $_POST['enclos_id'];
        $enclos_en_repos = $_POST['enclos_en_repos'];

        $stmt = $conn->prepare("UPDATE enclos SET enclos_en_repos = ? WHERE id = ?");
        $stmt->bind_param("ii", $enclos_en_repos, $enclos_id);
        if ($stmt->execute()) {
            echo json_encode(["status" => "success", "message" => "Enclos mis à jour avec succès !"]);
        } else {
            echo json_encode(["status" => "error", "message" => "Erreur lors de la mise à jour de l'enclos."]);
        }
        $stmt->close();
    } else {
        echo json_encode(["status" => "error", "message" => "Accès refusé."]);
    }
}
?>