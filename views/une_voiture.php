
<?php 
if(session_status() == PHP_SESSION_NONE){
session_start();

}

require_once __DIR__ . '/../controllers/VoitureController.php';


$controller = new \Controllers\VoitureController();

$id_voiture = 61;
$controller->Displayvoiture($id_voiture);