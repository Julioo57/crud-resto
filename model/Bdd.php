<?php
class Database {
    private static $host = "localhost";
    private static $dbname = "miniresto";
    private static $username = "root";
    private static $password = "";
    private static $pdo = null;
// Connexion à la bdd    private static $host = "2p549h.myd.infomaniak.com";
//    private static $dbname = "2p549h_restau";
//    private static $username = "2p549h_admin";
//   private static $password = "Jules57000@";
//    private static $pdo = null;
    

//fonction pour se co la bdd 
    public static function getConnection() {
        if (self::$pdo === null) {
            try {
                self::$pdo = new PDO("mysql:host=" . self::$host . ";dbname=" . self::$dbname . ";charset=utf8", self::$username, self::$password);
                self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Erreur de connexion : " . $e->getMessage());
            }
        }
        return self::$pdo;
    }
}
?>
