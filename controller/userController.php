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
        // Vérification si la requête est bien en méthode POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
            // Vérification des champs nécessaires
            if (!empty($_POST['name']) && !empty($_POST['prenom']) && !empty($_POST['mail']) && !empty($_POST['password'])) {
                
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
    
                    // Vérification de l'extension du fichier image
                    $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
                    if (in_array($avatarExtension, $allowedExtensions)) {
                        if (!is_dir('uploads/avatars')) {
                            mkdir('uploads/avatars', 0777, true); // Créer le dossier s'il n'existe pas
                        }
    
                        // Définir le nom unique pour l'avatar
                        $avatar = 'avatars/' . uniqid() . '.' . $avatarExtension;
                        // Déplacer l'avatar vers le dossier de destination
                        move_uploaded_file($avatarTmpName, 'uploads/' . $avatar);
                    } else {
                        echo "Seules les images de type jpg, jpeg, png ou gif sont autorisées.";
                        return;
                    }
                }
    
                try {
                    // Connexion à la base de données
                    $pdo = Database::getConnection();
    
                    // Vérifier si l'email existe déjà dans la base de données
                    $checkSql = "SELECT id_users FROM users WHERE mail = :email";
                    $checkStmt = $pdo->prepare($checkSql);
                    $checkStmt->bindParam(':email', $email, PDO::PARAM_STR);
                    $checkStmt->execute();
    
                    if ($checkStmt->fetch()) {
                        echo "Cet email est déjà utilisé.";
                        return;
                    }
    
                    // Insertion de l'utilisateur dans la base de données
                    $sql = "INSERT INTO users (nom, prenom, mail, password, droits, avatar) 
                            VALUES (:nom, :prenom, :email, :password, :droits, :avatar)";
                    $stmt = $pdo->prepare($sql);
                    $stmt->bindParam(':nom', $nom, PDO::PARAM_STR);
                    $stmt->bindParam(':prenom', $prenom, PDO::PARAM_STR);
                    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
                    $stmt->bindParam(':password', $password, PDO::PARAM_STR);
                    $stmt->bindParam(':droits', $droits, PDO::PARAM_STR);
                    $stmt->bindParam(':avatar', $avatar, PDO::PARAM_STR);
    
                    // Si l'insertion est réussie
                    if ($stmt->execute()) {
                        header("Location:view/front/login.php");
                        exit(); // S'assurer de terminer l'exécution après la redirection
                    } else {
                        echo "Erreur lors de l'inscription. Veuillez réessayer.";
                    }
                } catch (PDOException $e) {
                    echo "Erreur lors de l'inscription : " . $e->getMessage();
                }
            }
        }
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
