<?php

namespace Models;

require_once __DIR__ . '/../libraries/database.php';

class Voiture {

    private $pdo;
    
    public $nom;
    public $nbr_place;
    public $puissance;
    public $transmission;
    public $vitesse_max;
    public $id_marque;
    public $prix;
    
    public function __construct()
    {
        $this->pdo = \Database::getPdo();
    }

    
    /*public function getVoiture() {
        // Récupérez la liste des voiture depuis la base de données
        $query = "SELECT * FROM VOITURE";
        $result = $this->pdo->query($query);
        $voiture = $result->fetchAll();
        return $voiture;
    }*/

    public function getVoiture() {
        // Récupérez une seule voiture par son ID depuis la base de données
        $query = "SELECT voiture.*, medias.url, ville.nom AS nom_ville 
        FROM voiture 
        JOIN (
            SELECT id_voiture, MIN(url) AS url
            FROM medias
            GROUP BY id_voiture
        ) AS medias ON voiture.id_voiture = medias.id_voiture 
        JOIN voiture_ville ON voiture.id_voiture = voiture_ville.id_voiture 
        JOIN ville ON voiture_ville.id_ville = ville.id_ville;
        ";
        $stmt = $this->pdo->query($query);
        return $stmt;
    }

    /*public function getVoiture() {    CODE SANS LE MIN 
        // Récupérez une seule voiture par son ID depuis la base de données
        $query = "SELECT DISTINCT voiture.*, medias.url, ville.nom AS nom_ville 
                FROM voiture 
                JOIN medias ON voiture.id_voiture = medias.id_voiture 
                JOIN voiture_ville ON voiture.id_voiture = voiture_ville.id_voiture 
                JOIN ville ON voiture_ville.id_ville = ville.id_ville;";
        $stmt = $this->pdo->query($query);
        return $stmt;
    }*/
    
    /*public function getOneVoituresByVille($id_voiture) {
        // Récupérez les voitures par ville depuis la base de données
        $id_voiture = 61;
        $query = "SELECT voiture.*, medias.url 
                    FROM voiture 
                    JOIN medias ON voiture.id_voiture = medias.id_voiture";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute(['id_voiture'=>$id_voiture]);
        return $stmt->fetchAll();
    }*/

    public function getOneVoitureById($id_voiture) {
        // Récupérez une seule voiture par son ID depuis la base de données
        $query = "SELECT voiture.*, medias.url, ville.nom AS nom_ville 
                    FROM voiture 
                    JOIN medias ON voiture.id_voiture = medias.id_voiture 
                    JOIN voiture_ville ON voiture.id_voiture = voiture_ville.id_voiture 
                    JOIN ville ON voiture_ville.id_ville = ville.id_ville
                    WHERE voiture.id_voiture = :id_voiture";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([':id_voiture' => $id_voiture]);
        return $stmt->fetch();
    }

    public function Image($id_voiture) {
        // Récupérez les images d'une seule voiture
        $query = "SELECT url
                    FROM medias
                    WHERE id_voiture = :id_voiture";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([':id_voiture' => $id_voiture]);
        return $stmt->fetchAll();
    }

/*SELECT marque.nom as marque, voiture.nom as voiture 
FROM marque JOIN voiture ON marque.id_marque = voiture.id_marque;*/

    
}
?>
