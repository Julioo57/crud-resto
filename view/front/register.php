<?php 
require_once __DIR__ . '../../../controller/userController.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Inscription - Restaurant</title>
  <link rel="icon" type="image/x-icon" href="../../public/img/favicon.ico" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&family=Open+Sans&display=swap" />
  <link rel="stylesheet" href="../../public/css/register.css"/>
</head>
<body>
  <div class="bg-image"></div>

  <div class="container">
    <div class="register-container">
      <div class="text-center mb-4">
        <img src="../../public/img/logo_resto.png" alt="Logo Restaurant" width="80" class="rounded-circle mb-2">
        <h3>Créer un compte</h3>
        <p class="text-muted">Remplissez les informations ci-dessous</p>
      </div>

      <form action="../../index.php?action=register" method="POST" enctype="multipart/form-data">
        <?php if (isset($errors) && count($errors) > 0): ?>
          <div class="alert alert-danger">
            <ul>
              <?php foreach ($errors as $error): ?>
                <li><?= htmlspecialchars($error) ?></li>
              <?php endforeach; ?>
            </ul>
          </div>
        <?php endif; ?>

        <div class="row">
          <div class="col-md-4 mb-3">
            <label for="prenom" class="form-label">Prénom</label>
            <input type="text" id="prenom" name="prenom" class="form-control" placeholder="Jean" required>
          </div>
          <div class="col-md-4 mb-3">
            <label for="name" class="form-label">Nom</label>
            <input type="text" id="name" name="name" class="form-control" placeholder="Dupont" required>
          </div>
          <div class="col-md-4 mb-3">
            <label for="adresse" class="form-label">Adresse</label>
            <input type="text" id="adresse" name="adresse" class="form-control" placeholder="123 rue de Paris" required>
          </div>
        </div>

        <div class="row">
          <div class="col-md-4 mb-3">
            <label for="mail" class="form-label">Email</label>
            <input type="email" id="mail" name="mail" class="form-control" placeholder="email@example.com" required>
          </div>
          <div class="col-md-4 mb-3">
            <label for="password" class="form-label">Mot de passe</label>
            <input type="password" id="password" name="password" class="form-control" placeholder="••••••••" required>
          </div>
          <div class="col-md-4 mb-3">
            <label for="avatar" class="form-label">Avatar</label>
            <input type="file" id="avatar" name="avatar" class="form-control" accept="image/*">
          </div>
        </div>

          <div class="mb-3">
            <label for="droits" class="form-label">Droits</label>
            <select name="droits" id="droits" class="form-select">
              <option value="2">Utilisateur</option>
              <option value="1">Admin</option>
            </select>
          </div>
          <div class=" mb-3 d-flex align-items-center">
            <div class="form-check">
              <input type="checkbox" id="conditions" class="form-check-input" required>
              <label for="conditions" class="form-check-label">J'accepte les conditions d'utilisation</label>
            </div>
          </div>
        <div class="d-grid mt-4">
          <button type="submit" class="btn btn-custom btn-lg">S'inscrire</button>
        </div>

        <div class="text-center mt-3">
          <p>Déjà un compte ? <a href="login.php" class="text-decoration-underline text-danger">Connectez-vous ici</a></p>
        </div>
      </form>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
