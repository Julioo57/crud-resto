<?php

class User {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function register($name, $prenom, $mail, $password, $droits, $avatar) {
        $passwordHash = password_hash($password, PASSWORD_BCRYPT);

        $query = "INSERT INTO users (name, prenom, mail, password, droits, avatar) 
                  VALUES (:name, :prenom, :mail, :password, :droits, :avatar)";
        
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':prenom', $prenom);
        $stmt->bindParam(':mail', $mail);
        $stmt->bindParam(':password', $passwordHash);
        $stmt->bindParam(':droits', $droits);
        $stmt->bindParam(':avatar', $avatar);
        
        return $stmt->execute();
    }
}
?>
