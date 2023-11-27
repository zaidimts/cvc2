<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de location</title>
    <!-- Liens vers les fichiers CSS de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Formulaire de location de voiture</h1>
        
        <!-- Informations sur la voiture concernée -->
        <div class="alert alert-info" role="alert">
            Il faut avoir au moins <?php echo htmlspecialchars($condition['age']) ?> ans et le permis depuis au moins  <?php echo htmlspecialchars($condition['duree_permis']) ?> an(s) pour cette voiture.
        </div>

        <div class="card mb-4">
            <div class="card-body">
                <h2 class="card-title">Voiture : <?php echo $_GET['nom'] ?></h2>
            </div>
        </div>

        <form action="louer.php" method="POST">
            <div class="mb-3">
                <label for="debut" class="form-label">Date de début de location :</label>
                <input type="date" class="form-control" name="debut" id="debut" required>
            </div>

            <div class="mb-3">
                <label for="fin" class="form-label">Date de fin de location :</label>
                <input type="date" class="form-control" name="fin" id="fin" required>
            </div>

            <!-- Champ caché pour l'ID de la voiture -->
            <input type="hidden" name="id_voiture" value="<?= $_GET['id_voiture'] ?>">
            <input type="hidden" name="nom_voiture" value="<?= $_GET['nom'] ?>">
            
            <button type="submit" class="btn btn-primary">Louer</button>
        </form>
    </div>

    <div class="container mt-4">
        <?php if(empty($location)) : ?>
            <h2>Aucune reservation pour l'instant</h2>
            <?php else : ?>
        <h2>Dates déjà réservées pour cette voiture :</h2>
           <?php endif; ?>
        <ul class="list-group">
            <?php foreach ($location as $loc) : ?>
            <li class="list-group-item">Du <?php echo $loc['debut'] ?> au <?php echo $loc['fin'] ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
    
    <!-- Liens vers les fichiers JavaScript de Bootstrap (facultatif) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
</body>
</html>
