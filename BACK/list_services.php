<?php
include 'db.php';

$sql = "SELECT s.nom, b.nom AS biome_nom FROM services s LEFT JOIN biomes b ON s.id_biome = b.id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "Service: " . $row["nom"]. " - Biome: " . $row["biome_nom"]. "<br>";
    }
} else {
    echo "0 résultats";
}

$conn->close();
?>
