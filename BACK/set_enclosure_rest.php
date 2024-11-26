<?php
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    $enclos_id = $data['enclos_id'];
    $enclos_en_repos = $data['enclos_en_repos'];

    $stmt = $conn->prepare("UPDATE enclos SET enclos_en_repos = ? WHERE id = ?");
    $stmt->bind_param("ii", $enclos_en_repos, $enclos_id);
    if ($stmt->execute()) {
        echo json_encode(["status" => "success", "message" => "Enclosure updated successfully!"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Error updating the enclosure."]);
    }
    $stmt->close();
}
?>