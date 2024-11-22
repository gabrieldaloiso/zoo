<?php
require_once 'db.php';
// ...existing code...

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

// Exemple d'utilisation
$biomesByColor = getBiomesByColor('#808080');
foreach ($biomesByColor as $biome) {
    echo $biome['nom'] . "<br>";
}

// ...existing code...
?>
