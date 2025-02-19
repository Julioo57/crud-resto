<?php
require_once '../../controller/userController.php';

$userController = new UserController();
$userController->logout(); // Vérifie la connexion de l'utilisateur

// Récupérer les informations utilisateur depuis la session
$user = $_SESSION['user'];
?>