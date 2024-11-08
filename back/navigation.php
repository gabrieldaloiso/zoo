<?php
function getPathBetweenPoints($startPoint, $endPoint) {
    global $pdo;
    $query = $pdo->prepare("SELECT * FROM park_map WHERE start_point = ? AND end_point = ?");
    $query->execute([$startPoint, $endPoint]);
    return $query->fetch(PDO::FETCH_ASSOC);
}
?>