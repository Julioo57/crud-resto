<?php 
require_once __DIR__ . '/../../controller/requeteController.php';

// Crée une instance du contrôleur
$userController = new requeteController();

// Récupérer toutes les catégories depuis la base de données
$adminPrestation = $userController->getPrestations(); // Assurez-vous que cette méthode existe dans votre contrôleur

// Vérifie si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['nomPrestation'])) {
    $valeurInputPrestation = htmlspecialchars($_POST['nomPrestation']); // Récupérer et sécuriser la valeur

    // Vérifier si l'action est "addCategorie"
    if (isset($_GET['action']) && $_GET['action'] === 'addPrestation') {
        // Appeler la méthode pour ajouter la catégorie
        $userController->addCategorie($valeurInputPrestation);
        
        // Rediriger après ajout pour éviter le double envoi de formulaire
        header('Location: adminPrestation.php');
        exit;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['idPrestation'])) {
    $idPrestation = $_POST['idPrestation'];
    
    if (isset($_GET['action']) && $_GET['action'] === 'deletePrestation') {
        // Appeler la méthode pour supprimer la catégorie
        $userController->deletePrestation($idPrestation);
        
        // Rediriger après suppression pour éviter le double envoi de formulaire
        header('Location: adminPrestation.php');
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prestation | crud</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <a href="../admin/admin.php" class="btn btn-primary">Retour</a>
    <h1 class="text-center">Gestion des Prestation</h1>
<!-- Bouton add design fais -->
<button type="button" class="btn btn-outline-success btnPopup" data-bs-toggle="modal" data-bs-target="#addCategoryModal">
    Ajouter une Prestation
</button>

<!-- Modal -->
<div class="modal fade" id="addCategoryModal" tabindex="-1" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-4 shadow-lg">
            <div class="modal-header border-bottom-0">
                <h5 class="modal-title" id="addCategoryModalLabel">Ajouter une Prestation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="text-muted">Veuillez entrer le nom de la nouvelle Prestation.</p>
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

<div class=" d-block d-md-flex flex-column flex-md-row align-items-center justify-content-center text-center">
            <h5 class="text-center">table Prestation</h5>
            <table class="m-5 table table-striped w-50 text-center mx-auto">
                <tr>
                    <th class="p-2">ID Prestation</th>
                    <th class="p-2">Nom Prestation</th>
                    <th class="p-2">Modifier</th>
                    <th class="p-2">Supprimer</th>
                </tr>
                <?php foreach ($adminPrestation as $pres): ?>
                    <tr>
                        <td><?= htmlspecialchars($pres['id_Prestation']); ?></td>
                        <td><?= htmlspecialchars($pres['libelle_Prestation']); ?></td>
                        <td>
                            <button class="btn btn-primary btnEdit" data-bs-toggle="modal">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </button>
                        </td>
                        <td><!-- delete form avec id cache et btn  -->
                            <form method="post" action="adminPrestation.php?action=deletePrestation">
                                <input type="hidden" name="idPrestation" value="<?= htmlspecialchars($cate['id_Prestation']); ?>">
                                <button type="submit" class="btn btn-danger btnDelete">
                                    <i class="fa-solid fa-trash-xmark"></i>
                                </button>
                            </form>
                        </td>

                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
<script src="https://kit.fontawesome.com/ab09c2f170.js" crossorigin="anonymous"></script>
<script src="../../public/js/main.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
//// la page admin bloque tout