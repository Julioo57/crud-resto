<?php
 // page qui gère la deco  et redirige vers focntion deco puis login 
require_once '../../controller/userController.php';

$userController = new UserController();
$userController->logout(); 

$user = $_SESSION['user'];
?>