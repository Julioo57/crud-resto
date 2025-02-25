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


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['nomUsers'])) {
    $valeurInputUsers = htmlspecialchars($_POST['nomUsers']); // Récupérer et sécuriser la valeur
    $idUsers = $_POST['idUsers']; // Assurez-vous que cette variable existe et contient la valeur de l'ID

    if (isset($_GET['action']) && $_GET['action'] === 'updateUsers') {
        $userController->uptUsers($inputUsersNom, $inputUsersPrenom,$inputUsersMail,$inputUsersMdp,$inputUsersDroits,$inputUsersAvatar);
        header('Location: adminUsers.php');
        exit;
    }
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
<script>
    // Assure-toi que ce script est chargé après le modal et le bouton "Edit"
    document.addEventListener('DOMContentLoaded', function () {
        // Sélectionner tous les boutons d'édition
        const editButtons = document.querySelectorAll('.BtnEdit');

        // Ajouter un écouteur d'événements pour chaque bouton
        editButtons.forEach(function (button) {
            button.addEventListener('click', function () {
                // Récupérer les données des attributs data-*
                const userId = button.getAttribute('data-id');
                const userNom = button.getAttribute('data-nom');
                const userPrenom = button.getAttribute('data-prenom');
                const userEmail = button.getAttribute('data-email');
                const userAvatar = button.getAttribute('data-avatar');
                const userDroits = button.getAttribute('data-droits');

                // Insérer ces valeurs dans le modal
                document.getElementById('idUser').value = userId;
                document.getElementById('editNom').value = userNom;
                document.getElementById('editPrenom').value = userPrenom;
                document.getElementById('editEmail').value = userEmail;
                document.getElementById('editAvatar').value = userAvatar;
                document.getElementById('editDroits').value = userDroits;
            });
        });
    });
</script>

    <a href="../admin/admin.php" class="btn btn-primary">Retour</a>
    <h1 class="text-center">Gestion des Users</h1>
<!-- Bouton add design fais -->
<a href="../front/register.php" class="btn btn-outline-success btnPopup">
    Ajouter un Utilisateur
</a>

<!-- Modal -->
<!-- Modal Modifier un Utilisateur -->
<div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editUserModalLabel">Modifier l'Utilisateur</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="adminUsers.php?action=updateUser" enctype="multipart/form-data">
                    <!-- ID de l'utilisateur (caché) -->
                    <input type="hidden" name="idUser" id="idUser">

                    <div class="mb-3">
                        <label for="editNom" class="form-label">Nom</label>
                        <input type="text" class="form-control" id="editNom" name="nom" required>
                    </div>

                    <div class="mb-3">
                        <label for="editPrenom" class="form-label">Prénom</label>
                        <input type="text" class="form-control" id="editPrenom" name="prenom" required>
                    </div>

                    <div class="mb-3">
                        <label for="editEmail" class="form-label">Email</label>
                        <input type="email" class="form-control" id="editEmail" name="email" required>
                    </div>

                    <div class="mb-3">
                        <label for="editDroits" class="form-label">Droits</label>
                        <select class="form-select" id="editDroits" name="droits" required>
                            <option value="1">Admin</option>
                            <option value="2">User</option>
                        </select>
                    </div>

                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-warning">Modifier</button>
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
                        <button class="btn btn-primary BtnEdit" 
                            data-bs-toggle="modal" 
                            data-bs-target="#editUserModal" 
                            data-id="<?= htmlspecialchars($usr['id_users']); ?>" 
                            data-nom="<?= htmlspecialchars($usr['nom']); ?>"
                            data-prenom="<?= htmlspecialchars($usr['prenom']); ?>"
                            data-email="<?= htmlspecialchars($usr['mail']); ?>"
                            data-avatar="<?= htmlspecialchars($usr['avatar']); ?>""
                            data-droits="<?= htmlspecialchars($usr['droits']); ?>">
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