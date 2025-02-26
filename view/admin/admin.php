<?php 
require_once '../../controller/userController.php';
require_once '../../controller/requeteController.php';
$userController = new UserController();
$userController->checkLogin(); // Vérification si l'utilisateur est connecté 
//apple ca des le debut 

$ins = page_admin1(); 
$usr = page_admin2();
$avg = page_admin3();
?>

<!-- page main cote back -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Petit Resto</title>
    <link rel="stylesheet" href="../../public/css/default.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="bg-body-secondary">
<?php 
require_once  '../template/headerAdmin.php'; 
require_once  '../template/sidebarAdmin.php'; 
  ?>
  <div class="container-fluid text-center pt-5">
    <h1 class="text-center">Bienvenue sur la partie administrative du site </h1>
    <p>ici vous pouvez créer, modifier effacer et lire votre base de donnée, pour modifier par exemple vos tarifs mais aussi ajouter ou reduire des prestations   </p>
  </div>
  <div class="container px-4 py-5" id="custom-cards">

    <div class="row row-cols-1 row-cols-lg-3 align-items-stretch g-4 py-5">
      <div class="col">
        <div class="card card-cover h-100 overflow-hidden text-bg-dark rounded-4 shadow-lg">
          <div class="d-flex flex-column h-100 p-5 text-white text-shadow-1">
            <h2  class="text-center pt-3">Nbr d'inscrit :</h2>            
            <h4 class="text-center pt-5"><?= htmlspecialchars($ins['nombre_users']); ?></h4>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card card-cover h-100 overflow-hidden text-bg-dark rounded-4 shadow-lg">
          <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
            <h2  class="text-center pt-3">Nbr d'usager :</h2>            
            <h4 class="text-center pt-5"><?= htmlspecialchars($usr['nombre_usager']); ?></h4>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card card-cover h-100 overflow-hidden text-bg-dark rounded-4 shadow-lg">
          <div class="d-flex flex-column h-100 p-5 pb-3 text-shadow-1">
            <h2  class="text-center pt-3">Dépot moyen:</h2>            
            <h4 class="text-center pt-5"><?= htmlspecialchars($avg['moyenne_depot']); ?></h4>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php require_once  '../template/footer.php'; ?>
<script src="../../public/js/main.js"></script>
<script src="https://kit.fontawesome.com/ab09c2f170.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>