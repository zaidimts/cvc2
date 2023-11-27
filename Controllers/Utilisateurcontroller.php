<?php

namespace Controllers;

use Models\Utilisateur;

require_once __DIR__ . '/../Models/Utilisateur.php';
require_once __DIR__ . '/../Models/Marque.php';
require_once __DIR__ . '/Controller.php';



class UtilisateurController extends Controller {

    public function index()
    {
        //$afficher =  new \Models\Marque();
        //$afficherArray = $afficher->afficher();
        //var_dump($afficherArray);
        //header('Location: views/template/accueil.php');
        include('views/template/accueil.php');
    }

    public function inscription() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // Récupérer les données du formulaire
            $nom = $_POST['nom']; 
            $prenom = $_POST['prenom'];
            $email = $_POST['email'];
            $mdp = $_POST['mdp'];
            $mdp_confirmation = $_POST['mdp_confirmation'];
            $telephone = $_POST['telephone'];
            $date_naissance = $_POST['date_naissance'];
            $date_permis = $_POST['date_permis'];

            // Vérifier si les mots de passe correspondent
            if ($mdp === $mdp_confirmation) {

                if (filter_var($email, FILTER_VALIDATE_EMAIL)){
                // Créer un nouvel utilisateur
                
                $utilisateur = new \Models\Utilisateur();
                $nouvelUtilisateur = $utilisateur->nouveau($nom,$prenom,$email,$mdp,$telephone,$date_naissance,$date_permis);

                // Enregistrer l'utilisateur dans la base de données
                $nouvelUtilisateur->save();

                // Rediriger l'utilisateur vers une page de succès ou de connexion
                header('Location: connect.php');
                $messageSucces = "Inscription effectué !";
                exit;

            } else {
                $messageErreur = "Renseignez un email correct !";
            }
            
            } else {
                // Afficher un message d'erreur si les mots de passe ne correspondent pas
                $messageErreur = "Les mots de passes doivent correspondre";
            }
        }

        // Afficher le formulaire d'inscription
        include('template/inscription.php');
    }

    public function connexion() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $mdp = $_POST['mdp'];
    
            // Créez une instance de la classe Utilisateur
            $utilisateur = new \Models\Utilisateur();
    
            // Utilisez la méthode connexion pour tenter la connexion
            $utilisateurConnecte = $utilisateur->connexion($email, $mdp);
    
            if ($utilisateurConnecte) {
                session_start();
                // Connexion réussie
                // Vous pouvez rediriger l'utilisateur vers une page d'accueil sécurisée
                // Connexion réussie
            // Stockez le nom de l'utilisateur dans la session
                
                $_SESSION = $utilisateurConnecte;  
                header('Location: /index.php');
                exit;
            } else {
                // Informations de connexion incorrectes
                $messageErreur = "Informations de connexion incorrectes.";
            }
        }
    
        // Afficher le formulaire de connexion en cas d'échec ou lors de l'accès initial à la page
        include('template/connexion.php');
    }
    


    
}
