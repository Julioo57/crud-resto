<?php 
require_once (__DIR__ . '/../../controller/requeteController.php');
require_once(__DIR__ . '../../../router/backRouteur.php');

// Crée une instance du contrôleur
$userController = new requeteController();

//affciher la table par defaut 
$adminCategorie = $userController->getCategories(); // Assurez-vous que cette méthode existe dans votre contrôleur
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catégorie | Gestion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container my-5">
        <!-- container top btn retour & add  -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <a href="../admin/admin.php" class="btn btn-danger">Retour</a>
            <h1 class="text-center">Gestion des catégories</h1>
            <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#addCategoryModal">
                Ajouter une Catégorie
            </button>
        </div>

        <!-- Modal Ajouter Catégorie -->
        <div class="modal fade" id="addCategoryModal" tabindex="-1" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addCategoryModalLabel">Ajouter une Catégorie</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="adminCategorie.php?action=addCategorie">
                            <div class="mb-3">
                                <label for="nomCategorie" class="form-label">Nom de la catégorie</label>
                                <input type="text" class="form-control" id="nomCategorie" name="nomCategorie" placeholder="Nom de la catégorie" required>
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-success">Ajouter</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Modifier Catégorie -->
        <div class="modal fade" id="editCategorieModal" tabindex="-1" aria-labelledby="editCategorieModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editCategorieModalLabel">Modifier la Catégorie</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="adminCategorie.php?action=updateCategorie">
                            <input type="hidden" name="idCategorie" id="idCategorie">
                            <div class="mb-3">
                                <label for="editCategorie" class="form-label">Nom de la Catégorie</label>
                                <input type="text" class="form-control" id="editCategorie" name="nomCategorie" required>
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-warning">Modifier</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Table des catégories -->
        <div class="table-responsive">
            <table class="table table-striped table-bordered text-center">
                <thead>
                    <tr>
                        <th>ID Catégorie</th>
                        <th>Nom Catégorie</th>
                        <th>Modifier</th>
                        <th>Supprimer</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($adminCategorie as $cate): ?>
                        <tr>
                            <td><?= htmlspecialchars($cate['id_categorie']); ?></td>
                            <td><?= htmlspecialchars($cate['libelle_categorie']); ?></td>
                            <td>
                                <button class="btn btn-primary BtnEdit" 
                                    data-bs-toggle="modal" 
                                    data-bs-target="#editCategorieModal" 
                                    data-id="<?= htmlspecialchars($cate['id_categorie']); ?>" 
                                    data-name="<?= htmlspecialchars($cate['libelle_categorie']); ?>">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>
                            </td>
                            <td>
                                <form method="post" action="adminCategorie.php?action=deleteCategorie">
                                    <input type="hidden" name="idCategorie" value="<?= htmlspecialchars($cate['id_categorie']); ?>">
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fa-solid fa-trash-xmark"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://kit.fontawesome.com/ab09c2f170.js" crossorigin="anonymous"></script>
<script src="../../public/js/GestionCrud.js"></script>
</body>
</html>
