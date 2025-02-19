<?php
require_once '../../controller/userController.php';

$userController = new UserController();
$userController->checkLogin(); // Vérif si la user esr co 

// Récupérer les informations utilisateur depuis la session
$user = $_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Petit Resto</title>
</head>
<body>
<?php require_once  '../template/header.php'; ?>
</body>
</html>