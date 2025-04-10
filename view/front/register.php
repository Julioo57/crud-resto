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
  <link rel="stylesheet" href="../../public/css/default.css"/>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&family=Open+Sans&display=swap" rel="stylesheet" />
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

  <style>
    .bg-custom {
      background-image: url('../../public/img/pizza_login.png');
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
      filter: blur(8px);
      position: fixed;
      width: 100%;
      height: 100%;
      z-index: -1;
    }

    .register-wrapper {
      background-color: rgba(255, 248, 240, 0.95);
      border-radius: 1.5rem;
      box-shadow: 0 0 30px rgba(0, 0, 0, 0.15);
      max-width: 650px;
      width: 100%;
      padding: 2rem;
    }

    h3 {
      font-family: 'Playfair Display', serif;
    }

    .form-label {
      font-weight: bold;
      color: #3a3a3a;
    }

    .form-control:focus {
      border-color: #a52a2a;
      box-shadow: 0 0 0 0.2rem rgba(165, 42, 42, 0.25);
    }

    .btn-custom-login {
      background-color: #a52a2a;
      color: white;
      padding: 0.6rem 1.5rem;
      border: none;
      border-radius: 0.375rem;
      font-weight: bold;
      transition: background-color 0.3s ease;
    }

    .btn-custom-login:hover {
      background-color: #8b1a1a;
    }

    .link-custom {
      color: #a52a2a;
      text-decoration: underline;
    }

    .link-custom:hover {
      color: #701010;
    }

    @media (max-width: 767.98px) {
      .register-wrapper {
        padding: 1.5rem;
      }
    }
  </style>
</head>

<body>
  <!-- FOND flouté -->
  <div class="bg-custom"></div>

  <!-- CONTENU centré -->
  <div class="container min-vh-100 py-5 d-flex justify-content-center align-items-center">
    <div class="register-wrapper">
      <div class="text-center mb-4">
        <img src="../../public/img/logo_resto.png" alt="Logo Restaurant" class="rounded-circle" width="80" height="80" />
        <h3 class="mt-3">Inscription</h3>
        <p class="text-muted">Remplissez les champs pour créer un compte</p>
      </div>
      
      <form action="../../index.php?action=register" method="POST" enctype="multipart/form-data">
        <?php if (isset($errors) && count($errors) > 0): ?>
        <div class="alert alert-danger">
          <ul>
            <?php foreach ($errors as $error): ?>
              <li><?php echo htmlspecialchars($error); ?></li>
            <?php endforeach; ?>
          </ul>
        </div>
        <?php endif; ?>

        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="prenom" class="form-label">Prénom</label>
            <input type="text" id="prenom" name="prenom" class="form-control" placeholder="Jean" required />
          </div>
          <div class="col-md-6 mb-3">
            <label for="name" class="form-label">Nom</label>
            <input type="text" id="name" name="name" class="form-control" placeholder="Dupont" required />
          </div>
        </div>

        <div class="mb-3">
          <label for="mail" class="form-label">Email</label>
          <input type="email" name="mail" id="mail" class="form-control" placeholder="nom@domaine.fr" required />
        </div>

        <div class="mb-3">
          <label for="password" class="form-label">Mot de passe</label>
          <input type="password" name="password" id="password" class="form-control" placeholder="••••••••" required />
        </div>

        <div class="mb-3">
          <label for="avatar" class="form-label">Avatar</label>
          <input class="form-control" name="avatar" type="file" id="avatar" accept="image/*">
        </div>

        <div class="mb-3">
          <label for="droits" class="form-label">Droits</label>
          <select name="droits" id="droits" class="form-select">
            <option value="2">Utilisateur</option>
            *<option value="1">admin</option>
          </select>
        </div>

        <div class="mb-3 form-check">
          <input type="checkbox" class="form-check-input" id="conditions" required>
          <label class="form-check-label" for="conditions">J'accepte les conditions d'utilisation</label>
        </div>

        <div class="d-grid">
          <button type="submit" class="btn-custom-login">S'inscrire</button>
        </div>

        <div class="mt-3 text-center">
          <p>Déjà un compte ? <a href="login.php" class="link-custom">Connectez-vous ici</a></p>
        </div>
      </form>
    </div>
  </div>

  <!-- Bootstrap Bundle -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
