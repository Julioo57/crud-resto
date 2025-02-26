<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription | restaurant</title>
    <script src="https://kit.fontawesome.com/ab09c2f170.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../public/css/default.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<section class="gradient-custom">
  <div class="container py-2 h-100">
    <div class="row justify-content-center align-items-center h-100">
      <div class="col-12 col-lg-9 col-xl-7">
        <div class="card shadow-2-strong shadow" style="border-radius: 15px;">
          <div class="card-body p-4 p-md-5">
            <h3 class="text-center">Formulaire d'Inscription*</h3>
            <p class="text-center">*Veuillez noté qu'il est obliger d'être Inscrit ou Connecté pour poursuivre.</p>  
            <hr class="divider pb-5" />
            <form action="/AdminResto/index.php?action=register" method="POST" enctype="multipart/form-data">

              <div class="row">
              <label class="form-label pb-2" for="firstName"><strong>Nom</strong></label>
                <div class="col-md-6 mb-4">
                  
                  <div data-mdb-input-init class="form-outline"> 
                    <input type="text" id="firstName" name="prenom" class="form-control form-control-lg" placeholder="Prénom" required/>
                  </div>

                </div>
                <div class="col-md-6 mb-4">

                  <div data-mdb-input-init class="form-outline">
                    <input type="text" id="lastName" name="name" class="form-control form-control-lg" placeholder="Nom"required/>
                  </div>

                </div>
              </div>

              <div class="row">
                <div class="col-md-6 mb-4 d-flex align-items-center">

                  <div data-mdb-input-init class="form-outline datepicker w-100">
                    <label for="birthdayDate" class="form-label"><strong>Email</strong></label>
                    <input type="email" name="mail" class="form-control form-control-lg" placeholder="nom@domaine.fr" required/>
                  </div>

                </div>
                <div class="col-md-6 mb-4">
                  <div data-mdb-input-init class="form-outline">
                    <label class="form-label" for="firstName"><strong>Mot De Passe</strong></label>
                    <input type="password" id="password" name="password" class="form-control form-control-lg" placeholder="Mot de passe" required/>
                  </div>
                </div>
              </div>
              <div class="row">
              <label  class="pb-2"><strong>Avatar</strong></label>
                <div class="col-md-6 mb-4 d-flex align-items-center">
                <div class="d-flex">
                  <input class="form-control" name="avatar" type="file" id="formFile"  accept="image/*">
                  <button class="btn btn-danger m-1" id="deleteBtn"><i class="fa-solid fa-trash-can-xmark"></i></button>
                </div>
                </div>
              </div>
              <div class="row">
              <label class="form-label select-label"><strong>Vos Droits</strong></label>
                <div class="col-md-6 mb-4">
                  <select name="droits" id="droits" class="select form-control form-control-lg">
                    <option value="2">Utilisateur</option>
                    <option value="1">Admin</option>
                  </select>
                </div>
              </div>
              <div class="row pt-3">
                <div class="col-md-6 mb-4">
                <label for="conditions">
                  <input type="checkbox" id="conditions" required>
                  <strong>J'accepte les conditions d'utilisation.</strong>
              </label>
                </div>
                <div class="col-md-6 mb-4 ps-5">
                  <strong><p class="align-item-center">Déjà un compte ? <a href="login.php">Connectez-vous ici</a></p></strong>
                </div>
              </div>
              <div class="d-flex justify-content-center mt-4 pt-2 m-2">
                <input data-mdb-ripple-init class="btn btn-primary btn-lg" type="submit" value="S'inscrire" />
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>