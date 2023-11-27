<?php 
if(session_status() == PHP_SESSION_NONE){
session_start();

}

require_once __DIR__ . '/../controllers/VilleController.php';


$controller = new \Controllers\VilleController();

$controller->DisplayVoituresByVille($id_ville="");