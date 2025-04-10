<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Connexion - Restaurant</title>
  <link rel="icon" type="image/x-icon" href="../../public/img/favicon.ico" />
  <link rel="stylesheet" href="../../public/css/default.css"/>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&family=Open+Sans&display=swap" rel="stylesheet" />
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

</head>
<body>
  <!-- FOND flouté -->
  <div class="bg-custom"></div>

  <!-- CONTENU centré -->
  <div class="container-wrapper py-5 d-flex justify-content-center align-items-center">
    <div class="login-wrapper d-flex flex-column justify-content-center align-items-center">
      <div class="card shadow-sm w-100" id="loginCard">
        <div class="card-body text-center">
          <div class="mb-3">
            <img src="../../public/img/logo_resto.png" alt="Logo Restaurant" class="rounded-circle brand-logo" />
          </div>
          <h3 class="mb-3 text-dark">Connexion</h3>
          <p class="text-muted">Bienvenue dans votre espace gourmet</p>
          <form action="../../index.php?action=login" method="POST">
            <div class="mb-3">
              <label for="email" class="form-label text-dark">Email</label>
              <div class="input-group">
                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                <input type="email" id="email" name="mail" class="form-control" placeholder="nom@restaurant.com" required />
              </div>
            </div>
            <div class="mb-3">
              <label for="password" class="form-label text-dark">Mot de passe</label>
              <div class="input-group">
                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                <input type="password" id="password" name="password" class="form-control" placeholder="••••••••" required />
              </div>
            </div>
            <button type="submit" class="btn-custom-login w-100">Se connecter</button>
          </form>
          <div class="mt-3">
            <p class="mb-0 text-dark">Pas encore de compte ? <a href="register.php" class="link-custom">Inscrivez-vous ici</a></p>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Bootstrap Bundle -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
