<?php
class User {
    private $conn;
    private $table_name = "users";

    public $id;
    public $username;
    public $email;
    public $password;
    public $role;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function register() {
        $query = "INSERT INTO " . $this->table_name . " 
                  SET username=:username, email=:email, password=:password";
        
        $stmt = $this->conn->prepare($query);
        
        // Hash du mot de passe
        $hashed_password = password_hash($this->password, PASSWORD_BCRYPT);
        
        $stmt->bindParam(":username", $this->username);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":password", $hashed_password);
        
        return $stmt->execute();
    }

    public function login() {
        $query = "SELECT * FROM " . $this->table_name . " 
                  WHERE email = :email LIMIT 1";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":email", $this->email);
        $stmt->execute();
        
        return $stmt;
    }

    public function emailExists() {
        $query = "SELECT * FROM " . $this->table_name . " 
                  WHERE email = :email LIMIT 1";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":email", $this->email);
        $stmt->execute();
        
        return $stmt->rowCount() > 0;
    }
}