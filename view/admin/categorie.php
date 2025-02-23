<?php 
require_once '../../controller/requeteController.php';

// Vérifie si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $valeurInputCategorie = isset($_POST['nomCategorie']) ? htmlspecialchars($_POST['nomCategorie']) : "";
    echo "Valeur récupérée : " . $valeurInputCategorie;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>categorie | crud</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<button type="button" class="btn btn-outline-success btnPopup">Ajouter une Categorie</button>
<div class="modal-dialog popup d-none" role="document">
    <div class="modal-content rounded-4 shadow">
      <div class="modal-header border-bottom-0">
        <h1 class="modal-title fs-5">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body py-0">
        <p>This is a modal sheet, a variation of the modal that docs itself to the bottom of the viewport like the newer share sheets in iOS.</p>
      </div>
      <div class="modal-footer flex-column align-items-stretch w-100 gap-2 pb-3 border-top-0">
        <form method="post">
            <label class="form-label" for="form1">Nom Catégorie</label>
            <input type="text" class="" placeholder="nom de la catégorie" name="nomCategorie"></button>
            <button type="submit" class="btn btn-success btnAddCategorie" data-bs-dismiss="modal">Ajouter la catégorie</button>
        </form>
      </div>
    </div>
  </div>


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
<script src="../../public/js/main.js"></script>
</body>
</html>
