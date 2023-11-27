<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mettre à jour le prix d'une voiture</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Mettre à jour le prix d'une voiture</h1>
        <div class="card">
            <div class="card-body">
                <form action="/views/update_car_prix.php" method="post">
                    <input type="hidden" name="car_id" value="<?php echo $car['id_voiture']; ?>">
                    
                    <p class="mb-3">Vous mettez à jour le prix de la voiture :</p>
                    <h2><?php echo $car['nom']; ?></h2>
                    
                    <div class="mb-3">
                        <label for="new_price" class="form-label">Nouveau prix :</label>
                        <input type="number" name="new_price" class="form-control" value="<?php echo $car['prix']; ?>" required>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Mettre à jour le prix</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
