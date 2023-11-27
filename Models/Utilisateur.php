<?php

namespace Models;

require_once __DIR__ . '/../Models/Utilisateur.php';
require_once __DIR__ . '/../libraries/database.php';



class Utilisateur {

    protected $pdo;
    private $id;
    private $nom;
    private $prenom;
    private $email;
    private $mdp;
    private $telephone;
    private $date_naissance;
    private $date_permis;

    public function __construct()
    {
        $this->pdo = \Database::getPdo();
    }


    public function nouveau($nom, $prenom, $email, $mdp, $telephone, $date_naissance, $date_permis) {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->mdp = password_hash($mdp, PASSWORD_DEFAULT); // Hasher le mot de passe
        $this->telephone = $telephone;
        $this->date_naissance = $date_naissance;
        $this->date_permis = $date_permis;

        return $this; // Retourne l'objet utilisateur actuel
    }

    // Getter et setter pour les propriétés

    public function getId() {
        return $this->id;
    }

    public function getNom() {
        return $this->nom;
    }

    // ... Les autres getters et setters

    public function save() {
        // Code pour enregistrer l'utilisateur dans la base de données
        $save = $this->pdo->prepare('INSERT INTO UTILISATEUR (nom, prenom, email, mdp, telephone, date_de_naissance, date_permis) 
        VALUES (:nom, :prenom, :email, :mdp, :telephone, :date_de_naissance, :date_permis) ');
        $save->execute(['nom'=>$this->nom,
                        'prenom'=>$this->prenom,
                        'email'=> $this->email,
                        'mdp'=> $this->mdp,
                        'telephone'=> $this->telephone,
                        'date_de_naissance'=> $this->date_naissance,
                        'date_permis'=> $this->date_permis
                         ],);

    }

    public function connexion($email, $motDePasse){

        $query = $this->pdo->prepare("SELECT * FROM UTILISATEUR WHERE email = :email");
        $query->execute(['email' => $email]);
        $userData = $query->fetch();
        
        if ($userData) {
            // Vérifier le mot de passe
            if (password_verify($motDePasse, $userData['mdp'])) {
                
                $_SESSION = ['id_utilisateur' => $userData['id_utilisateur'], 
                'nom' => $userData['nom'],
                'prenom' => $userData['prenom'],
                'mdp' => $userData['mdp'],
                'telephone' => $userData['telephone'],
                'email' => $userData['email'],
                'date_de_naissance' => $userData['date_de_naissance'],
                'date_permis' => $userData['date_permis'],
             ];

                return $_SESSION;
            } else {
                // Mot de passe incorrect
                return null;
            }
        } else {
            // Aucun utilisateur trouvé avec cet e-mail
            return null;
        }
    }


}
