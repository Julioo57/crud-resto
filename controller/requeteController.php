<?php 
require_once __DIR__ . '/../model/Bdd.php';
$pdo = Database::getConnection();
// Requête poru recupe les categrories egal a 1 
$sql = "SELECT t.prix, p.type_prestation FROM `tarif` AS t NATURAL JOIN prestation AS p NATURAL JOIN categorie AS c WHERE c.id_categorie = 1;";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$petitRevenue = $stmt->fetchAll(PDO::FETCH_ASSOC);
// Requête poru recupe les categrories egal a 2
$sql = "SELECT t.prix, p.type_prestation FROM `tarif` AS t NATURAL JOIN prestation AS p NATURAL JOIN categorie AS c WHERE c.id_categorie = 2;";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$RevenueMoyen = $stmt->fetchAll(PDO::FETCH_ASSOC);
// Requête poru recupe les categrories egal a 3 
$sql = "SELECT t.prix, p.type_prestation FROM `tarif` AS t NATURAL JOIN prestation AS p NATURAL JOIN categorie AS c WHERE c.id_categorie = 3;";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$grosRevenue = $stmt->fetchAll(PDO::FETCH_ASSOC);
// Requête poru recupe les categrories egal a 4 
$sql = "SELECT t.prix, p.type_prestation FROM `tarif` AS t NATURAL JOIN prestation AS p NATURAL JOIN categorie AS c WHERE c.id_categorie = 4;";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$visiteur = $stmt->fetchAll(PDO::FETCH_ASSOC);
// Requête poru afficher presta
$sql = "SELECT p.type_prestation FROM `prestation` AS p;";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$prestations = $stmt->fetchAll(PDO::FETCH_ASSOC);


// requete pour la aprtie back 
// Requête poru afficher presta


