<?php

namespace Models;

require_once __DIR__ . '/../libraries/database.php';

class Marque
{
    private $pdo; 

    public $nom;
    public $logo;


    public function __construct()
    {
        $this->pdo = \Database::getPdo();
    }

    public function nouvelle_marque($nom, $logo){

        $this->nom = $nom;
        $this->logo = $logo;

        return $this;
    }

    public function ajouter_marque(){

        $query = $this->pdo->prepare("INSERT INTO marques(nom, logo) VALUES(?, ?)");
        $query->execute(array($this->nom, $this->logo));

    }

    public function afficher(){
        $query = "SELECT * FROM marque";
        $result = $this->pdo->query($query);
        $marque = $result->fetchAll();
        return $marque;
    }


    public function getVoituresBymarque($id_marque) {
        // Récupérez les voitures par ville depuis la base de données
        $query = "SELECT * FROM voiture WHERE id_marque = :id_marque";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute(['id_marque'=>$id_marque]);
        return $stmt->fetchAll();
    }





}
