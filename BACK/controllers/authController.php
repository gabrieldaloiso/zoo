// controllers/authController.php
<?php
require_once '../models/userModel.php';

class AuthController {
    private $db;
    private $user;

    public function __construct() {
        $this->db = (new Database())->getConnection();
        $this->user = new User($this->db);
    }

    public function register($data) {
        return $this->user->register($data['username'], $data['email'], $data['password']);
    }

    public function login($data) {
        return $this->user->login($data['email'], $data['password']);
    }
}