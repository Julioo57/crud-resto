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
<script type="text/javascript" src="public/js/redirect.js"></script>

