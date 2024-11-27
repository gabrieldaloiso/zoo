<?php
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);

    $name = htmlspecialchars(trim($data['name']));
    $email = filter_var(trim($data['email']), FILTER_VALIDATE_EMAIL);

    $adult_quantity = intval($data['adult_quantity']);
    $child_quantity = intval($data['child_quantity']);
    $total_price = ($adult_quantity * 15) + ($child_quantity * 10);

    if (!$name || !$email || $adult_quantity < 0 || $child_quantity < 0) {
        die("Missing or incorrect information.");
    }

    $sql = "INSERT INTO tickets (name, email, adult_quantity, child_quantity, total_price) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die("Preparation error: " . $conn->error);
    }

    $stmt->bind_param("ssiid", $name, $email, $adult_quantity, $child_quantity, $total_price);

    if ($stmt->execute()) {
        echo "Ticket purchased successfully!";
    } else {
        echo "Insertion error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Request method not allowed.";
}
?>