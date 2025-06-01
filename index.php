<?php
// Inclusion ou autoload du contrôleur nécessaire
require_once 'controller/userController.php'; 

// Création d'une instance de UserController
$userController = new UserController();

// Vérifie si le paramètre 'action' est défini et valide
if (isset($_GET['action'])) {
    $action = htmlspecialchars($_GET['action']); // Protection contre les attaques XSS
    
    // Utilisation d'un switch pour plus de lisibilité
    switch ($action) {
        case 'register':
            $userController->register();
            break;
        case 'login':
            $userController->login();
            break;
        case 'logout':
            $userController->logout();
            break;
        default:
            // Gérer les actions invalides (redirection ou message d'erreur)
            echo "Action invalide !";
            break;
    }
} else {
    // Optionnel : redirection ou affichage d'une vue par défaut si 'action' n'est pas défini
    echo "Aucune action spécifiée.";
}
?>

<!-- Inclusion du script redirect.js -->
<script type="text/javascript" src="public/js/redirect.js"></script>
