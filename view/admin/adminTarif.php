<?php 
require_once __DIR__ . '/../../controller/requeteController.php';

// Crée une instance du contrôleur
$userController = new requeteController();

// Récupérer toutes les catégories depuis la base de données
$adminTarif = $userController->getTarif(); 

// Vérifie si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les valeurs envoyées par le formulaire
    $idPrestation = isset($_POST['id_prestation']) ? $_POST['id_prestation'] : null;
    $idCategorie = isset($_POST['id_categorie']) ? $_POST['id_categorie'] : null;
    $idTarif = isset($_POST['nomTarif']) ? $_POST['nomTarif'] : null;

    // Vérifier si toutes les valeurs sont présentes
    if ($idPrestation && $idCategorie && $idTarif) {
        // Appeler la fonction en passant les valeurs en arguments
        $userController->addTarif($idPrestation, $idCategorie, $idTarif);
    } else {
        // Si une des valeurs manque, afficher un message d'erreur
        echo "Tous les champs sont obligatoires.";
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
// Vérifie si la requête vient du formulaire de modification
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_GET['action']) && $_GET['action'] == 'editTarif') {
    // Récupérer les valeurs envoyées par le formulaire
    $idPrestation = isset($_POST['id_prestation']) ? $_POST['id_prestation'] : null;
    $idCategorie = isset($_POST['id_categorie']) ? $_POST['id_categorie'] : null;
    $nomTarif = isset($_POST['nomTarif']) ? $_POST['nomTarif'] : null;

    // Vérifier si toutes les valeurs sont présentes
    if ($idTarif && $idPrestation && $idCategorie && $nomTarif) {
        // Appeler la fonction pour mettre à jour le tarif
        $userController->updateTarif($idTarif, $idPrestation, $idCategorie, $nomTarif);
    } else {
        // Si une des valeurs manque, afficher un message d'erreur
        echo "Tous les champs sont obligatoires.";
    }
}


?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarif | crud</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <a href="../admin/admin.php" class="btn btn-primary">Retour</a>
    <h1 class="text-center">Gestion des Tarifs</h1>
<!-- Bouton add design fais -->
<button type="button" class="btn btn-outline-success btnPopup" data-bs-toggle="modal" data-bs-target="#addCategoryModal">
    Ajouter une Catégorie
</button>

<!-- Modal -->
<div class="modal fade" id="addCategoryModal" tabindex="-1" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-4 shadow-lg">
            <div class="modal-header border-bottom-0">
                <h5 class="modal-title" id="addCategoryModalLabel">Ajouter un Tarif</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="text-muted">Veuillez entrer le nouveau Tarif.</p>
                <form method="post" action="adminTarif.php?action=addTarif">
                    <label for="idPrestation" class="form-label">Type de Prestation</label>
                    <select name="id_prestation" id="idPrestation" class="select form-control form-control-lg">
                        <option value="1">Plat Principal</option>
                        <option value="2">Plat + Dessert</option>
                        <option value="3">Entrée + Plat</option>
                        <option value="4">Supplément Entrée</option>
                        <option value="5">Supplément Dessert</option>
                        <option value="6">Repas complet</option>
                        <option value="7">Alcool</option>
                        <option value="8">Apéritif</option>
                        <option value="9">Soda</option>
                    </select>

                    <label for="idCategorie" class="form-label">Type de Catégorie</label>
                    <select name="id_categorie" id="idCategorie" class="select form-control form-control-lg">
                        <option value="1">Petits Revenus</option>
                        <option value="2">Revenus moyens</option>
                        <option value="3">Gros revenus</option>
                        <option value="4">Visiteur</option>
                    </select>

                    <input type="text" class="form-control" id="nomTarif" name="nomTarif" placeholder="Valeur du Tarif" required>

                    <button type="submit" class="btn btn-primary">Ajouter</button>
                </form>


            </div>
        </div>
    </div>
</div>
<button type="button" class="btn btn-outline-success btnPopup" data-bs-toggle="modal" data-bs-target="#uptCategoryModal">
    Modifier un prix
</button>

<!-- Modal -->
<div class="modal fade" id="uptCategoryModal" tabindex="-1" aria-labelledby="uptCategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-4 shadow-lg">
            <div class="modal-header border-bottom-0">
                <h5 class="modal-title" id="uptCategoryModalLabel">Modifier un Tarif</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="text-muted">Veuillez entrer le nouveau Tarif.</p>
                <form method="post" action="adminTarif.php?action=editTarif">
                    <!-- Champ caché pour l'ID du tarif à modifier -->
                    <input type="hidden" name="idTarif" id="idTarif" value="">

                    <label for="idPrestation" class="form-label">Type de Prestation</label>
                    <select name="id_prestation" id="idPrestation" class="select form-control form-control-lg">
                        <option value="1">Plat Principal</option>
                        <option value="2">Plat + Dessert</option>
                        <option value="3">Entrée + Plat</option>
                        <option value="4">Supplément Entrée</option>
                        <option value="5">Supplément Dessert</option>
                        <option value="6">Repas complet</option>
                        <option value="7">Alcool</option>
                        <option value="8">Apéritif</option>
                        <option value="9">Soda</option>
                    </select>

                    <label for="idCategorie" class="form-label">Type de Catégorie</label>
                    <select name="id_categorie" id="idCategorie" class="select form-control form-control-lg">
                        <option value="1">Petits Revenus</option>
                        <option value="2">Revenus moyens</option>
                        <option value="3">Gros revenus</option>
                        <option value="4">Visiteur</option>
                    </select>

                    <input type="text" class="form-control" id="nomTarif" name="nomTarif" placeholder="Valeur du Tarif" required>

                    <button type="submit" class="btn btn-primary">Modifier</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class=" d-block d-md-flex flex-column flex-md-row align-items-center justify-content-center text-center">
            <h5 class="text-center">table Tarif</h5>
            <table class="m-5 table table-striped w-50 text-center mx-auto">
                <tr>
                    <th class="p-2">ID Prestration</th>
                    <th class="p-2">ID Catégorie</th>
                    <th class="p-2">Prix</th>
                    <th class="p-2">Supprimer</th>
                </tr>
                <?php foreach ($adminTarif as $tar): ?>
                    <tr>
                        <td><?= htmlspecialchars($tar['id_prestation']); ?></td>
                        <td><?= htmlspecialchars($tar['id_categorie']); ?></td>
                        <td><?= htmlspecialchars($tar['prix']); ?></td>
                        <td><!-- delete form avec id cache et btn  -->
                            <form method="post" action="adminTarif.php?action=deleteTarif">
                                <input type="hidden" name="idPrestation" value="<?= htmlspecialchars($tar['id_prestation']); ?>">
                                <input type="hidden" name="idCategorie" value="<?= htmlspecialchars($tar['id_categorie']); ?>">
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