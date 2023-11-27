<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Voitures</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Liste des Voitures    <a href="add_car.php "><button class="btn btn-info delete-btn">Ajouter une voiture </button></a><br></h1>
       
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Nombre de Places</th>
                    <th>Puissance</th>
                    <th>Transmission</th>
                    <th>Vitesse Maximale</th>
                    <th>Marque</th>
                    <th>Prix</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cars as $car) : ?>
                    <tr>
                        <td><?php echo $car['id_voiture']; ?></td>
                        <td><?php echo $car['nom']; ?></td>
                        <td><?php echo $car['nbr_place']; ?></td>
                        <td><?php echo $car['puissance']; ?></td>
                        <td><?php echo $car['transmission']; ?></td>
                        <td><?php echo $car['vitesse_max']; ?></td>
                        <td><?php echo $car['id_marque']; ?></td>
                        <td><?php echo $car['prix']; ?></td>
                        <td>
                         <a href ="update_car_prix.php?car_id=<?=  $car['id_voiture']; ?> "><button class="btn btn-primary edit-btn">Modifier le prix</button></a>
                           
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Inclure les fichiers JavaScript de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-xY8qUMMzIvqxfIv6LT3aSiJw5r4cg/1uqOJdGABaF4OxArR5tq7vQR5to9T5PY5tK" crossorigin="anonymous"></script>
</body>
</html>
