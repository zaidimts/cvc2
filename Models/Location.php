<?php 

namespace Models;

require_once __DIR__ . '/../libraries/database.php';

class Location {
    private $pdo;
    
    public function __construct()
    {
        $this->pdo = \Database::getPdo();
    }

    public function condition($id_voiture){
        $requete = $this->pdo->prepare('SELECT * FROM conditions WHERE id_voiture = :id_voiture');
        $requete->execute(['id_voiture' => $id_voiture]);
        $conditions  = $requete->fetch();
        return $conditions; 
    }

    public function locationParVoiture($id_voiture){
        $requete = $this->pdo->prepare('SELECT id_voiture, DATE_FORMAT(debut, "%d/%m/%Y") AS debut, DATE_FORMAT(fin, "%d/%m/%Y ") AS fin FROM location WHERE id_voiture = :id_voiture');
        $requete->execute(['id_voiture' => $id_voiture]);
        $location  = $requete->fetchAll();
        return $location; 
    }

    public function validateDates($debut, $fin) {
        $dateDebut = new \DateTime($debut);
        $dateFin = new \DateTime($fin);
    
        return ($dateDebut <= $dateFin);
    }


    public function getPrixBaseVoiture($id_voiture) {
        $query = "SELECT prix FROM voiture WHERE id_voiture = :id_voiture";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([':id_voiture' => $id_voiture]);
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $result['prix'];
    }

    public function etatLocation($id_voiture, $debut, $fin) {
        $query = "SELECT * FROM location WHERE id_voiture = :id_voiture AND (:debut BETWEEN debut AND fin OR :fin BETWEEN debut AND fin)";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([':id_voiture' => $id_voiture, ':debut' => $debut, ':fin' => $fin]);
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $result;
    }
    

    public function createLocation($debut, $fin, $id_voiture, $id_utilisateur, &$errorMessage) {

        if(!isset($_SESSION['id_utilisateur'])){
            $errorMessage = "vous devez etre connecter pour louer une voiture";
            return false;
        }

        if($this->etatLocation($id_voiture, $debut, $fin)){
            $errorMessage = "Y'a déja des locations pour cet voiture pris a cet date";
            return false;
        }
        // Récupérer les conditions de location
        $conditions = $this->condition($id_voiture);

         $dateNaissance = $_SESSION['date_de_naissance'];
         $aujourdhui = date("Y-m-d");
         $diff = date_diff(date_create($dateNaissance), date_create($aujourdhui));
         $age = $diff->format('%y');
  

        // Vérifier si l'utilisateur remplit les conditions requises
        if ($age < $conditions['age']) {
            $errorMessage = "Vous ne remplissez pas la condition d'âge minimale de {$conditions['age']} ans.";
            return false;
        }

         $dateDatePermis = $_SESSION['date_permis'];
         $aujourdhui = date("Y-m-d");
         $diff = date_diff(date_create($dateDatePermis), date_create($aujourdhui));
         $duree_permis = $diff->format('%y');

        if ($duree_permis < $conditions['duree_permis']) {
            $errorMessage = "Vous ne remplissez pas la conditions de durée minimale du permis de {$conditions['duree_permis']} ans.";
            return false;
        }

        // Obtenir la date actuelle
        $dateActuelle = date('Y-m-d');

        // Vérifier si la date de début est déjà passée
        if ($debut < $dateActuelle) {
            $errorMessage = "La date de début de location ne peut pas être dans le passé.";
            return false;
        }

        if (!$this->validateDates($debut, $fin)) {
            $errorMessage = "La date de fin ne peut pas être antérieure à la date de début.";
            return false;
        }

        // Vérifier si la location dépasse 7 jours
        $dateDebut = new \DateTime($debut);
        $dateFin = new \DateTime($fin);
        $interval = $dateDebut->diff($dateFin);
        $nombreJours = $interval->days;

        if ($nombreJours > 7) {
            $errorMessage = "La location ne peut pas dépasser 7 jours.";
            return false;
        }

        // Obtenir le prix de base de la voiture depuis la base de données
        $prixBase = $this->getPrixBaseVoiture($id_voiture);

        // Calculer le tarif en fonction du nombre de jours
        $tarif = $prixBase * $nombreJours;

        // Insérer la location dans la base de données
        $query = "INSERT INTO location (debut, fin, km, tarif, etat, id_voiture, id_utilisateur) 
                  VALUES (:debut, :fin, 0, :tarif, 'En cours', :id_voiture, :id_utilisateur)";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([
            ':debut' => $debut,
            ':fin' => $fin,
            ':tarif' => $tarif,
            ':id_voiture' => $id_voiture,
            ':id_utilisateur' => $id_utilisateur
        ]);

        return $tarif;
    }

    /*public function getPrixBaseVoiture($id_voiture) {
        $query = "SELECT prix FROM voiture WHERE id_voiture = :id_voiture";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([':id_voiture' => $id_voiture]);
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $result['prix'];
    }*/
}
