<?php

if(session_status() == PHP_SESSION_NONE){
session_start();

}

require_once 'controllers/Accueil.php';


$controller = new \Controllers\Accueil();

$controller->index();