<?php 
require_once '../../controller/userController.php';
require_once '../../controller/requeteController.php';
$userController = new UserController();
$userController->checkLogin(); // Vérification si l'utilisateur est connecté

$ins = page_admin1(); 
$usr = page_admin2();
$avg = page_admin3();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Petit Resto - Admin</title>
    <link rel="stylesheet" href="../../public/css/default.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
   <?php require_once  '../template/sidebarAdmin.php'; ?>
    <div class="container-fluid mt-5 pt-5">
        <div class="row">
            <!-- Contenu principal -->
            <main class="col pt-4 main-admin">
                <div class="container">
                    <h1 class="display-5 fw-bold text-center mb-4">Bienvenue sur l'administration du Petit Resto</h1>
                    <p class="lead text-center mb-5">
                        Ici, vous pouvez gérer les données du site : créer, modifier ou supprimer des tarifs, prestations ou utilisateurs.
                    </p>

                    <div class="row row-cols-1 row-cols-lg-3 g-2">
                        <!-- Carte 1 -->
                        <div class="col">
                            <div class="card shadow-sm h-100 border-0 bg-dark text-white rounded-4">
                                <div class="card-body text-center d-flex flex-column justify-content-center">
                                    <h5 class="card-title mb-3">Nombre d'inscrits</h5>
                                    <h2><?= htmlspecialchars($ins['nombre_users']); ?></h2>
                                </div>
                            </div>
                        </div>

                        <!-- Carte 2 -->
                        <div class="col">
                            <div class="card shadow-sm h-100 border-0 bg-dark text-white rounded-4">
                                <div class="card-body text-center d-flex flex-column justify-content-center">
                                    <h5 class="card-title mb-3">Nombre d'usagers</h5>
                                    <h2><?= htmlspecialchars($usr['nombre_usager']); ?></h2>
                                </div>
                            </div>
                        </div>

                        <!-- Carte 3 -->
                        <div class="col">
                            <div class="card shadow-sm h-100 border-0 bg-dark text-white rounded-4">
                                <div class="card-body text-center d-flex flex-column justify-content-center">
                                    <h5 class="card-title mb-3">Dépôt moyen</h5>
                                    <h2><?= htmlspecialchars($avg['moyenne_depot']); ?></h2>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Bouton Vue Client ajouté directement dans le dashboard -->
                    <div class="d-flex justify-content-center mt-4">
                        <a href="../front/landing.php" class="btn btn-danger shadow-sm px-4 py-2 rounded-pill">
                            <i class="fas fa-eye"></i> Vue Client
                        </a>
                    </div>

                </div>
            </main>
        </div>
    </div>
    <script src="../../public/js/main.js"></script>
    <script src="https://kit.fontawesome.com/ab09c2f170.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
