<?php
include 'db.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);

    if (isset($data['startName']) && isset($data['endName'])) {
        $startName = $data['startName'];
        $endName = $data['endName'];

        $response = getRoute($startName, $endName);
        echo json_encode(['route' => $response]);
    } else {
        echo json_encode(['error' => 'Invalid input']);
    }
} else {
    echo json_encode(['error' => 'Invalid request method']);
}

function getRoute($startName, $endName) {
    global $conn;

    // Requête pour obtenir les biomes des points de départ et d'arrivée
    $query = "SELECT nom, id_biome FROM (
                SELECT enclos.id AS id, enclos.id_biome, biomes.nom FROM enclos
                JOIN biomes ON enclos.id_biome = biomes.id
                UNION
                SELECT services.id AS id, services.id_biome, biomes.nom FROM services
                LEFT JOIN biomes ON services.id_biome = biomes.id
              ) AS points WHERE id IN (
                (SELECT id FROM enclos WHERE nom = ?),
                (SELECT id FROM services WHERE nom = ?)
              )";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $startName, $endName);
    $stmt->execute();
    $result = $stmt->get_result();

    $points = [];
    while ($row = $result->fetch_assoc()) {
        $points[] = $row;
    }

    if (count($points) == 2) {
        $startBiome = $points[0]['id_biome'];
        $endBiome = $points[1]['id_biome'];

        if ($startBiome && $endBiome) {
            if ($startBiome == $endBiome) {
                return "Restez dans le biome.";
            } else {
                return "Passez par les biomes: " . $points[0]['nom'] . " et " . $points[1]['nom'];
            }
        } else {
            return "Un ou les deux points sont hors des biomes.";
        }
    } else {
        return "Points de départ ou d'arrivée invalides.";
    }
}
?>
