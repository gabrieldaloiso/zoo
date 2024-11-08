// models/enclosureModel.php
<?php
require_once '../config/database.php';

class Enclosure {
    private $conn;
    private $table_name = "enclosures";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getEnclosures() {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addEnclosure($name, $description, $status) {
        $query = "INSERT INTO " . $this->table_name . " (name, description, status) VALUES (:name, :description, :status)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":description", $description);
        $stmt->bindParam(":status", $status);
        return $stmt->execute();
    }
}
