<?php 
require_once '../../controller/userController.php';
$userController = new UserController();
$userController->checkLogin(); // Vérif si la user esr co 

// Récupérer les info de l'user 
$user = $_SESSION['user'];
?>
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
<script src="../../public/js/main.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>