<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Erreur de location</title>
    <!-- Ajout de Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa; /* Couleur de fond légèrement gris pour Bootstrap */
        }
        .error-container {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff; /* Fond blanc */
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Ombre légère */
            margin-top: 50px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="error-container">
            <h1 class="display-4">Erreur de location</h1>
            <p class="lead"><?php echo $message; ?></p>
            <p>Motif : <?php echo $errorMessage; ?></p>
            <?php if (!isset($_SESSION["id_utilisateur"])) { ?> 
              <p> <a href="connect.php">Connecte toi par ici</a> </p>
              <p> <a href="inscrit.php">Si t'as pas de compte inscrit toi</a> </p>
         <?php } ?>
            <a class="btn btn-primary" href="javascript:history.back()">Retour au formulaire</a>
        </div>
    </div>
    <!-- Ajout de Bootstrap JS (optionnel, si nécessaire) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
