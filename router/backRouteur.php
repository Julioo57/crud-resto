<?php 
require_once(__DIR__ . '/../controller/requeteController.php');
// gère la partie back du site. 
//main 
// Fonction pour vérifier si l'utilisateur est connecté
function isUserLoggedIn() {
    return isset($_SESSION['user_id']);
}
// verif et agis 
function route($action) {
    // Si l'utilisateur est connecté, il peut accéder à certaines pages
    if ($action === 'profile' && !isUserLoggedIn()) {
        // Redirige l'utilisateur vers la page de connexion s'il essaie d'accéder à son profil sans être connecté
        header('Location: index.php?action=login');
        exit();
    }

    // en focntion de l'action 
    switch ($action) {
        case 'home':
            include '../index.php';
            break;
        case 'login':
            include '../view/front/login.php';
            break;
        case 'register':
            include '../view/front/register.php';
            break;
        default:
            include '404.php'; // si page pas find 
            break;
    }
}
//verif pour table USERS. 
$userController = new requeteController();
// check si soumis | upt
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['editNom']) && isset($_POST['editPrenom']) && isset($_POST['editEmail']) && isset($_POST['editDroits'])) {
    $inputUsersNom = htmlspecialchars($_POST['editNom']);
    $inputUsersPrenom = htmlspecialchars($_POST['editPrenom']);
    $inputUsersMail = htmlspecialchars($_POST['editEmail']);
    $inputUsersDroits = htmlspecialchars($_POST['editDroits']);

    if (isset($_GET['action']) && $_GET['action'] === 'updateUsers') {
        $idUsers = $_POST['id_users'];
        $userController->uptUsers($idUsers, $inputUsersNom, $inputUsersPrenom, $inputUsersMail, $inputUsersDroits);
        header('Location: adminUsers.php');
        exit;
    }
}
// check si soumis | delete
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id_users'])) {
    $idUsers = $_POST['id_users'];

    if (isset($_GET['action']) && $_GET['action'] === 'deleteUsers') {
        $userController->deleteUsers($idUsers);
        header('Location: adminUsers.php');
        exit;
    }
}
//verif pour table TARIFS

// check si soumis | add 
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
    }
}
//check si soumis | delete 
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
//check si soumis | upt
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
// verif pour table PRESTATION

//check si soumis | add
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['nomPrestation'])) {
    $valeurInputPrestation = htmlspecialchars($_POST['nomPrestation']); // Récupérer et sécuriser la valeur

    // Vérifier si l'action est "addPrestation"
    if (isset($_GET['action']) && $_GET['action'] === 'addPrestation') {
        // Appeler la méthode pour ajouter la prestation
        $userController->addPrestation($valeurInputPrestation);
        
        // Rediriger après ajout pour éviter le double envoi de formulaire
        header('Location: adminPrestation.php');
        exit();
    }
}
//check si soumis | upt
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['nomPrestation'])) {
    $valeurInputPrestation = htmlspecialchars($_POST['nomPrestation']); // Récupérer et sécuriser la valeur
    $idPrestation = $_POST['idPrestation']; // Assurez-vous que cette variable existe et contient la valeur de l'ID

    if (isset($_GET['action']) && $_GET['action'] === 'updatePrestation') {
        $userController->uptPrestation($valeurInputPrestation, $idPrestation);
        header('Location: adminPrestation.php');
        exit();
    }
}
//check si soumis | delete
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['idPrestation'])) {
    $idPrestation = $_POST['idPrestation'];
    
    if (isset($_GET['action']) && $_GET['action'] === 'deletePrestation') {
        // Appeler la méthode pour supprimer la prestation
        $userController->deletePrestation($idPrestation);
        
        // Rediriger après suppression pour éviter le double envoi de formulaire
        header('Location: adminPrestation.php');
        exit();
    }
}
// verif pour table DROITS 

//check si soumis | add
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['nomDroit'])) {
    $valeurInputDroit = htmlspecialchars($_POST['nomDroit']); // Récupérer et sécuriser la valeur

    // Vérifier si l'action est "addDroit"
    if (isset($_GET['action']) && $_GET['action'] === 'addDroit') {
        // Appeler la méthode pour ajouter la catégorie
        $userController->addDroit($valeurInputDroit);
        
        // Rediriger après ajout pour éviter le double envoi de formulaire
        header('Location: adminDroits.php');
        exit();
    }
}
//check si soumis | upt

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['nomDroits'])) {
    $valeurInputDroits = htmlspecialchars($_POST['nomDroits']); // Récupérer et sécuriser la valeur
    $idDroits = $_POST['idDroits']; // Assurez-vous que cette variable existe et contient la valeur de l'ID

    if (isset($_GET['action']) && $_GET['action'] === 'updateDroits') {
        $userController->uptDroits($valeurInputDroits, $idDroits);
        header('Location: adminDroits.php');
        exit();
    }
}
//check si soumis | delete

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['idDroit'])) {
    $idDroit = $_POST['idDroit'];
    
    if (isset($_GET['action']) && $_GET['action'] === 'deleteDroit') {
        // Appeler la méthode pour supprimer la catégorie
        $userController->deleteDroit($idDroit);
        
        // Rediriger après suppression pour éviter le double envoi de formulaire
        header('Location: adminDroits.php');
        exit();
    }
}
// verif pour table CATEGORIE

//check si soumis | add
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['nomCategorie'])) {
    $valeurInputCategorie = htmlspecialchars($_POST['nomCategorie']); // Récupérer et sécuriser la valeur

    // Vérifier si l'action est "addCategorie"
    if (isset($_GET['action']) && $_GET['action'] === 'addCategorie') {
        // Appeler la méthode pour ajouter la catégorie
        $userController->addCategorie($valeurInputCategorie);
        
        // Rediriger après ajout pour éviter le double envoi de formulaire
        header('Location: adminCategorie.php');
        exit;
    }
}
//check si soumis | upt
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['nomCategorie'])) {
    $valeurInputCategorie = htmlspecialchars($_POST['nomCategorie']); // Récupérer et sécuriser la valeur
    $idCategorie = $_POST['idCategorie']; // Assurez-vous que cette variable existe et contient la valeur de l'ID

    if (isset($_GET['action']) && $_GET['action'] === 'updateCategorie') {
        var_dump($valeurInputCategorie, $idCategorie); // Vérifiez ici aussi
        $userController->uptCategorie($valeurInputCategorie, $idCategorie);
        header('Cache-Control: no-cache, no-store, must-revalidate');
        header('Pragma: no-cache');
        header('Expires: 0');
        header('Location: adminCategorie.php');
        exit;
    }
}
//check si soumis | delete
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['idCategorie'])) {
    $idCategorie = $_POST['idCategorie'];
    
    if (isset($_GET['action']) && $_GET['action'] === 'deleteCategorie') {
        // Appeler la méthode pour supprimer la catégorie
        $userController->deleteCategorie($idCategorie);
        
        // Rediriger après suppression pour éviter le double envoi de formulaire
        header('Location: adminCategorie.php');
        exit;
    }
}
?> 