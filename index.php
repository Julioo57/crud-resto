<?php
require_once 'controller/userController.php'; // Assurez-vous que le chemin est correct

$userController = new UserController();

if (isset($_GET['action'])) {
    if ($_GET['action'] === 'register') {
        $userController->register();
    } elseif ($_GET['action'] === 'login') {
        $userController->login();
    } elseif ($_GET['action'] === 'logout') {
        $userController->logout();
    }
}
?>
<a href="view/front/login.php">login</a>
<a href="view/front/register.php">register</a>
