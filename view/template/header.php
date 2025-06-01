<?php
// Inclusion du contrôleur utilisateur pour vérifier la connexion et récupérer les informations de l'utilisateur
require_once '../../controller/userController.php';

// Création de l'instance du contrôleur et vérification si l'utilisateur est connecté
$userController = new UserController();
$userController->checkLogin();

// Récupération des informations de l'utilisateur depuis la session
$user = $_SESSION['user'];
?>

<header class="bg-white border-bottom">
  <!-- Navigation principale -->
  <nav class="navbar navbar-expand-lg navbar-light bg-white container">
    <!-- Logo et nom du site avec lien vers la page d'accueil -->
    <a class="navbar-brand d-flex align-items-center" href="../../view/front/landing.php">
      <!-- Logo de l'entreprise, avec taille et bordure rondes -->
      <img src="../../public/img/logo_resto.png" alt="Logo" class="rounded-circle me-2" width="40" height="32">
      <!-- Nom de l'entreprise, en gras -->
      <span class="fw-bold">Le Délice Gourmand</span>
    </a>

    <!-- Bouton de menu responsive qui apparaît sur les écrans petits -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar" aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Menu de navigation principal qui s'affiche en mode mobile ou sur les grands écrans -->
    <div class="collapse navbar-collapse justify-content-center" id="mainNavbar">
      <ul class="navbar-nav mb-2 mb-lg-0">
        <!-- Lien vers la page d'accueil -->
        <li class="nav-item">
          <a class="nav-link" href="../front/landing.php">Accueil</a>
        </li>
        <!-- Lien vers la section Tarif -->
        <li class="nav-item">
          <a class="nav-link" href="#Tarif">Tarif</a>
        </li>
        <!-- Lien vers la section Prestations -->
        <li class="nav-item">
          <a class="nav-link" href="#Prestations">Prestations</a>
        </li>
        <!-- Lien vers la section Contact -->
        <li class="nav-item">
          <a class="nav-link" href="#Contact">Contact</a>
        </li>
      </ul>
    </div>

    <!-- Dropdown pour l'utilisateur connecté, avec son avatar -->
    <div class="dropdown">
      <a href="#" class="d-flex align-items-center text-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
        <!-- Vérification si l'utilisateur a un avatar, sinon affichage d'un avatar par défaut -->
        <?php if (!empty($user['avatar'])): ?>
          <img src="../../uploads/<?= htmlspecialchars($user['avatar']); ?>" alt="Avatar" class="rounded-circle border border-2 border-dark" width="40" height="40">
        <?php else: ?>
          <img src="../../public/img/default_icon_users.jpg" alt="Avatar" class="rounded-circle border border-2 border-dark" width="40" height="40">
        <?php endif; ?>
      </a>
      <!-- Menu déroulant affichant des options utilisateur -->
      <ul class="dropdown-menu dropdown-menu-end shadow" style="border-radius: 10px;">
        <?php if (isset($user['droits'])): ?>
          <!-- Si l'utilisateur a des droits administratifs (droits == 1), afficher le lien vers la gestion administrative -->
          <?php if ($user['droits'] == 1): ?>
            <li><a class="dropdown-item" href="../admin/admin.php">Gestion Administrative</a></li>
          <?php else: ?>
            <!-- Si l'utilisateur n'a pas les droits administratifs (droits != 1), afficher le lien désactivé -->
            <li><a class="dropdown-item disabled" href="#" aria-disabled="true">Gestion Administrative</a></li>
          <?php endif; ?>
        <?php else: ?>
          <!-- Si les droits de l'utilisateur ne sont pas définis, afficher un message -->
          <li><a class="dropdown-item disabled" href="#">Droits non définis</a></li>
        <?php endif; ?>

        <!-- Séparateur dans le menu déroulant -->
        <li><hr class="dropdown-divider"></li>
        <!-- Option pour déconnexion -->
        <li><a class="dropdown-item text-danger" href="logout.php">Se déconnecter</a></li>
      </ul>
    </div>
  </nav>
</header>
