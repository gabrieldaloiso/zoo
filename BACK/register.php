<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");

require_once 'database.php';
require_once 'user.php';

$database = new Database();
$db = $database->getConnection();

$user = new User($db);

// Récupération des données POST
$data = json_decode(file_get_contents("php://input"));

// Validation basique
if (!empty($data->username) && 
    !empty($data->email) && 
    !empty($data->password)) {
    
    // Vérification si l'email existe déjà
    $user->email = $data->email;
    if ($user->emailExists()) {
        http_response_code(409);
        echo json_encode(array("message" => "Cet email existe déjà"));
        exit();
    }

    // Préparation de l'utilisateur
    $user->username = $data->username;
    $user->password = $data->password;

    // Tentative d'inscription
    if ($user->register()) {
        http_response_code(201);
        echo json_encode(array("message" => "Utilisateur créé avec succès"));
    } else {
        http_response_code(503);
        echo json_encode(array("message" => "Impossible de créer l'utilisateur"));
    }
} else {
    http_response_code(400);
    echo json_encode(array("message" => "Données incomplètes"));
}