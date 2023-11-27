<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Style pour les liens */
        a.card-link {
            text-decoration: none; /* Supprime le soulignement du lien */
            color: inherit; /* Utilise la couleur du texte par défaut */
        }

        /* Style pour les cartes */
        .card-wrapper {
            transition: transform 0.2s; /* Ajoute une transition au survol */
        }

        .card-wrapper:hover {
            transform: scale(1.05); /* Grossit au survol */
        }

        /* Définition de la classe card-img-fixed pour spécifier la taille des images */
        .card-img-fixed {
            width: 100%; /* Ajustez la taille en fonction de vos besoins */
            height: 200px; /* Hauteur fixe pour les cartes, ajustez selon vos besoins */
            object-fit: cover; /* Assure que l'image remplit l'espace sans déformer */
        }
    </style>
    <title>Accueil</title>
</head>
<body class="bg-principal c-principal">
    <?php require_once('header.php') ; ?>
    <div class="container mt-5">
        <h2 class="text-center">Voitures disponibles</h2>
        <!-- Filtres -->
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <!-- Filtre par ville -->
                <form action="voitures.php" method="post">
                    <div class="form-group">
                        <label for="ville">Choisissez une ville :</label>
                        <select name="ville" class="form-control">
                            <?php foreach ($afficheVille as $ville) : ?>
                                <option value="<?= $ville['id_ville'] ?>"><?= $ville['nom'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Filtrer</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- Liste des voitures -->
        <div class="row mt-4">
            <?php 
            if(isset($affichevoitureParVille)) 
            {
                $voitures = $affichevoitureParVille;
            }
            else
            {
                $voitures = $affichevoiture;
            }
            foreach ($voitures as $voiture) : ?>
                <div class="col-md-4">
                    <!-- Ajoutez un lien autour de la carte pour rediriger vers la page de la voiture -->
                    <a class="card-link" href="une_voiture.php?id_voiture=<?= $voiture['id_voiture'] ?>">
                        <div class="card-wrapper card mb-4">
                            <img src="../../assets/img/voitures/<?= $voiture['url'] ?>" class="card-img-top card-img-fixed" alt="<?= $voiture['nom'] ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?= $voiture['nom'] ?></h5>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><strong>Nombre de places:</strong> <?= $voiture['nbr_place'] ?></li>
                                    <li class="list-group-item"><strong>Puissance:</strong> <?= $voiture['puissance'] ?></li>
                                    <li class="list-group-item"><strong>Transmission:</strong> <?= $voiture['transmission'] ?></li>
                                    <li class="list-group-item"><strong>Vitesse maximale:</strong> <?= $voiture['vitesse_max'] ?></li>
                                </ul>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="text-center">
        <a class="btn btn-primary" href="voitures.php">Retour au formulaire</a>
    </div>
</body>

    <?php require_once('footer.php') ; ?>

