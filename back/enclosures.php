<?php
function getAllEnclosures() {
    global $pdo;
    $query = $pdo->query("SELECT * FROM enclosures WHERE is_under_construction = 0");
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

function getEnclosureDetails($enclosureId) {
    global $pdo;
    $query = $pdo->prepare("SELECT e.*, a.name as animal_name, a.species 
                            FROM enclosures e 
                            JOIN animals a ON e.id = a.enclosure_id 
                            WHERE e.id = ?");
    $query->execute([$enclosureId]);
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

function addEnclosureReview($userId, $enclosureId, $rating, $comment) {
    global $pdo;
    $query = $pdo->prepare("INSERT INTO reviews (user_id, enclosure_id, rating, comment) VALUES (?, ?, ?, ?)");
    return $query->execute([$userId, $enclosureId, $rating, $comment]);
}

function setEnclosureConstructionStatus($enclosureId, $isUnderConstruction) {
    global $pdo;
    $query = $pdo->prepare("UPDATE enclosures SET is_under_construction = ? WHERE id = ?");
    return $query->execute([$isUnderConstruction, $enclosureId]);
}

function addFeedingTime($enclosureId, $feedingTime) {
    global $pdo;
    $query = $pdo->prepare("INSERT INTO feeding_times (enclosure_id, feeding_time) VALUES (?, ?)");
    return $query->execute([$enclosureId, $feedingTime]);
}

function searchEnclosureByAnimal($animalName) {
    global $pdo;
    $query = $pdo->prepare("SELECT e.* FROM enclosures e 
                            JOIN animals a ON e.id = a.enclosure_id 
                            WHERE a.name LIKE ?");
    $query->execute(['%'.$animalName.'%']);
    return $query->fetchAll(PDO::FETCH_ASSOC);
}
?>