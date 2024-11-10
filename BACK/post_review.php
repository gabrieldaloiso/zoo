<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $user_id = $_POST['user_id'];
    $enclosure_id = $_POST['enclosure_id'];
    $review = $_POST['review'];

    $stmt = $pdo->prepare("INSERT INTO reviews (user_id, enclosure_id, review) VALUES (?, ?, ?)");
    if ($stmt->execute([$user_id, $enclosure_id, $review])) {
        echo json_encode(["message" => "Avis ajouté avec succès"]);
    } else {
        echo json_encode(["message" => "Erreur lors de l'ajout de l'avis"]);
    }
}
?>