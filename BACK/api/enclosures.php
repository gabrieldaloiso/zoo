// api/enclosures.php
<?php
require_once '../controllers/enclosureController.php';
$enclosureController = new EnclosureController();

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $enclosures = $enclosureController->getEnclosures();
    echo json_encode($enclosures);
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);
    $response = $enclosureController->addEnclosure($data);
    echo json_encode(["success" => $response, "message" => $response ? "Enclosure added successfully." : "Failed to add enclosure."]);
}
