<?php 
require_once (__DIR__ . '/../../controller/requeteController.php');
require_once(__DIR__ . '../../../router/backRouteur.php');

// Crée une instance du contrôleur
$userController = new requeteController();

//affciher la table par defaut 
$adminPrestation = $userController->getPrestations(); // Assurez-vous que cette méthode existe dans votre contrôleur
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prestation | Gestion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://kit.fontawesome.com/ab09c2f170.css" rel="stylesheet">
</head>
<body>

<!-- containre top btn retour & add  -->
<div class="container my-5">
<div class="d-flex justify-content-between align-items-center mb-4">
            <a href="../admin/admin.php" class="btn btn-danger">Retour</a>
            <h1 class="text-center">Gestion des catégories</h1>
            <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#addPrestationModal">
                Ajouter une Prestation
            </button>
        </div>

<!-- Modal Prestation -->
<div class="modal fade" id="addPrestationModal" tabindex="-1" aria-labelledby="addPrestationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addPrestationModalLabel">Ajouter une Prestation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="adminPrestation.php?action=addPrestation">
                    <div class="mb-3">
                        <label for="nomPrestation" class="form-label">Nom de la Prestation</label>
                        <input type="text" class="form-control" id="nomPrestation" name="nomPrestation" placeholder="Nom de la Prestation" required>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-success">Ajouter la Prestation</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!--  Edit Prestation -->
<div class="modal fade" id="editPrestationModal" tabindex="-1" aria-labelledby="editPrestationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editPrestationModalLabel">Modifier la Prestation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="adminPrestation.php?action=updatePrestation">
                    <input type="hidden" name="idPrestation" id="idPrestation">
                    <div class="mb-3">
                        <label for="editPrestation" class="form-label">Nom de la Prestation</label>
                        <input type="text" class="form-control" id="editPrestation" name="nomPrestation" required>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-warning">Modifier</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Table Prestations -->
<div class="container my-5">
    <h5 class="text-center">Table des Prestations</h5>
    <table class="table table-striped text-center">
        <thead>
            <tr>
                <th>ID Prestation</th>
                <th>Type Prestation</th>
                <th>Modifier</th>
                <th>Supprimer</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($adminPrestation as $pres): ?>
                <tr>
                    <td><?= htmlspecialchars($pres['id_prestation']); ?></td>
                    <td><?= htmlspecialchars($pres['type_prestation']); ?></td>
                    <td>
                        <!--  btn pour modal  -->
                        <button class="btn btn-primary BtnEdit" 
                            data-bs-toggle="modal" 
                            data-bs-target="#editPrestationModal" 
                            data-id="<?= htmlspecialchars($pres['id_prestation']); ?>" 
                            data-name="<?= htmlspecialchars($pres['type_prestation']); ?>">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </button>
                    </td>
                    <td>
                        <!-- form de delete -->
                        <form method="post" action="adminPrestation.php?action=deletePrestation">
                            <input type="hidden" name="idPrestation" value="<?= htmlspecialchars($pres['id_prestation']); ?>">
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
<script src="https://kit.fontawesome.com/ab09c2f170.js" crossorigin="anonymous"></script>
<script src="../../public/js/GestionCrud.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
