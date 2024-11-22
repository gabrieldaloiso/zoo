<?php
include 'db.php';

function getRoute($startPoint, $endPoint) {
    global $conn;

    // Requête pour obtenir les coordonnées des points de départ et d'arrivée
    $query = "SELECT id, name FROM (
                SELECT id, name FROM enclos
                UNION
                SELECT id, name FROM services
              ) AS points WHERE id IN (?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ii", $startPoint, $endPoint);
    $stmt->execute();
    $result = $stmt->get_result();

    $points = [];
    while ($row = $result->fetch_assoc()) {
        $points[] = $row;
    }

    if (count($points) == 2) {
        // Logique pour calculer l'itinéraire entre les deux points
        // Pour simplifier, nous allons juste retourner les noms des points
        return "Itinéraire de " . $points[0]['nom'] . " à " . $points[1]['nom'];
    } else {
        return "Points de départ ou d'arrivée invalides.";
    }
}

// Exemple d'utilisation
$startPoint = 1; // ID de l'enclos ou du service de départ
$endPoint = 4;   // ID de l'enclos ou du service d'arrivée
echo getRoute($startPoint, $endPoint);
?>
