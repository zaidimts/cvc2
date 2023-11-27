<?php

namespace Controllers;

require_once __DIR__ . '/../Models/Ville.php';
require_once __DIR__ . '/../Models/Voiture.php';


class VilleController{

    public function Displayville($id_ville){

        $ville = new \Models\Ville();
        $afficheVille = $ville->getVilles();
        if(isset($_POST['ville'])) :
        $affichevoitureParVille = $ville->getVoituresByVille();
        endif;

        $voiture = new \Models\Voiture();
        $affichevoiture = $voiture->getVoiture();
        include('template/vehicules.php'); 

    }


    /*public function DisplayVoituresByVille ($id_ville){

        // Appelez la fonction Displayville pour afficher la ville
      
        $ville = new \Models\Ville();
        $affichevoitureParVille = $ville->getVoituresByVille($id_ville);
        include('vehicules.php'); 

    }*/
    

}
?>
