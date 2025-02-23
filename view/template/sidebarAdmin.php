<?php
require_once '../../controller/userController.php';

$userController = new UserController();
$userController->checkLogin(); // Vérifie la connexion de l'utilisateur

// Récupérer les informations utilisateur depuis la session
$user = $_SESSION['user'];
?>
<div class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark vh-100" style="width: 280px;">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
      <svg class="bi pe-none me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
      <span class="fs-4">DashBoard</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item">
        <a href="#" class="nav-link text-white" aria-current="page">
          <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#home"></use></svg>
          Home
        </a>
      </li>
      <li>
        <a href="#" class="nav-link text-white">
          <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#speedometer2"></use></svg>
          Dashboard
        </a>
      </li>
      <li>
        <a href="#" class="nav-link text-white">
          <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#table"></use></svg>
          Orders
        </a>
      </li>
      <li>
        <a href="#" class="nav-link text-white">
          <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#grid"></use></svg>
          Products
        </a>
      </li>
      <li>
        <a href="#" class="nav-link text-white">
          <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#people-circle"></use></svg>
          Customers
        </a>
      </li>
    </ul>
    <hr>
    <div class="dropdown">
    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
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