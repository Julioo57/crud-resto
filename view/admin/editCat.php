<?php 
require_once __DIR__ . '/../../controller/requeteController.php';

// Vérifier si l'action est de modification et si un ID est passé
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['action']) && $_GET['action'] == 'editCategorie' && isset($_GET['id'])) {
    $idCategorie = $_GET['id'];
    
    // Récupérer les informations de la catégorie à modifier
    $userController = new requeteController();
    $categorie = $userController->getCategorieById($idCategorie);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier catégorie</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

<div class="container">
    <h2>Modifier Catégorie</h2>
    <form method="post" action="categorie.php?action=updateCategorie">
        <input type="hidden" name="idCategorie" value="<?= htmlspecialchars($categorie['id_categorie']); ?>">
        
        <label class="form-label" for="nomCategorie">Nom Catégorie</label>
        <input type="text" class="form-control" name="nomCategorie" value="<?= htmlspecialchars($categorie['libelle_categorie']); ?>" required>
        
        <button type="submit" class="btn btn-success">Mettre à jour la catégorie</button>
    </form>
</div>

</body>
</html>
