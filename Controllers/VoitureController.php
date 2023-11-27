<?php

namespace Controllers;

require_once __DIR__ . '/../Models/Voiture.php';

class VoitureController {

    public function Displayvoiture($id_voiture) {
        $voitureModel = new \Models\Voiture();
        if(!isset($_GET['id_voiture'])) : header('Location: page404.php'); endif;
        $id_voiture = $_GET['id_voiture'];
        $voiture = $voitureModel->getOneVoitureById($id_voiture);
        /*var_dump($voiture)*/;
        if (!$voiture) {
            // Gérez le cas où la voiture n'a pas été trouvée, par exemple, affichez un message d'erreur.
            // Vous pouvez rediriger l'utilisateur vers une page d'erreur ou effectuer une autre action appropriée.
            echo "La voiture n'a pas été trouvée.";
            return;
        }

        $images = $voitureModel->image($id_voiture);

        /*var_dump($voiture);*/
        include('template/header.php');
        include('template/un_vehicule.php');
        include('template/footer.php');
    }
}
?>
