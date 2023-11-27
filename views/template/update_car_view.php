<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mettre à jour une voiture</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+XTmZ6p5Iz6p5Iz6p5Iz6p5Iz6p5Iz6p5Iz6p5Iz6p5Iz6p5Iz6" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Mettre à jour une voiture</h1>
        <form action="update_car.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="car_id" value="<?php echo $car['id_voiture']; ?>">
            
            <!-- Afficher les données de la voiture à mettre à jour -->
            <div class="mb-3">
                <label for="nom" class="form-label">Nom :</label>
                <input type="text" name="nom" class="form-control" value="<?php echo $car['nom']; ?>" required>
            </div>
            
            <div class="mb-3">
                <label for="nbr_place" class="form-label">Nombre de places :</label>
                <input type="number" name="nbr_place" class="form-control" value="<?php echo $car['nbr_place']; ?>" required>
            </div>
            
            <!-- Ajouter d'autres champs de mise à jour ici -->
            
            <div class="mb-3">
                <label for="media" class="form-label">Nouveaux médias :</label>
                <input type="file" name="media[]" class="form-control" multiple accept="image/*,video/*">
            </div>
            
            <button type="submit" class="btn btn-primary">Mettre à jour la voiture</button>
        </form>
    </div>
</body>
</html>
