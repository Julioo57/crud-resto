<?php
require_once '../controller/requeteController.php';
// Démarre la session pour pouvoir accéder à la session de l'utilisateur
session_start();

// Fonction pour vérifier si l'utilisateur est connecté
function isUserLoggedIn() {
    return isset($_SESSION['user_id']);
}
// verif et agis 
function route($action) {
    // Si l'utilisateur est connecté, il peut accéder à certaines pages
    if ($action === 'profile' && !isUserLoggedIn()) {
        // Redirige l'utilisateur vers la page de connexion s'il essaie d'accéder à son profil sans être connecté
        header('Location: index.php?action=login');
        exit();
    }

    // en focntion de l'action 
    switch ($action) {
        case 'home':
            include 'index.php';
            break;
        case 'login':
            include 'view/front/login.php';
            break;
        case 'register':
            include 'view/front/register.php';
            break;
        default:
            include '404.php'; // si page pas find 
            break;
    }
}

// Vérifier l'action
if (isset($_GET['action'])) {
    $action = $_GET['action'];
    route($action); // Appel de la fonction route pour traiter l'action
} else {
    // page par defaukt si rien 
    route('home');
}
?>
