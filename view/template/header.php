<?php
require_once '../../controller/userController.php';

$userController = new UserController();
$userController->checkLogin();

$user = $_SESSION['user'];
?>

<header class="bg-white border-bottom">
  <nav class="navbar navbar-expand-lg navbar-light bg-white container">
    <a class="navbar-brand d-flex align-items-center" href="../../view/front/landing.php">

      <img src="../../public/img/logo_resto.png" alt="Logo" class="rounded-circle me-2" width="40" height="32">
      <span class="fw-bold">Le Délice Gourmand</span>
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar" aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-center" id="mainNavbar">
      <ul class="navbar-nav mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="../front/landing.php">Accueil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#Tarif">Tarif</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#Prestations">Prestations</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#Contact">Contact</a>
        </li>
      </ul>
    </div>

      <!-- Dropdown utilisateur -->
      <div class="dropdown">
        <a href="#" class="d-flex align-items-center text-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
          <?php if (!empty($user['avatar'])): ?>
            <img src="../../uploads/<?= htmlspecialchars($user['avatar']); ?>" alt="Avatar" class="rounded-circle border border-2 border-dark" width="40" height="40">
          <?php else: ?>
            <img src="../../public/img/default_icon_users.jpg" alt="Avatar" class="rounded-circle border border-2 border-dark" width="40" height="40">
          <?php endif; ?>
        </a>
        <ul class="dropdown-menu dropdown-menu-end shadow" style="border-radius: 10px;">
          <?php if (isset($user['droits'])): ?>
            <?php if ($user['droits'] == 1): ?>
              <li><a class="dropdown-item" href="../admin/admin.php">Gestion Administrative</a></li>
            <?php else: ?>
              <li><a class="dropdown-item disabled" href="#" aria-disabled="true">Gestion Administrative</a></li>
            <?php endif; ?>
          <?php else: ?>
            <li><a class="dropdown-item disabled" href="#">Droits non définis</a></li>
          <?php endif; ?>

          <li><hr class="dropdown-divider"></li>
          <li><a class="dropdown-item text-danger" href="logout.php">Se déconnecter</a></li>
        </ul>
      </div>
    </div>
  </nav>
</header>
