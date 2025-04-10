<?php
require_once __DIR__ . '/../model/Bdd.php';
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

class UserController {
    
    // Fonction de connexion
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' ){
            if (!empty($_POST['mail']) && !empty($_POST['password'])) {
                $email = trim($_POST['mail']);
                $password = trim($_POST['password']);
    
                try {
                    $pdo = Database::getConnection();
    
                    // Vérifier si l'utilisateur existe
                    $sql = "SELECT id_users, nom, prenom, mail, password, avatar, droits FROM users WHERE mail = :email";
                    $stmt = $pdo->prepare($sql);
                    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
                    $stmt->execute();
    
                    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
    
                    if ($user && password_verify($password, $user['password'])) {
                        session_start(); // Démarrer la session
    
                        $_SESSION['user'] = [
                            'id_users' => $user['id_users'],
                            'nom' => $user['nom'],
                            'prenom' => $user['prenom'],
                            'mail' => $user['mail'],
                            'droits' => $user['droits'],
                            'avatar' => $user['avatar']
                        ];
    
                        // Débogage : Vérifier la session avant la redirection
                        var_dump($_SESSION['user']);
    
                        // Redirection après connexion réussie
                        header("Location:view/front/landing.php");
                        exit();
                    } else {
                        echo "Identifiants incorrects.";
                    }
                } catch (PDOException $e) {
                    echo "Erreur lors de la connexion : " . $e->getMessage();
                }
            } else {
                echo "Veuillez remplir tous les champs.";
            }
        }
    }
    

    // Fonction d'inscription
    public function register() {
        // Initialisation d'un tableau pour stocker les messages d'erreur
        $errors = [];
    
        // Vérification si la requête est bien en méthode POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
            // Vérification des champs nécessaires
            if (empty($_POST['name']) || empty($_POST['prenom']) || empty($_POST['mail']) || empty($_POST['password'])) {
                $errors[] = "Tous les champs obligatoires doivent être remplis.";
            }
    
            // Récupération des données du formulaire
            $nom = trim($_POST['name']);
            $prenom = trim($_POST['prenom']);
            $email = trim($_POST['mail']);
            $password = password_hash(trim($_POST['password']), PASSWORD_BCRYPT); // Hash du mot de passe
            $droits = isset($_POST['droits']) ? $_POST['droits'] : '2'; // Par défaut "Utilisateur" (droits = 2)
    
            // Gestion de l'avatar (fichier image)
            $avatar = null;
            if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] === 0) {
                $avatarTmpName = $_FILES['avatar']['tmp_name'];
                $avatarName = basename($_FILES['avatar']['name']);
                $avatarExtension = strtolower(pathinfo($avatarName, PATHINFO_EXTENSION));
    
                // Définir un tableau des extensions autorisées
                $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
    
                // Vérifier si l'extension du fichier est autorisée
                if (!in_array($avatarExtension, $allowedExtensions)) {
                    $errors[] = "Seules les extensions jpg, jpeg, png et gif sont autorisées pour l'avatar.";
                }
    
                // Vérification de la taille du fichier (par exemple, 2 Mo max)
                $maxFileSize = 2 * 1024 * 1024; // 2 Mo
                if ($_FILES['avatar']['size'] > $maxFileSize) {
                    $errors[] = "L'avatar est trop grand, la taille maximale autorisée est de 2 Mo.";
                }
    
                // Vérification si le dossier 'uploads/avatars' existe et a les bonnes permissions
                if (!is_dir('uploads/avatars')) {
                    if (!mkdir('uploads/avatars', 0777, true)) {
                        $errors[] = "Impossible de créer le dossier pour les avatars.";
                    }
                }
    
                // Créer un nom unique pour l'avatar et définir son chemin
                $avatar = 'avatars/' . uniqid() . '.' . $avatarExtension;
                $uploadPath = 'uploads/' . $avatar;
    
                // Déplacer l'avatar dans le dossier approprié
                if (!move_uploaded_file($avatarTmpName, $uploadPath)) {
                    $errors[] = "Erreur lors du déplacement de l'avatar.";
                }
            }
    
            // Si des erreurs existent déjà, on arrête le traitement
            if (count($errors) > 0) {
                return $errors; // Retourne les erreurs pour qu'elles puissent être affichées dans le formulaire
            }
    
            // Connexion à la base de données
            try {
                $pdo = Database::getConnection();
    
                // Vérifier si l'email existe déjà dans la base de données
                $checkSql = "SELECT id_users FROM users WHERE mail = :email";
                $checkStmt = $pdo->prepare($checkSql);
                $checkStmt->bindParam(':email', $email, PDO::PARAM_STR);
                $checkStmt->execute();
    
                if ($checkStmt->fetch()) {
                    $errors[] = "Cet email est déjà utilisé.";
                    return $errors; // Retourner les erreurs, l'email est déjà pris
                }
    
                // Préparer la requête d'insertion
                $sql = "INSERT INTO users (nom, prenom, mail, password, droits, avatar) 
                        VALUES (:nom, :prenom, :email, :password, :droits, :avatar)";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':nom', $nom, PDO::PARAM_STR);
                $stmt->bindParam(':prenom', $prenom, PDO::PARAM_STR);
                $stmt->bindParam(':email', $email, PDO::PARAM_STR);
                $stmt->bindParam(':password', $password, PDO::PARAM_STR);
                $stmt->bindParam(':droits', $droits, PDO::PARAM_STR);
                $stmt->bindParam(':avatar', $avatar, PDO::PARAM_STR);
    
                // Exécution de la requête
                if ($stmt->execute()) {
                    // Si l'insertion est réussie, ne redirigez pas immédiatement. Vous pouvez choisir de rediriger
                    // ou de donner un retour positif dans la page pour que l'utilisateur soit informé de son succès
                    return [];  // Retourner un tableau vide si l'inscription a réussi
                } else {
                    $errors[] = "Erreur lors de l'insertion de l'utilisateur.";
                    return $errors;
                }
            } catch (PDOException $e) {
                $errors[] = "Erreur lors de l'inscription : " . $e->getMessage();
                return $errors;
            }
        }
    
        return $errors; // Retourne les erreurs pour le cas où le formulaire n'est pas soumis ou en cas d'erreur
    }
    
    
    // Fonction de déconnexion
    public function logout() {
        session_start();
        session_destroy();
        header("Location:login.php");
        exit();
    }
    public function checkLogin() {
    
        // Vérifier si un utilisateur est connecté
        if (!isset($_SESSION['user']['id_users'])) {
            // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
            header("Location: login.php");
            exit();
        }
    
        try {
            $pdo = Database::getConnection();
            
            // Récupérer les informations de l'utilisateur connecté
            $sql = "SELECT id_users, nom, prenom, mail, avatar, droits FROM users WHERE id_users = :id_users";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':id_users', $_SESSION['user']['id_users'], PDO::PARAM_INT);
            $stmt->execute();
    
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
            if ($user) {
                // Mettre à jour l'user
                $_SESSION['user'] = $user;
            } else {
                session_destroy();
                header("Location: login.php");
                exit();
            }
        } catch (PDOException $e) {
            echo "Erreur lors de la récupération des données utilisateur : " . $e->getMessage();
        }
    }
}
?>
