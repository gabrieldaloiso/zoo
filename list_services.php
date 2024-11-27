<?php
include 'db.php';

header('Content-Type: application/json');

$input = json_decode(file_get_contents('php://input'), true);

$sql = "SELECT s.nom, b.nom AS biome_nom FROM services s LEFT JOIN biomes b ON s.id_biome = b.id";
$result = $conn->query($sql);

$response = array();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $response[] = array(
            "service" => $row["nom"],
            "biome" => $row["biome_nom"]
        );
    }
} else {
    $response["message"] = "0 résultats";
}

echo json_encode($response);

$conn->close();
?>
