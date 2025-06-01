<?php 
// Affiche un message d'erreur pour l'utilisateur
echo "Erreur 404 faites marche arrière.";
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <!-- Définition de l'encodage des caractères en UTF-8 -->
    <meta charset="UTF-8">
    <!-- Définition de la compatibilité responsive pour un affichage adapté aux écrans mobiles -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Erreur 404</title>
    <!-- Ajout du lien vers le fichier CSS de Bootstrap depuis un CDN pour le style de la page -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light"> <!-- Corps de la page avec un fond clair -->

<!-- Container central qui centre le contenu dans la page -->
<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="text-center">
        <!-- Titre de la page avec un message d'erreur -->
        <h1 class="display-1 text-danger">404</h1> <!-- Affiche l'erreur 404 en grand et en rouge -->
        <h3>Page non trouvée</h3> <!-- Sous-titre -->
        <p class="lead">Désolé, la page que vous recherchez n'existe pas.</p> <!-- Message d'explication -->

        <?php 
        // Inclusion du contrôleur userController.php
        require_once '../../controller/userController.php';

        // Création d'une instance du contrôleur UserController
        $userController = new UserController();

        // Vérification si l'utilisateur est connecté via une méthode checkLogin() 
        $userController->checkLogin(); // Cette fonction pourrait vérifier la session utilisateur

        // Démarrage de la session pour récupérer les variables de session
        session_start();

        // Vérification si l'utilisateur est connecté en utilisant la variable de session
        if (isset($_SESSION['user']) && $_SESSION['user']) {
            // Si l'utilisateur est connecté, afficher un lien vers la page d'accueil
            echo '<a href="view/front/landing.php" class="btn btn-primary btn-lg">Retourner à la page d\'accueil</a>';
        } else {
            // Si l'utilisateur n'est pas connecté, afficher un lien vers la page de connexion
            echo '<a href="index.php" class="btn btn-primary btn-lg">Retourner à la page de connexion</a>';
        }
        ?>

    </div>
</div>

<!-- Inclusion du script Bootstrap depuis un CDN pour rendre la page interactive -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 
<!-- Fin du code HTML de la page d'erreur 404 -->
<!-- Fin du code PHP -->