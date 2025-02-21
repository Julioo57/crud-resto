<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="../../public/css/default.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<section class="gradient-custom vh-100 p-5">
    <div class="container py-2 h-100 w-25">
      <div class="justify-content-center align-items-center">
          <div class="card shadow-2-strong" style="border-radius: 15px;">
            <div class="card-body p-4 p-md-4">
              <h3 class="text-center">Formulaire de Connexion*</h3>
              <p class="text-center">*Veuillez noté qu'il est obliger d'être Inscrit ou Connecté pour poursuivre.</p>  
              <hr class="divider pb-3" />
              <form action="/AdminResto/index.php?action=login" method="POST">
                  <div class="d-flex justify-content-center pb-3">
                    <div data-mdb-input-init class="form-outline datepicker">
                      <label for="birthdayDate" class="form-label"><strong>Email</strong></label>
                      <input type="email" name="mail" class="form-control form-control-lg" placeholder="nom@domaine.fr" required/>
                    </div>
                  </div>
                  <div class="d-flex justify-content-center pb-2">
                    <div data-mdb-input-init class="form-outline">
                      <label class="form-label" for="firstName"><strong>Mot De Passe</strong></label>
                      <input type="password" id="password" name="password" class="form-control form-control-lg" placeholder="Mot de passe" required/>
                    </div>
                  </div>
                
                  <div class="d-flex justify-content-center">
                    <strong><p class="align-item-center">Pas encore de compte ?<a href="register.php">Inscrivez-vous ici</a></p></strong>
                  </div>
                </div>
                <div class="d-flex justify-content-center m-2">
                  <input data-mdb-ripple-init class="btn btn-primary btn-lg" type="submit" value="Se Connecter" />
                </div>
              </form>
            </div>
          </div>
        </div>
    </div>
</section>
</body>
</html>
