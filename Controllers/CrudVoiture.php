<?php

namespace Controllers;

require_once __DIR__ . '/../Models/CrudVoitureModel.php';

use Models\CrudVoitureModel;

//if(!isset($_SESSION )|| ($_SESSION['nom'] !== "Azerty")){
 //   header('Location: index.php');
//}

class CarController {

    public function displayCars() {
        // Instanciez le modèle CRUD des voitures
        $carModel = new CrudVoitureModel();
    
        // Récupérez la liste de toutes les voitures
        $cars = $carModel->getAllCars();
    
        // Affichez la vue pour afficher la liste des voitures
        $marques = $carModel->getAllMarques();
        include 'template/display_cars_view.php';
    }
    

    public function addCar() {
        // Vérifiez si le formulaire a été soumis
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérez les données du formulaire
            $carData = [
                'nom' => $_POST['nom'],
                'nbr_place' => $_POST['nbr_place'],
                'puissance' => $_POST['puissance'],
                'transmission' => $_POST['transmission'],
                'vitesse_max' => $_POST['vitesse_max'],
                'id_marque' => $_POST['id_marque'],
                'prix' => $_POST['prix'],
            ];

            // Récupérez les fichiers média téléchargés
            $mediaFiles = $_FILES['media'];; // Assurez-vous que le champ de formulaire a le bon nom

            // Instanciez le modèle CRUD des voitures
            $carModel = new CrudVoitureModel();

            // Récupérez la liste des marques disponibles
            

            // Ajoutez la voiture avec les médias associés
            $result = $carModel->addCar($carData, $mediaFiles);

            if ($result) {
                // Redirigez l'utilisateur vers une page de succès ou affichez un message de succès
                header('Location: display_car.php');
                exit();
            } else {
                // Gérez l'échec de l'ajout de la voiture (par exemple, affichez un message d'erreur)
                echo "Erreur lors de l'ajout de la voiture.";
            }
        }
        $carModel = new CrudVoitureModel();
        $marques = $carModel->getAllMarques();
        // Affichez le formulaire d'ajout de voiture (HTML) ici
        include('template/add_car_view.php');
    }

    public function updateCar() {
        // Vérifiez si le formulaire de mise à jour a été soumis
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérez les données du formulaire
            $carId = $_POST['car_id']; // Assurez-vous que vous avez un champ car_id dans votre formulaire pour identifier la voiture à mettre à jour
            $carData = [
                'nom' => $_POST['nom'],
                'nbr_place' => $_POST['nbr_place'],
                'puissance' => $_POST['puissance'],
                'transmission' => $_POST['transmission'],
                'vitesse_max' => $_POST['vitesse_max'],
                'id_marque' => $_POST['id_marque'],
                'prix' => $_POST['prix'],
            ];

            // Récupérez les fichiers média téléchargés (s'ils existent)
            $mediaFiles = $_FILES['media']; // Assurez-vous que le champ de formulaire a le bon nom

            // Instanciez le modèle CRUD des voitures
            $carModel = new CrudVoitureModel();

            // Mettez à jour la voiture avec les médias associés (si des médias ont été téléchargés)
            $result = $carModel->updateCar($carId, $carData, $mediaFiles);

            if ($result) {
                // Redirigez l'utilisateur vers une page de succès ou affichez un message de succès
                header('Location: template/success.php');
                exit();
            } else {
                // Gérez l'échec de la mise à jour de la voiture (par exemple, affichez un message d'erreur)
                echo "Erreur lors de la mise à jour de la voiture.";
            }
        }

        // Affichez le formulaire de mise à jour de voiture (HTML) ici
        
    }

    public function updatePrixCar() {

        if(!isset($_GET['car_id'])) : header('Location: page404.php'); endif;
         $carId = $_GET['car_id'];

         
        // Vérifiez si le formulaire de mise à jour de prix a été soumis
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérez l'ID de la voiture et le nouveau prix du formulaire
            $carId = $_POST['car_id']; // Assurez-vous que vous avez un champ car_id dans votre formulaire pour identifier la voiture à mettre à jour
            $newPrice = $_POST['new_price'];

            // Instanciez le modèle CRUD des voitures
            $carModel = new CrudVoitureModel();

            // Mettez à jour le prix de la voiture
            $result = $carModel->updatePrixCar($carId, $newPrice);

            if ($result) {

                var_dump($_POST);
                // Redirigez l'utilisateur vers une page de succès ou affichez un message de succès
                header('Location: display_car.php');
                exit();
            } else {
                // Gérez l'échec de la mise à jour du prix de la voiture (par exemple, affichez un message d'erreur)
                echo "Erreur lors de la mise à jour du prix de la voiture.";
            }
        }

        // Affichez le formulaire de mise à jour de prix de voiture (HTML) ici
        $UneVoiture = new CrudVoitureModel();
        $car = $UneVoiture->Display_One_Car($carId);
        include('template/update_price_view.php');
    }


    public function deleteCar() {
        // Vérifiez si une requête de suppression a été soumise (par exemple, via un lien ou un formulaire)
        
            // Récupérez l'ID de la voiture à supprimer
            $carId = $_GET['car_id']; // Assurez-vous que vous avez un champ car_id dans votre formulaire ou URL pour identifier la voiture à supprimer

            // Instanciez le modèle CRUD des voitures
            $carModel = new CrudVoitureModel();

            // Supprimez la voiture et ses médias associés
            $carModel->deleteCar($carId);
            

            // Redirigez l'utilisateur vers une page de succès ou une autre page appropriée après la suppression
            header('Location: template/success.php');
            exit();
        

        // Affichez le formulaire ou l'interface utilisateur pour permettre à l'utilisateur de confirmer la suppression si nécessaire
    }


    // Autres méthodes du contrôleur pour la mise à jour, la suppression, l'affichage des voitures, etc.
}

// Exemple d'utilisation du contrôleur
//$carController = new CarController();
//$carController->addCar();
