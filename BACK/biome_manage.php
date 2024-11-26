<?php
require_once 'db.php';

function getBiomesByColor($color) {
    global $conn;

    $stmt = $conn->prepare("SELECT * FROM biomes WHERE couleur = ?");
    $stmt->bind_param('s', $color);
    $stmt->execute();
    $result = $stmt->get_result();
    $biomes = $result->fetch_all(MYSQLI_ASSOC);

    $stmt->close();

    return $biomes;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    if (isset($data['color'])) {
        $color = $data['color'];
        $biomesByColor = getBiomesByColor($color);
        header('Content-Type: application/json');
        echo json_encode($biomesByColor);
    } else {
        http_response_code(400);
        echo json_encode(['error' => 'Color parameter is missing']);
    }
}
?>
