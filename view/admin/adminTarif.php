<?php 
require_once __DIR__ . '/../../controller/requeteController.php';

// Crée une instance du controller requete
$userController = new requeteController();

// Récupérer toutes les catégories depuis la base de données
$adminTarif = $userController->getTarif(); 

// Vérifie si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_GET['action']) && $_GET['action'] == 'addTarif') {
    // Récupérer les valeurs envoyées par le formulaire
    $idPrestation = isset($_POST['idPrestationAdd']) ? $_POST['idPrestationAdd'] : null;
    $idCategorie = isset($_POST['idCategorieCat']) ? $_POST['idCategorieCat'] : null;
    $prixTarif = isset($_POST['addTarif']) ? $_POST['addTarif'] : null;
    echo" ($idPrestation,$idCategorie ,$prixTarif)";
    // Verif si toutes les valeurs sont présentes
    if ($idPrestation && $idCategorie && $prixTarif) {
        // Fonction avec arguments 
        $userController->addTarif($idPrestation, $idCategorie, $prixTarif);
    } else {
        // Si une des valeurs manque, afficher un message d'erreur
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_GET['action']) && $_GET['action'] == 'deleteTarif') {
    // Récupérer les valeurs envoyées par le formulaire
    $idPrestation = isset($_POST['idPrestation']) ? $_POST['idPrestation'] : null;
    $idCategorie = isset($_POST['idCategorie']) ? $_POST['idCategorie'] : null;

    // Vérifier si les valeurs sont présentes
    if ($idPrestation && $idCategorie) {
        // Appeler la fonction pour supprimer le tarif
        $userController->deleteTarif($idPrestation, $idCategorie);
    } else {
        // Si une des valeurs manque, afficher un message d'erreur
        header('Location: adminTarif.php');
        exit();
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_GET['action']) && $_GET['action'] == 'updateTarif') {
    // Récupérer les valeurs envoyées par le formulaire
    $idPrestation = isset($_POST['idTarif']) ? $_POST['idTarif'] : null;
    $idCategorie = isset($_POST['idCategorie']) ? $_POST['idCategorie'] : null;
    $prixTarif = isset($_POST['editTarif']) ? $_POST['editTarif'] : null;

    // Vérifier si toutes les valeurs sont présentes
    if ($idPrestation && $idCategorie && $prixTarif) {
        // Appeler la fonction pour mettre à jour le tarif
        $userController->updateTarif($idPrestation, $idCategorie, $prixTarif);
    } 
    header('Location: adminTarif.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarif | CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://kit.fontawesome.com/ab09c2f170.css" rel="stylesheet">
</head>
<body>

<!-- Header Section -->
<div class="container my-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <a href="../admin/admin.php" class="btn btn-primary">Retour</a>
        <h1 class="text-center">Gestion des Tarifs</h1>
        <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#addTarifModal">
            Ajouter un Tarif
        </button>
    </div>

    <!-- Modal poru add Tarif -->
    <div class="modal fade" id="addTarifModal" tabindex="-1" aria-labelledby="addTarifModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addTarifModalLabel">Ajouter un Tarif</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="adminTarif.php?action=addTarif">
                        <div class="mb-3">
                            <label for="idPrestation" class="form-label">ID Prestation</label>
                            <input type="text" class="form-control" id="idPrestationAdd" name="idPrestationAdd" placeholder="ID de la prestation" required>
                        </div>
                        <div class="mb-3">
                            <label for="idCategorie" class="form-label">ID Categorie</label>
                            <input type="text" class="form-control" id="idCategorieCat" name="idCategorieCat" placeholder="ID de la catégorie" required>
                        </div>
                        <div class="mb-3">
                            <label for="addTarif" class="form-label">Prix</label>
                            <input type="text" class="form-control" id="addTarif" name="addTarif" placeholder="Prix du tarif" required>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-success">Ajouter le Tarif</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal fpour edit  Tarif -->
    <div class="modal fade" id="editTarifModal" tabindex="-1" aria-labelledby="editTarifModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editTarifModalLabel">Modifier le Tarif</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="adminTarif.php?action=updateTarif">
                        <input type="hidden" name="idTarif" id="idTarifPrestation">
                        <input type="hidden" name="idCategorie" id="idTarifCategorie">
                        <div class="mb-3">
                            <label for="editTarif" class="form-label">Nouveau tarif</label>
                            <input type="text" class="form-control" id="editTarif" name="editTarif" required>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-warning">Modifier</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Table for Managing Tarifs -->
    <h5 class="text-center">Table des Tarifs</h5>
    <table class="table table-striped text-center">
        <thead>
            <tr>
                <th>ID Prestation</th>
                <th>ID Catégorie</th>
                <th>Prix</th>
                <th>Modifier</th>
                <th>Supprimer</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($adminTarif as $tar): ?>
                <tr>
                    <td><?= htmlspecialchars($tar['id_prestation']); ?></td>
                    <td><?= htmlspecialchars($tar['id_categorie']); ?></td>
                    <td><?= htmlspecialchars($tar['prix']); ?></td>
                    <td>
                        <button class="btn btn-primary BtnEditTarif" 
                                data-bs-toggle="modal" 
                                data-bs-target="#editTarifModal" 
                                data-id-prestation="<?= htmlspecialchars($tar['id_prestation']); ?>" 
                                data-id-categorie="<?= htmlspecialchars($tar['id_categorie']); ?>" 
                                data-prix="<?= htmlspecialchars($tar['prix']); ?>">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </button>
                    </td>
                    <td>
                        <form method="post" action="adminTarif.php?action=deleteTarif">
                            <input type="hidden" name="idPrestation" value="<?= htmlspecialchars($tar['id_prestation']); ?>">
                            <input type="hidden" name="idCategorie" value="<?= htmlspecialchars($tar['id_categorie']); ?>">
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
