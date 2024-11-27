<?php
include 'db.php';

function getBiome($enclos_id) {
    global $conn;
    $sql = "SELECT b.nom FROM enclos e JOIN biomes b ON e.id_biome = b.id WHERE e.id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $enclos_id);
    $stmt->execute();
    $stmt->bind_result($biome);
    $stmt->fetch();
    $stmt->close();
    return $biome;
}

function getServiceBiome($service_name) {
    global $conn;
    $sql = "SELECT b.nom FROM services s JOIN biomes b ON s.id_biome = b.id WHERE s.nom = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $service_name);
    $stmt->execute();
    $stmt->bind_result($biome);
    $stmt->fetch();
    $stmt->close();
    return $biome;
}

function getAnimalEnclos($animal_name) {
    global $conn;
    $sql = "SELECT e.id, b.nom FROM enclos_animaux ea JOIN animaux a ON ea.id_animal = a.id JOIN enclos e ON ea.id_enclos = e.id JOIN biomes b ON e.id_biome = b.id WHERE a.nom = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $animal_name);
    $stmt->execute();
    $stmt->bind_result($enclos_id, $biome);
    $stmt->fetch();
    $stmt->close();
    return ['enclos_id' => $enclos_id, 'biome' => $biome];
}

function navigate($start_biome, $destination_name, $is_service) {
    if ($is_service) {
        $destination_biome = getServiceBiome($destination_name);
        if ($destination_biome) {
            if ($start_biome == $destination_biome) {
                return "This service is available in your biome.";
            } else {
                return "Your service is available in $destination_biome.";
            }
        } else {
            return "Go to the park entrance.";
        }
    } else {
        $animal_info = getAnimalEnclos($destination_name);
        if ($animal_info['biome']) {
            if ($start_biome == $animal_info['biome']) {
                return "This animal is in enclosure " . $animal_info['enclos_id'] . " of your biome.";
            } else {
                return "Your animal is in " . $animal_info['biome'] . " biome in enclosure " . $animal_info['enclos_id'] . ".";
            }
        } else {
            return "Go to the park entrance.";
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    $start_biome = $data['start_biome'];
    $destination_name = $data['destination_name'];
    $is_service = $data['is_service'];
    $result = navigate($start_biome, $destination_name, $is_service);
    echo json_encode(['message' => $result]);
}
?>
