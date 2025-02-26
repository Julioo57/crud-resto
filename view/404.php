<?php 
echo"Erreur 404 faites marche arrière.";
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Erreur 404</title>
    <!-- Ajout du lien vers Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<!-- Container central -->
<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="text-center">
        <!-- Message d'erreur -->
        <h1 class="display-1 text-danger">404</h1>
        <h3>Page non trouvée</h3>
        <p class="lead">Désolé, la page que vous recherchez n'existe pas.</p>
<?php require_once '../../controller/userController.php';

$userController = new UserController();
$userController->checkLogin(); // Vérif si la user esr co 

// Récupérer les info de l'user 
$user = $_SESSION['user'];
session_start(); // Démarre la session pour pouvoir accéder aux variables de session

if (isset($_SESSION['user']) && $_SESSION['user']) {
    // Si l'utilisateur est co
    echo '<a href="view/front/landing.php" class="btn btn-primary btn-lg">Retourner à la page d\'accueil</a>';
} else {
    // Si l'utilisateur n'est pas co
    echo '<a href="index.php" class="btn btn-primary btn-lg">Retourner à la page de connexion</a>';
}
?>

    </div>
</div>

<!-- Script Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
