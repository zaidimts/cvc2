<?php

namespace Models;

require_once __DIR__ . '/../libraries/database.php';

use PDO;

class CrudVoitureModel {
    private $pdo;
    
    public function __construct()
    {
        $this->pdo = \Database::getPdo();
    }

    public function getAllCars() {
        // Récupérer la liste de toutes les voitures depuis la base de données
        $query = "SELECT * FROM voiture";
        $stmt = $this->pdo->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addCar($carData, $mediaFiles) {
        // Insérer une nouvelle voiture dans la base de données
        $query = "INSERT INTO voiture (nom, nbr_place, puissance, transmission, vitesse_max, id_marque, prix)
                  VALUES (:nom, :nbr_place, :puissance, :transmission, :vitesse_max, :id_marque, :prix)";
        $stmt = $this->pdo->prepare($query);

        $stmt->execute([
            'nom' => $carData['nom'],
            'nbr_place' => $carData['nbr_place'],
            'puissance' => $carData['puissance'],
            'transmission' => $carData['transmission'],
            'vitesse_max' => $carData['vitesse_max'],
            'id_marque' => $carData['id_marque'],
            'prix' => $carData['prix']
        ]);

        $carId = $this->pdo->lastInsertId(); // Utilisez lastInsertId() ici

// Vérifie si des fichiers ont été soumis
        if(isset($_FILES['media'])){
            $uploadDir = $_SERVER['DOCUMENT_ROOT'] . "/assets/"; // Répertoire de destination des fichiers
            $media = $_FILES['media']; 

            // Vérifie les erreurs possibles lors de l'upload
            $errors = [];
            foreach($media['error'] as $key => $error){
                if($error != UPLOAD_ERR_OK){
                    $errors[] = "Erreur lors de l'upload du fichier {$media['name'][$key]} : Code d'erreur $error.";
                }
            }

            // Si des erreurs sont survenues, les affiche
            if(!empty($errors)){
                foreach($errors as $error){
                    echo $error . "<br>";
                }
            } else {
                // Parcours les fichiers soumis et les déplace vers le répertoire de destination
                foreach($media['tmp_name'] as $key => $tmpName){
                    $originalFileName = $media['name'][$key];
                    $fileExtension = pathinfo($originalFileName, PATHINFO_EXTENSION);
                    $newFileName = uniqid('file_'.$carId) . '.' . $fileExtension; // Nouveau nom de fichier unique
        
                    $destination = $uploadDir . $newFileName;
        
                    if(move_uploaded_file($tmpName, $destination)){
                        echo "Le fichier {$originalFileName} a été correctement téléchargé et renommé en {$newFileName}.<br>";
                        $stmt = $this->pdo->prepare("INSERT INTO medias (url, id_voiture) VALUES (:url, :id_voiture)");
                        $stmt->execute(['url' => $newFileName, 'id_voiture' => $carId]);
                        
                    } else {
                        echo "Erreur lors du déplacement du fichier {$originalFileName} vers le répertoire de destination.<br>";
                    }
                }
            }
        }


        return true;
    }

    // ... Le reste de votre code
    public function Display_One_Car($id_voiture){
    
        $query = "SELECT * FROM voiture WHERE id_voiture = :id_voiture";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute(['id_voiture' => $id_voiture]);
        $cars = $stmt->fetch(PDO::FETCH_ASSOC);
        return $cars;
        
        
    }
 


    public function updateCar($carId, $carData, $mediaFiles) {
        // Mettre à jour les caractéristiques de la voiture dans la base de données
        $query = "UPDATE voiture
                  SET nom = :nom, nbr_place = :nbr_place, puissance = :puissance, transmission = :transmission, vitesse_max = :vitesse_max, id_marque = :id_marque, prix = :prix
                  WHERE id_voiture = :id_voiture";
    
        $stmt = $this->pdo->prepare($query);
    
        $stmt->execute([
            'nom' => $carData['nom'],
            'nbr_place' => $carData['nbr_place'],
            'puissance' => $carData['puissance'],
            'transmission' => $carData['transmission'],
            'vitesse_max' => $carData['vitesse_max'],
            'id_marque' => $carData['id_marque'],
            'prix' => $carData['prix'],
            'id_voiture' => $carId
        ]);
    
        // Enregistrer les médias associés à la voiture (écrase l'ancien)
        $mediaUrls = $this->uploadMedia($mediaFiles, $carId);
        foreach ($mediaUrls as $mediaUrl) {
            $this->saveMediaUrl($carId, $mediaUrl);
        }
    
        return true;
    }
    
    public function updatePrixCar($carId, $newPrice) {
        // Mettre à jour le prix de la voiture dans la base de données
        $query = "UPDATE voiture
                  SET prix = :prix
                  WHERE id_voiture = :id_voiture";
    
        $stmt = $this->pdo->prepare($query);
    
        $stmt->execute(['prix' => $newPrice, 'id_voiture' => $carId]);
    
        return true;
    }
    
    public function deleteCar($carId) {
        // Supprimer une voiture de la base de données
        $query = "DELETE FROM voiture WHERE id_voiture = :id_voiture";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute(['id_voiture' => $carId]);
    
        // Supprimer les médias associés à la voiture (s'il y en a)
        $this->deleteMediaByCarId($carId);
    }
    
    private function deleteMediaByCarId($carId) {
        // Supprimer les médias associés à une voiture de la table "medias"
        $query = "DELETE FROM medias WHERE id_voiture = :id_voiture";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute(['id_voiture' => $carId]);
    }

    public function getAllMarques() {
        // Récupérer la liste des marques depuis la base de données
        $query = "SELECT id_marque, nom FROM marque";
        $stmt = $this->pdo->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    
}
?>
