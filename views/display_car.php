<?php

require_once __DIR__ . '/../controllers/CrudVoiture.php';


$controller = new \Controllers\CarController();

$controller->displayCars();