<?php
function register($username, $email, $password) {
    global $pdo;
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $query = $pdo->prepare("INSERT INTO users (username, email, password, role) VALUES (?, ?, ?, 'user')");
    return $query->execute([$username, $email, $hashedPassword]);
}

function login($email, $password) {
    global $pdo;
    $query = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $query->execute([$email]);
    $user = $query->fetch(PDO::FETCH_ASSOC);
    
    if ($user && password_verify($password, $user['password'])) {
        return $user;
    }
    return false;
}

function updateProfile($userId, $data) {
    global $pdo;
    $query = $pdo->prepare("UPDATE users SET username = ?, email = ? WHERE id = ?");
    return $query->execute([$data['username'], $data['email'], $userId]);
}
?>