class requeteController {
    // affichange table categorie 
    // gerer tout ce qui est categorie 
    public function getCategories() {
        // Connexion à la base de données
        $pdo = Database::getConnection();
        
        // Préparation de la requête pour récupérer toutes les catégories
        $query = "SELECT * FROM categorie";
        $stmt = $pdo->prepare($query);
        
        // Exécution de la requête
        $stmt->execute();
        
        // Retourner les résultats sous forme de tableau associatif
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        public function uptCategorie($valeurInputCategorie, $idCategorie) {
            $pdo = Database::getConnection();
        
            // Préparation de la requête pour mettre à jour une catégorie
            $query = "UPDATE categorie SET libelle_categorie =? WHERE id_categorie =?";
        
            try {
                // Préparez la requête
                $stmt = $pdo->prepare($query);
        
                // Liez les paramètres à la requête
                $stmt->execute([$valeurInputCategorie, $idCategorie]);
        
                if ($stmt->rowCount() > 0) {
                    echo "La catégorie a été mise à jour avec succès.";
                } else {
                    echo "Aucune modification effectuée. Peut-être que l'ID n'existe pas ou les données sont les mêmes.";
                }
            } catch (PDOException $e) {
                echo "Erreur lors de la mise à jour : " . $e->getMessage();
            }
        }
        
        public function addCategorie($valeurInputCategorie) { // Accepter la variable en paramètre
        $pdo = Database::getConnection();
      
        // placeholde pour verifier 
        $query = "INSERT INTO categorie (libelle_categorie) VALUES (?)";
        
        // Préparez la requête
        $stmt = $pdo->prepare($query);
        
        // Liez le paramètre à la requête
        $stmt->execute([$valeurInputCategorie]);
    }

    public function deleteCategorie($idCategorie) {
        // Connexion à la base de données
        $pdo = Database::getConnection();
        
        // Préparation de la requête de suppression
        $query = "DELETE FROM categorie WHERE id_categorie = ?";
        $stmt = $pdo->prepare($query);
        
        // Exécution de la requête avec l'ID de la catégorie à supprimer
        $stmt->execute([$idCategorie]);
    }
     // Méthode pour récupérer une catégorie par son ID
     public function getCategorieById($idCategorie) {
        $pdo = Database::getConnection();
        $query = "SELECT * FROM categorie WHERE id_categorie = ?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$idCategorie]);
        
        // Retourner la première ligne (il doit y en avoir une seule)
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    // afffiche table prestions 
    public function getPrestations() {
        // Connexion à la base de données
        $pdo = Database::getConnection();
        
        // Préparation de la requête pour récupérer toutes les catégories
        $query = "SELECT * FROM prestation";
        $stmt = $pdo->prepare($query);
        
        // Exécution de la requête
        $stmt->execute();
        
        // Retourner les résultats sous forme de tableau associatif
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function uptPrestation($valeurInputPrestation, $idPrestation) {
        $pdo = Database::getConnection();
    
        // Préparation de la requête pour mettre à jour une catégorie
        $query = "UPDATE prestation SET type_prestation =? WHERE id_prestation =?";
    
        try {
            // Préparez la requête
            $stmt = $pdo->prepare($query);
    
            // Liez les paramètres à la requête
            $stmt->execute([$valeurInputPrestation, $idPrestation]);
    
            if ($stmt->rowCount() > 0) {
                echo "La catégorie a été mise à jour avec succès.";
            } else {
                echo "Aucune modification effectuée. Peut-être que l'ID n'existe pas ou les données sont les mêmes.";
            }
        } catch (PDOException $e) {
            echo "Erreur lors de la mise à jour : " . $e->getMessage();
        }
    }
    public function addPrestation($valeurInputPrestation) { // Accepter la variable en paramètre
        $pdo = Database::getConnection();
      
        // placeholde pour verifier 
        $query = "INSERT INTO Prestation (type_Prestation) VALUES (?)";
        
        // Préparez la requête
        $stmt = $pdo->prepare($query);
        
        // Liez le paramètre à la requête
        $stmt->execute([$valeurInputPrestation]);
    }

    function deletePrestation($idPrestation) {
        $pdo = Database::getConnection();
        $query = "DELETE FROM Prestation WHERE id_Prestation = ?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$idPrestation]);
    }
    
    
     // Méthode pour récupérer une catégorie par son ID
     public function getPrestationById($idPrestation) {
        $pdo = Database::getConnection();
        $query = "SELECT * FROM Prestation WHERE id_Prestation = ?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$idPrestation]);
        
        // Retourner la première ligne (il doit y en avoir une seule)
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    // affichage table tarif 
    // crud tarif 
    public function getTarif() {
        // Connexion à la base de données
        $pdo = Database::getConnection();
        
        // Préparation de la requête pour récupérer toutes les catégories
        $query = "SELECT * FROM tarif";
        $stmt = $pdo->prepare($query);
        
        // Exécution de la requête
        $stmt->execute();
        
        // Retourner les résultats sous forme de tableau associatif
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
     // add id prestation car cle étrangère 
// Fonction pour récupérer le plus grand id_prestation et ajouter 1


    // Fonction pour mettre à jour un tarif
    public function updateTarif($idPrestation, $idCategorie, $nomTarif) {
        // Connexion à la base de données
        $pdo = Database::getConnection();   
        // Préparer la requête SQL pour mettre à jour le tarif
        $query = "UPDATE tarif SET prix = :nomTarif WHERE id_prestation = :idPrestation,id_categorie = :idCategorie";
        
        // Exécuter la requête préparée
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':idPrestation', $idPrestation);
        $stmt->bindParam(':idCategorie', $idCategorie);
        $stmt->bindParam(':nomTarif', $nomTarif);

        // Exécuter la mise à jour
        $stmt->execute();
    }

function addTarif($idPrestation, $idCategorie, $idTarif) {
    $pdo = Database::getConnection();   
    // Requête pour insérer les valeurs dans la table tarif
    $query = "INSERT INTO tarif (id_prestation, id_categorie, prix) VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($query);

    // Exécution de la requête
    $stmt->execute([$idPrestation, $idCategorie, $idTarif]);

    header('Location: adminTarif.php');
    exit();
}


public function deleteTarif($idPrestation, $idCategorie) {
    // Connexion à la base de données
    $pdo = Database::getConnection();
    
    // Requête pour supprimer le tarif correspondant
    $query = "DELETE FROM tarif WHERE id_prestation = ? AND id_categorie = ?";
    
    // Préparer et exécuter la requête
    $stmt = $pdo->prepare($query);
    $stmt->execute([$idPrestation, $idCategorie]);
    header('Location: adminTarif.php');
    exit();
}

    
    
     // Méthode pour récupérer une catégorie par son ID
     public function getTarifById($idTarif) {
        $pdo = Database::getConnection();
        $query = "SELECT * FROM Tarif WHERE id_Prestation = ?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$idTarif]);
        
        // Retourner la première ligne (il doit y en avoir une seule)
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
      // affichange table droits 
    // gerer tout ce qui est droit 
    public function getDroits() {
        // Connexion à la base de données
        $pdo = Database::getConnection();
        
        // Préparation de la requête pour récupérer toutes les catégories
        $query = "SELECT * FROM droits";
        $stmt = $pdo->prepare($query);
        
        // Exécution de la requête
        $stmt->execute();
        
        // Retourner les résultats sous forme de tableau associatif
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addDroit($nomDroit) {
        $pdo = Database::getConnection();
        $sql = "INSERT INTO droits (libelle_droits) VALUES (:nomDroit)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['nomDroit' => $nomDroit]); // Utilisation correcte d'un tableau
    }
    
    public function uptDroits($valeurInputDroits, $idDroits) {
        $pdo = Database::getConnection();
    
        // Préparation de la requête pour mettre à jour une catégorie
        $query = "UPDATE droits SET libelle_droits =? WHERE id_droits =?";
    
        try {
            // Préparez la requête
            $stmt = $pdo->prepare($query);
    
            // Liez les paramètres à la requête
            $stmt->execute([$valeurInputDroits, $idDroits]);
    
            if ($stmt->rowCount() > 0) {
                echo "La catégorie a été mise à jour avec succès.";
            } else {
                echo "Aucune modification effectuée. Peut-être que l'ID n'existe pas ou les données sont les mêmes.";
            }
        } catch (PDOException $e) {
            echo "Erreur lors de la mise à jour : " . $e->getMessage();
        }
    }

    public function deleteDroit($idDroit) {
        // Connexion à la base de données
        $pdo = Database::getConnection();
        
        // Préparation de la requête de suppression
        $query = "DELETE FROM droits WHERE id_droits = ?";
        $stmt = $pdo->prepare($query);
        
        // Exécution de la requête avec l'ID de la catégorie à supprimer
        $stmt->execute([$idDroit]);
    }
     // Méthode pour récupérer une catégorie par son ID
     public function getDroitById($idDroit) {
        $pdo = Database::getConnection();
        $query = "SELECT * FROM categorie WHERE id_droits = ?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$idDroit]);
        
        // Retourner la première ligne (il doit y en avoir une seule)
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function getUsers() {
        // Connexion à la base de données
        $pdo = Database::getConnection();
        
        // Préparation de la requête pour récupérer toutes les catégories
        $query = "SELECT * FROM users";
        $stmt = $pdo->prepare($query);
        
        // Exécution de la requête
        $stmt->execute();
        
        // Retourner les résultats sous forme de tableau associatif
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

// foncrion pourn users 
public function uptUsers($inputUsersNom, $inputUsersPrenom,$inputUsersMail,$inputUsersMdp,$inputUsersDroits) {
    $pdo = Database::getConnection();

    // Préparation de la requête pour mettre à jour une catégori
    $query = "UPDATE users SET nom ='?', prenom ='?', mail ='?', password ='?', droits ='?' WHERE id_users ='?'";

    try {
        // Préparez la requête
        $stmt = $pdo->prepare($query);

        // Liez les paramètres à la requête
        $stmt->execute([$inputUsersNom, $inputUsersPrenom,$inputUsersMail,$inputUsersMdp,$inputUsersDroits]);

        if ($stmt->rowCount() > 0) {
            echo "La catégorie a été mise à jour avec succès.";
        } else {
            echo "Aucune modification effectuée. Peut-être que l'ID n'existe pas ou les données sont les mêmes.";
        }
    } catch (PDOException $e) {
        echo "Erreur lors de la mise à jour : " . $e->getMessage();
    }
}
    public function deleteUsers($idUsers) {
        // Connexion à la base de données
        $pdo = Database::getConnection();
        
        // Préparation de la requête de suppression
        $query = "DELETE FROM users WHERE id_users = ?";
        $stmt = $pdo->prepare($query);
        
        // Exécution de la requête avec l'ID de la catégorie à supprimer
        $stmt->execute([$idUsers]);
    }
     // Méthode pour récupérer une catégorie par son ID
     public function getUsersById($idUsers) {
        $pdo = Database::getConnection();
        $query = "SELECT * FROM users WHERE id_users = ?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$idUsers]);
        
        // Retourner la première ligne (il doit y en avoir une seule)
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}

?> 