// api/login.php
<?php
require_once '../controllers/authController.php';
$authController = new AuthController();

$data = json_decode(file_get_contents("php://input"), true);
$user = $authController->login($data);

if ($user) {
    echo json_encode(["success" => true, "user" => $user]);
} else {
    echo json_encode(["success" => false, "message" => "Invalid login credentials."]);
}
