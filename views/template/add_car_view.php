<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une voiture</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"></head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Ajouter une voiture</h1>
        <form action="/views/add_car.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="nom" class="form-label">Nom :</label>
                <input type="text" name="nom" class="form-control" required>
            </div>
            
            <div class="mb-3">
                <label for="nbr_place" class="form-label">Nombre de places :</label>
                <input type="number" name="nbr_place" class="form-control" required>
            </div>
            
            <div class="mb-3">
                <label for="puissance" class="form-label">Puissance :</label>
                <input type="text" name="puissance" class="form-control" required>
            </div>
            
            <div class="mb-3">
                <label for="transmission" class="form-label">Transmission :</label>
                <input type="text" name="transmission" class="form-control" required>
            </div>
            
            <div class="mb-3">
                <label for="vitesse_max" class="form-label">Vitesse maximale :</label>
                <input type="number" name="vitesse_max" class="form-control" required>
            </div>
            
            <div class="mb-3">
                <label for="id_marque" class="form-label">Marque :</label>
                <select name="id_marque" class="form-select" required>
                    <?php foreach ($marques as $marque) : ?>
                        <option value="<?php echo $marque['id_marque']; ?>"><?php echo $marque['nom']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            
            <div class="mb-3">
                <label for="prix" class="form-label">Prix :</label>
                <input type="number" name="prix" class="form-control" required>
            </div>
            
            <div class="mb-3">
                <label for="media" class="form-label">Médias :</label>
                <input type="file" name="media[]"  class="form-control" multiple accept="image/*,video/*">
            </div>
            
            <button type="submit" class="btn btn-primary">Ajouter la voiture</button>
        </form>
    </div>

    <!-- Inclure les fichiers JavaScript de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-xY8qUMMzIvqxfIv6LT3aSiJw5r4cg/1uqOJdGABaF4OxArR5tq7vQR5to9T5PY5tK" crossorigin="anonymous"></script>
</body>
</html>
