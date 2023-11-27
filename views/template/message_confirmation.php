<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation de location</title>
    <!-- Ajout de Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="display-4">Confirmation de location</h1>
        <div class="alert alert-success" role="alert">
            <?php echo $message; ?>
        </div>
        <p>Voiture louée : <strong><?php echo $_POST['nom_voiture'] ?></strong></p>
        <p>Temps de location : du <strong><?php echo $_POST['debut']; ?></strong> au <strong><?php echo $_POST['fin']; ?></strong></p>
        <p>Prix de la location : <strong><?php echo $result; ?> €</strong></p>
        <p>Un email de confirmation avec la facture a été envoyé à <strong><?php echo $_SESSION['email']; ?></strong></p>
    </div>
    <!-- Ajout de Bootstrap JS (optionnel, si nécessaire) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
