<?php
require_once '../../controller/userController.php';

$userController = new UserController();
$userController->checkLogin(); // Vérifie la connexion de l'utilisateur

// Récupérer les informations utilisateur depuis la session
$user = $_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<header class="p-3 mb-3 border-bottom">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 link-body-emphasis text-decoration-none">
          <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
        </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="#" class="nav-link px-2 link-secondary">Overview</a></li>
          <li><a href="#" class="nav-link px-2 link-body-emphasis">Inventory</a></li>
          <li><a href="#" class="nav-link px-2 link-body-emphasis">Customers</a></li>
          <li><a href="#" class="nav-link px-2 link-body-emphasis">Products</a></li>
        </ul>

        <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
          <input type="search" class="form-control" placeholder="Search..." aria-label="Search">
        </form>

        <div class="dropdown text-end">
          <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
          <?php if (!empty($user['avatar'])): ?>
            <img class="border-rounded" src="../../<?= htmlspecialchars($user['avatar']); ?>" alt="Avatar" width="33">
        <?php endif; ?>
          </a>
          <ul class="dropdown-menu text-small">
            <?php
             if (isset($user['droits'])) {
                 if ($user['droits'] == 1) {
                     echo '<li><a class="dropdown-item" href="admin/index.php">Gestion Administrative</a></li>';
                 } elseif ($user['droits'] == 2) {
                     echo '<li><a class="dropdown-item disabled" href="#" aria-disabled="true">Gestion Administrative</a></li>';
                 }
             } else {
                 echo '<li><a class="dropdown-item disabled" href="#">Droits non définis</a></li>';
             }
             ?>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="logout.php">Se Deconnecter</a></li>
          </ul>
        </div>
      </div>
    </div>
  </header>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>