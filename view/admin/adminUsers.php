<?php 
require_once __DIR__ . '/../../controller/requeteController.php';

// Crée une instance du contrôleur
$userController = new requeteController();

//affiche les users
$adminUsers = $userController->getUsers();

// Vérifie si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['nomUsers'])) {
    $inputUsersNom = htmlspecialchars($_POST['nomUsers']); // Récupérer et sécuriser la valeur
    $inputUsersPrenom = htmlspecialchars($_POST['prenomUsers']); // Récupérer et sécuriser la valeur
    $inputUsersMail = htmlspecialchars($_POST['mailUsers']); // Récupérer et sécuriser la valeur
    $inputUsersMdp = htmlspecialchars($_POST['passwordUsers']); // Récupérer et sécuriser la valeur
    $inputUsersDroits = htmlspecialchars($_POST['droitsUsers']); // Récupérer et sécuriser la valeur
    $inputUsersAvatar = htmlspecialchars($_POST['avatarUsers']); // Récupérer et sécuriser la valeur

    // Vérifier si l'action est "addUsers"
    if (isset($_GET['action']) && $_GET['action'] === 'addUsers') {
        // Appeler la méthode pour ajouter la catégorie
        $userController->addUsers($inputUsersNom , $inputUsersPrenom, $inputUsersDroits, $inputUsersMail, $inputUsersMdp, $inputUsersAvatar);
        
        // Rediriger après ajout pour éviter le double envoi de formulaire
        header('Location: adminUsers.php');
        exit;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['idUsers'])) {
    $idUsers = $_POST['idUsers'];
    
    if (isset($_GET['action']) && $_GET['action'] === 'deleteUsers') {
        // Appeler la méthode pour supprimer la catégorie
        $userController->deleteUsers($idUsers);
        
        // Rediriger après suppression pour éviter le double envoi de formulaire
        header('Location: adminUsers.php');
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users | crud</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <a href="../admin/admin.php" class="btn btn-primary">Retour</a>
    <h1 class="text-center">Gestion des Users</h1>
<!-- Bouton add design fais -->
<button type="button" class="btn btn-outline-success btnPopup" data-bs-toggle="modal" data-bs-target="#addCategoryModal">
    Ajouter un Users
</button>

<!-- Modal -->
<div class="modal fade" id="addCategoryModal" tabindex="-1" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-4 shadow-lg">
            <div class="modal-header border-bottom-0">
                <h5 class="modal-title" id="addCategoryModalLabel">Ajouter un Users</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="text-muted">Veuillez entrer les informations du User.</p>
                <form method="post" action="adminUsers.php?action=addUsers">
                    <div class="mb-3">
                        <label for="nomUsers" class="form-label">Nom</label>
                        <input type="text" class="form-control" id="nomUsers" name="nomUsers" placeholder="Nom du Users" required>
                    </div>
                    <div class="mb-3">
                        <label for="prenomUsers" class="form-label">Prenom</label>
                        <input type="text" class="form-control" id="prenomUsers" name="prenomUsers" placeholder="prénom du Users" required>
                    </div>
                    <div class="mb-3">
                        <label for="mailUsers" class="form-label">mail</label>
                        <input type="email" class="form-control" id="mailUsers" name="mailUsers" placeholder="nom@gmail.fr" required>
                    </div>
                    <div class="mb-3">
                        <label for="passwordUsers" class="form-label">Mot de passe</label>
                        <input type="password" class="form-control" id="passwordUsers" name="passwordUsers" placeholder="...." required>
                    </div>
                    <div class="mb-3">
                        <select name="droitsUsers" id="droits" class="select form-control form-control-lg">
                            <option value="2">Utilisateur</option>
                            <option value="1">Admin</option>
                        </select>
                    </div>
                    <div class="mb-3">
                            <label for="avatarUsers" class="form-label">Avatar</label>
                            <input class="form-control" name="avatarUsers" type="file" id="formFile"  accept="image/*">
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-success">Ajouter le Users</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class=" d-block d-md-flex flex-column flex-md-row align-items-center justify-content-center text-center">
            <h5 class="text-center">table Users</h5>
            <table class="m-5 table table-striped w-50 text-center mx-auto">
                <tr>
                    <th class="p-2">ID Users</th>
                    <th class="p-2">Nom</th>
                    <th class="p-2">Prénom</th>
                    <th class="p-2">Mail</th>
                    <th class="p-2">Avatar</th>
                    <th class="p-2">Droits</th>
                    <th class="p-2">Modifier</th>
                    <th class="p-2">Supprimer</th>
                </tr>
                <?php foreach ($adminUsers as $usr): ?>
                    <tr>
                        <td><?= htmlspecialchars($usr['id_users']); ?></td>
                        <td><?= htmlspecialchars($usr['nom']); ?></td>
                        <td><?= htmlspecialchars($usr['prenom']); ?></td>
                        <td><?= htmlspecialchars($usr['mail']); ?></td>
                        <td><?= htmlspecialchars($usr['avatar']); ?></td>
                        <td><?= htmlspecialchars($usr['droits']); ?></td>
                        <td>
                            <button class="btn btn-primary btnEdit" data-bs-toggle="modal">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </button>
                        </td>
                        <td><!-- delete form avec id cache et btn  -->
                            <form method="post" action="adminUsers.php?action=deleteUsers">
                                <input type="hidden" name="idUsers" value="<?= htmlspecialchars($usr['id_users']); ?>">
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