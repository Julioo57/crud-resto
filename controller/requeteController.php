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
    
}

?> 