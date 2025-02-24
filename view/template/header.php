<?php
require_once '../../controller/userController.php';

$userController = new UserController();
$userController->checkLogin(); // Vérifie la connexion de l'utilisateur

// Récupérer les informations utilisateur depuis la session
$user = $_SESSION['user'];
?>
<body>
<header class="p-3 p  b-3 border-bottom bg-white">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 link-body-emphasis text-decoration-none">
          <img src="../../public/img/logo_resto.webp" class="bi me-2 rounded-circle" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="landing.php"></use></img>
        </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="../front/landing.php" class="nav-link px-2 link-body-emphasis">Accueil</a></li>
          <li><a href="#Tarif" class="nav-link px-2 link-body-emphasis">Tarif</a></li>
          <li><a href="#Prestations" class="nav-link px-2 link-body-emphasis">Prestations</a></li>
        </ul>

      <div class="dropdown ms-auto text-end">
        <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            <!-- Avatar de l'utilisateur -->
            <?php if (!empty($user['avatar'])): ?>
                <img class="rounded-circle border border-2 border-black" src="../../uploads/<?= htmlspecialchars($user['avatar']); ?>" alt="Avatar" width="40" height="40">
            <?php else: ?>
                <img class="rounded-circle border border-2 border-black"alt="Avatar" width="40" height="40">
            <?php endif; ?>
        </a>
        <ul class="dropdown-menu shadow-lg" style="border-radius: 10px;">
            <?php
            if (isset($user['droits'])) {
                if ($user['droits'] == 1) {
                    echo '<li><a class="dropdown-item" href="../admin/admin.php">Gestion Administrative</a></li>';
                } elseif ($user['droits'] == 2) {
                    echo '<li><a class="dropdown-item disabled" href="#" aria-disabled="true">Gestion Administrative</a></li>';
                }
            } else {
                echo '<li><a class="dropdown-item disabled" href="#">Droits non définis</a></li>';
            }
            ?>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="logout.php">Se déconnecter</a></li>
        </ul>
      </div>
    </div>
  </header>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>