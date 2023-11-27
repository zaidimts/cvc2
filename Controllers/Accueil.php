<?php

namespace Controllers;

require_once __DIR__ . '/../Models/Marque.php';

class Accueil {

    public function index()
    {   
        $afficher =  new \Models\Marque();
        $afficherArray = $afficher->afficher();

        var_dump($afficherArray);
        include('views/template/header.php');
        include('views/template/accueil.php');
    }
    
}
