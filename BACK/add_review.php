<?php
session_start();
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
        $enclos_id = $_POST['enclos_id'];
        $note = $_POST['note'];
        $commentaire = $_POST['commentaire'];

        $stmt = $conn->prepare("INSERT INTO avis (user_id, enclos_id, note, commentaire) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("iiis", $user_id, $enclos_id, $note, $commentaire);
        if ($stmt->execute()) {
            echo json_encode(["status" => "success", "message" => "Avis ajouté avec succès !"]);
        } else {
            echo json_encode(["status" => "error", "message" => "Erreur lors de l'ajout de l'avis."]);
        }
        $stmt->close();
    } else {
        echo json_encode(["status" => "error", "message" => "Utilisateur non connecté."]);
    }
}
?>