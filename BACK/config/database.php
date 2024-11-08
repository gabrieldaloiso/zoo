// config/database.php
<?php
class Database {
    private $host = "localhost";
    private $db_name = "zoo_database";  // Le nom de ta base de données
    private $username = "gabriel";         // L'utilisateur, généralement "root" en local
    private $password = "";             // Le mot de passe, souvent vide en local
    public $conn;

    public function getConnection() {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $exception) {
            echo "Erreur de connexion à la base de données : " . $exception->getMessage();
        }
        return $this->conn;
    }
}
