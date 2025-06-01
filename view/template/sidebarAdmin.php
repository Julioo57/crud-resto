<?php
// Inclusion du contrôleur utilisateur pour pouvoir utiliser ses méthodes
require_once '../../controller/userController.php';

// Création d'une instance de UserController et vérification si l'utilisateur est connecté
$userController = new UserController();
$userController->checkLogin(); // Cette méthode devrait vérifier que l'utilisateur est connecté

// Récupération des informations de l'utilisateur à partir de la session
$user = $_SESSION['user'];
?>

 <!-- Navbar en haut -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Petit Resto</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="../admin/adminCategorie.php">Catégories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../admin/adminPrestation.php">Prestations</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../admin/adminTarif.php">Tarifs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../admin/adminUsers.php">Utilisateurs</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
