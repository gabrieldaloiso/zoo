<?php
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars(trim($_POST['name']));
    $email = filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL);

    $adult_quantity = intval($_POST['adult-quantity']);
    $child_quantity = intval($_POST['child-quantity']);
    $total_price = ($adult_quantity * 15) + ($child_quantity * 10);

    if (!$name || !$email || $adult_quantity < 0 || $child_quantity < 0) {
        die("Des informations sont manquantes ou incorrectes.");
    }

    $sql = "INSERT INTO tickets (name, email, adult_quantity, child_quantity, total_price) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die("Erreur de préparation : " . $conn->error);
    }

    $stmt->bind_param("ssiid", $name, $email, $adult_quantity, $child_quantity, $total_price);

    if ($stmt->execute()) {
        echo "Billet acheté avec succès !";
    } else {
        echo "Erreur lors de l'insertion : " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Méthode de requête non autorisée.";
}
?>