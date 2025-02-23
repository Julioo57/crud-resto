<?php 
require_once '../../controller/requeteController.php';
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>categorie | krud</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class=" d-block d-md-flex flex-column flex-md-row align-items-center justify-content-center text-center">
            <h5 class="text-center">table catégorie</h5>
            <table class="m-5 table table-striped w-50 text-center mx-auto">
                <tr>
                    <th class="p-2">ID Catégorie</th>
                    <th class="p-2">Nom Catégorie</th>
                    <th class="p-2">Modifier</th>
                    <th class="p-2">Supprimer</th>
                </tr>
                <?php foreach ($categorie as $cate): ?>
                    <tr>
                        <td><?= htmlspecialchars($cate['id_categorie']); ?></td>
                        <td><?= htmlspecialchars($cate['libelle_categorie']); ?></td>
                        <td><button class="btn btn-primary btnEdit"><i class="fa-solid fa-pen-to-square"></i></button></td>
                        <td><button class="btn btn-danger btnDelete"><i class="fa-solid fa-trash-xmark"></i></button></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
<script src="https://kit.fontawesome.com/ab09c2f170.js" crossorigin="anonymous"></script>
</body>
</html>
