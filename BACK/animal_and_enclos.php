<?php
include 'db.php';

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

// Exemple d'utilisation
$enclosList = getEnclosList($conn);
$searchResults = searchEnclosByAnimal($conn, 'Lion');

print_r($enclosList);
print_r($searchResults);
?>
