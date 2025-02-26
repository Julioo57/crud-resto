<?php
require_once 'controller/userController.php'; // lien controller & instance 
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
// index qui gère la co la deco et le register 
?>
<script type="text/javascript" src="public/js/redirect.js"></script>

