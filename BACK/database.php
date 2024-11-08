<?php
class Database {
    private $host = 'localhost';
    private $db_name = 'zoo';
    private $username = 'root';
    private $password = 'root';
    public $conn;

    public function getConnection() {
        try {
            $this->conn = new PDO(
                "mysql:host={$this->host};dbname={$this->db_name}", 
                $this->username, 
                $this->password
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $exception) {
            die("Erreur de connexion : " . $exception->getMessage());
        }
        return $this->conn;
    }
}