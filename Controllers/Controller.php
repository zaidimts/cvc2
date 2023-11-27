<?php

// Définition de l'espace de noms (namespace) pour la classe Controller.
namespace Controllers;

// Déclaration de la classe abstraite Controller.
abstract class Controller {

    // Propriété protégée pour stocker une instance du modèle associé.
    //protected $model;

    // Propriété protégée pour stocker le nom de la classe du modèle associé (à définir dans les classes dérivées).
    //protected $modelName;

    // Constructeur de la classe Controller.
    //public function __construct() {
        // Création d'une instance du modèle associé en utilisant le nom de classe spécifié dans $modelName.
        //$this->model = new $this->modelName();

       
        

    

    public function __construct()
    { 
// Démarrez la session avant tout affichage de contenu
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $afficher =  new \Models\Marque();
        $afficherArray = $afficher->afficher();
        var_dump($afficherArray);
        //header('Location: views/template/accueil.php');
        include('../views/template/header.php');
    }


 }
    



?>