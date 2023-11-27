<?php

namespace Models;

require_once __DIR__ . '/../libraries/database.php';

class Ville {
    private $pdo;
    
    public function __construct()
    {
        $this->pdo = \Database::getPdo();
    }
    
    public function getVilles() {
        // Récupérez la liste des villes depuis la base de données
        $query = "SELECT * FROM VILLE";
        $result = $this->pdo->query($query);
        $ville = $result->fetchAll();
        return $ville;
    }
    
    public function getVoituresByVille() {
        // Récupérez les voitures par ville depuis la base de données
        $id_ville = $_POST['ville'];
        $query = "SELECT voiture.*, medias.url, ville.nom AS nom_ville 
                    FROM voiture 
                    JOIN medias ON voiture.id_voiture = medias.id_voiture 
                    JOIN voiture_ville ON voiture.id_voiture = voiture_ville.id_voiture 
                    JOIN ville ON voiture_ville.id_ville = ville.id_ville
                    WHERE ville.id_ville = :id_ville";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute(['id_ville'=>$id_ville]);
        return $stmt->fetchAll();
    }
}
?>
