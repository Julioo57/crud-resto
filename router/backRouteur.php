<?php 
require_once(__DIR__ . '/../controller/requeteController.php');
// gère la partie back du site. 
//verif pour table USERS. 
$userController = new requeteController();
// check si form submit 
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

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id_users'])) {
    $idUsers = $_POST['id_users'];

    if (isset($_GET['action']) && $_GET['action'] === 'deleteUsers') {
        $userController->deleteUsers($idUsers);
        header('Location: adminUsers.php');
        exit;
    }
}



?> 