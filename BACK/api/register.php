// api/register.php
<?php
require_once '../controllers/authController.php';
$authController = new AuthController();

$data = json_decode(file_get_contents("php://input"), true);
$response = $authController->register($data);

echo json_encode(["success" => $response, "message" => $response ? "User registered successfully." : "Registration failed."]);
