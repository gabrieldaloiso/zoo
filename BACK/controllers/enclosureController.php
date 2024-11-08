// controllers/enclosureController.php
<?php
require_once '../models/enclosureModel.php';

class EnclosureController {
    private $db;
    private $enclosure;

    public function __construct() {
        $this->db = (new Database())->getConnection();
        $this->enclosure = new Enclosure($this->db);
    }

    public function getEnclosures() {
        return $this->enclosure->getEnclosures();
    }

    public function addEnclosure($data) {
        return $this->enclosure->addEnclosure($data['name'], $data['description'], $data['status']);
    }
}
