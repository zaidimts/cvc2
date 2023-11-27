<?php
namespace Controllers;

session_start();
require_once __DIR__ . '/../Models/Location.php'; 

use Models\Location;

class LocationController {
    public function louerVoiture() {
        /*var_dump($_SESSION);*/
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {


            $id_voiture = $_POST['id_voiture']; 
            $locationModel = new Location();
            $errorMessage = "";
    
            // Appel de la fonction createLocation pour créer une location
            $result = $locationModel->createLocation(
                $_POST['debut'],
                $_POST['fin'],
                $id_voiture,
                $_SESSION['id_utilisateur'], // Supposons que vous avez un utilisateur connecté
                $errorMessage
            );

            if ($result !== false) {
                // Location réussie, afficher un message de confirmation
                $message = "location reussie";
                include('template/message_confirmation.php');
            } else {
                // Afficher un message d'erreur avec la raison spécifique
                $message = "La location n'a pas pu être effectuée. Raison : $errorMessage";
                include('template/message_erreur.php');
            }
        } else {
            $locationModel = new Location();
            include('template/header.php');
            
            if(!isset($_GET['id_voiture'])) : header('Location: page404.php'); endif;
            $condition = $locationModel->condition($_GET['id_voiture']);
            $location = $locationModel->locationParVoiture($_GET['id_voiture']);
            
            // Afficher le formulaire de location
            include('template/formulaire_location.php');
        }
    }
}
