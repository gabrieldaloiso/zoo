<?php
function createTicket($userId, $ticketType, $quantity, $visitDate) {
    global $pdo;
    $query = $pdo->prepare("INSERT INTO tickets (user_id, ticket_type, quantity, visit_date) VALUES (?, ?, ?, ?)");
    return $query->execute([$userId, $ticketType, $quantity, $visitDate]);
}

function getUserTickets($userId) {
    global $pdo;
    $query = $pdo->prepare("SELECT * FROM tickets WHERE user_id = ?");
    $query->execute([$userId]);
    return $query->fetchAll(PDO::FETCH_ASSOC);
}
?>