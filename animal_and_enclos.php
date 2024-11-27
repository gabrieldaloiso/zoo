<?php
include 'db.php';

header('Content-Type: application/json');

$request_method = $_SERVER['REQUEST_METHOD'];
$input = json_decode(file_get_contents('php://input'), true);

switch ($request_method) {
    case 'POST':
        if (isset($input['action'])) {
            if ($input['action'] == 'getEnclosList') {
                $enclosList = getEnclosList($conn);
                echo json_encode($enclosList);
            } elseif ($input['action'] == 'searchEnclosByAnimal' && isset($input['animal_name'])) {
                $searchResults = searchEnclosByAnimal($conn, $input['animal_name']);
                echo json_encode($searchResults);
            } else {
                echo json_encode(['error' => 'Invalid action or missing parameters']);
            }
        } else {
            echo json_encode(['error' => 'No action specified']);
        }
        break;
    default:
        echo json_encode(['error' => 'Invalid request method']);
        break;
}

function getEnclosList($conn) {
    $sql = "SELECT e.id, b.nom AS biome, GROUP_CONCAT(a.nom SEPARATOR ', ') AS animaux
            FROM enclos e
            JOIN biomes b ON e.id_biome = b.id
            LEFT JOIN enclos_animaux ea ON e.id = ea.id_enclos
            LEFT JOIN animaux a ON ea.id_animal = a.id
            GROUP BY e.id";
    $result = $conn->query($sql);
    return $result->fetch_all(MYSQLI_ASSOC);
}

function searchEnclosByAnimal($conn, $animal_name) {
    $sql = "SELECT e.id, b.nom AS biome, GROUP_CONCAT(a.nom SEPARATOR ', ') AS animaux
            FROM enclos e
            JOIN biomes b ON e.id_biome = b.id
            LEFT JOIN enclos_animaux ea ON e.id = ea.id_enclos
            LEFT JOIN animaux a ON ea.id_animal = a.id
            WHERE a.nom LIKE ?
            GROUP BY e.id";
    $stmt = $conn->prepare($sql);
    $like_animal_name = "%" . $animal_name . "%";
    $stmt->bind_param("s", $like_animal_name);
    $stmt->execute();
    return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
}
?>
