<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Connexion</title>
</head>

<?php /*require_once('header.php')*/ ?>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Connexion</div>
                    <?php if (isset($messageErreur)) { ?>
                         <p style="color: red;"><?php echo $messageErreur; ?></p>
                                <?php } ?>
                    <?php if (isset($messageSucces)) { ?>
                    <p style="color: red;"><?php echo $messageSucces; ?></p>
                        <?php } ?>

                    <div class="card-body">
                    <form method="POST" action="/views/connect.php">
                            <div class="form-group">
                                <label for="email">Adresse e-mail</label>
                                <input type="email" name ="email" class="form-control" id="email" placeholder="Entrez votre adresse e-mail">
                            </div>
                            <div class="form-group">
                                <label for="password">Mot de passe</label>
                                <input type="password" name="mdp" class="form-control" id="password" placeholder="Entrez votre mot de passe">
                            </div>
                            <button type="submit" class="btn btn-primary">Connexion</button>
                        </form>
                    </div>
                    <div class="card-footer">
                        <p class="mb-0">Pas encore inscrit ? <a href="/views/inscrit.php">Inscrivez-vous</a></p>
                        <p class="mb-0"><a href="motdepasseoublie.html">Mot de passe oublié ?</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

