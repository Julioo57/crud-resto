<?php 
require_once (__DIR__ . '/../../controller/requeteController.php');
require_once(__DIR__ . '../../../router/backRouteur.php');

// Crée une instance du contrôleur
$userController = new requeteController();

//affciher la table par defaut 
$adminDroit = $userController->getDroits();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Droits | Gestion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://kit.fontawesome.com/ab09c2f170.css" rel="stylesheet">
</head>
<body>

<!-- container top afficher btn retour & add  -->
<div class="container my-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <a href="../admin/admin.php" class="btn btn-danger">Retour</a>
        <h1 class="text-center">Gestion des Droits</h1>
        <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#addDroitModal">
            Ajouter un Droit
        </button>
    </div>

    <!-- Modal add Droit -->
    <div class="modal fade" id="addDroitModal" tabindex="-1" aria-labelledby="addDroitModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addDroitModalLabel">Ajouter un Droit</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="adminDroits.php?action=addDroit">
                        <div class="mb-3">
                            <label for="nomDroit" class="form-label">Nom du Droit</label>
                            <input type="text" class="form-control" id="nomDroit" name="nomDroit" placeholder="Nom du Droit" required>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-success">Ajouter le Droit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal edit Droit -->
    <div class="modal fade" id="editDroitModal" tabindex="-1" aria-labelledby="editDroitModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editDroitModalLabel">Modifier le Droit</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="adminDroits.php?action=updateDroits">
                        <input type="hidden" name="idDroits" id="idDroits">
                        <div class="mb-3">
                            <label for="editDroits" class="form-label">Nom du Droit</label>
                            <input type="text" class="form-control" id="editDroits" name="nomDroits" required>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-warning">Modifier</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Table de Droit -->
    <h5 class="text-center">Table des Droits</h5>
    <table class="table table-striped text-center">
        <thead>
            <tr>
                <th>ID Droit</th>
                <th>Nom Droit</th>
                <th>Modifier</th>
                <th>Supprimer</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($adminDroit as $drt): ?>
                <tr>
                    <td><?= htmlspecialchars($drt['id_droits']); ?></td>
                    <td><?= htmlspecialchars($drt['libelle_droits']); ?></td>
                    <td>
                        <!--   btn pour acceder a l'edit du modla  -->
                        <button class="btn btn-primary BtnEdit" 
                                data-bs-toggle="modal" 
                                data-bs-target="#editDroitModal" 
                                data-id="<?= htmlspecialchars($drt['id_droits']); ?>" 
                                data-name="<?= htmlspecialchars($drt['libelle_droits']); ?>">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </button>
                    </td>
                    <td>
                        <!-- form pour delete  -->
                        <form method="post" action="adminDroits.php?action=deleteDroit">
                            <input type="hidden" name="idDroit" value="<?= htmlspecialchars($drt['id_droits']); ?>">
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
