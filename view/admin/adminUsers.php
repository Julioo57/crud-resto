<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarif | Gestion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
   <style>
        /* Style pour le message d'avertissement */
        .warning-message {
            display: none;
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
            padding: 10px;
            text-align: center;
            font-size: 16px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body class="bg-light">

<!-- Avertissement mobile -->
<div id="mobile-warning" class="d-flex flex-column justify-content-center align-items-center text-center vh-100 bg-warning-subtle text-dark px-4" style="display: none;">
    <div>
        <h2 class="fw-bold mb-3">Accès restreint</h2>
        <p class="lead">Cette page n’est pas disponible sur les appareils mobiles.<br>Veuillez utiliser un écran plus large.</p>
    </div>
</div>

<!-- Contenu principal -->
<div id="page-content">
    <!--  container top btn add & retour -->
    <div class="container my-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <a href="../admin/admin.php" class="btn btn-danger">Retour</a>
            <h1 class="text-center">Gestion des Utilisateurs</h1>
            <a href="../front/register.php" class="btn btn-outline-success">
                Ajouter un utilisateur
            </a>
        </div>
        <!-- Table Utilisateurs -->
        <div class="container my-5">
            <h5 class="text-center">Table des Utilisateurs</h5>
            <table class="table table-striped text-center">
                <thead>
                    <tr>
                        <th>ID Utilisateur</th>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Email</th>
                        <th>Avatar</th>
                        <th>Droits</th>
                        <th>Modifier</th>
                        <th>Supprimer</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($adminUsers as $usr): ?>
                        <tr>
                            <td><?= htmlspecialchars($usr['id_users']); ?></td>
                            <td><?= htmlspecialchars($usr['nom']); ?></td>
                            <td><?= htmlspecialchars($usr['prenom']); ?></td>
                            <td><?= htmlspecialchars($usr['mail']); ?></td>
                            <td><?= htmlspecialchars($usr['avatar']); ?></td>
                            <td><?= htmlspecialchars($usr['droits']); ?></td>
                            <td>
                                <!-- btn edit vers modal -->
                                <button class="btn btn-primary BtnEdit" 
                                    data-bs-toggle="modal" 
                                    data-bs-target="#editUserModal" 
                                    data-id="<?= htmlspecialchars($usr['id_users']); ?>" 
                                    data-nom="<?= htmlspecialchars($usr['nom']); ?>"
                                    data-prenom="<?= htmlspecialchars($usr['prenom']); ?>"
                                    data-email="<?= htmlspecialchars($usr['mail']); ?>"
                                    data-avatar="<?= htmlspecialchars($usr['avatar']); ?>"
                                    data-droits="<?= htmlspecialchars($usr['droits']); ?>">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>
                            </td>
                            <td>
                                <!-- form pour delete l'users -->
                                <form method="post" action="adminUsers.php?action=deleteUsers">
                                    <input type="hidden" name="id_users" value="<?= htmlspecialchars($usr['id_users']); ?>">
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

        <!-- Modal Modifier Utilisateur -->
        <div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editUserModalLabel">Modifier l'Utilisateur</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="adminUsers.php?action=updateUsers">
                            <input type="hidden" name="id_users" id="id_users">
                            <div class="mb-3">
                                <label for="editNom" class="form-label">Nom</label>
                                <input type="text" class="form-control" id="editNom" name="editNom" required>
                            </div>
                            <div class="mb-3">
                                <label for="editPrenom" class="form-label">Prénom</label>
                                <input type="text" class="form-control" id="editPrenom" name="editPrenom" required>
                            </div>
                            <div class="mb-3">
                                <label for="editEmail" class="form-label">Email</label>
                                <input type="email" class="form-control" id="editEmail" name="editEmail" required>
                            </div>
                            <div class="mb-3">
                                <label for="editDroits" class="form-label">Droits</label>
                                <select class="form-select" id="editDroits" name="editDroits" required>
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
    </div>

    <script src="https://kit.fontawesome.com/ab09c2f170.js" crossorigin="anonymous"></script>
  <script>
document.addEventListener('DOMContentLoaded', function () {
    const content = document.getElementById('page-content');
    const warning = document.getElementById('mobile-warning');

    function checkWidth() {
        if (window.innerWidth < 812) {
            if (content) content.style.display = 'none';
            warning.style.display = 'flex';
        } else {
            if (content) content.style.display = 'block';
            warning.style.display = 'none';
        }
    }

    checkWidth();
    window.addEventListener('resize', checkWidth);
});
</script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
