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
    <link rel="icon" type="image/x-icon" href="../../public/img/favicon.ico" />
    <link rel="stylesheet" href="../../public/css/default.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<!--  link toute les pages une par une dnas bonne ordre  -->
<body class="bg-body-secondary">
<?php require_once  '../template/header.php'; ?>
<section id="accueil">
<?php require_once  '../front/accueil.php'; ?>
</section>
<section id="Tarif">
<?php require_once  '../front/tarif.php'; ?>
</section>
<section id="Prestations">
<?php require_once  '../front/prestations.php'; ?>
</section>
<section id="Contact">

</section>
<?php require_once  '../template/footer.php'; ?>

<script type="text/javascript" src="../../public/js/main.js"></script>
<!-- Bootstrap Bundle JS (inclut Popper.js) -->
</body>
</html>