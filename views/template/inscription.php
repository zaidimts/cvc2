<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Inscription</title>
</head>

<?php /*require_once('header.php')*/ ?>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Inscription</div>

                    <?php if (isset($messageErreur)) { ?>
                    <p style="color: red;"><?php echo $messageErreur; ?></p>
                    <?php } ?>
                    
                    <div class="card-body">
                        <form method="post" action="inscrit.php">
                            <div class="form-group">
                                <label for="nom">Nom</label>
                                <input type="text" name="nom" class="form-control" id="nom" placeholder="Entrez votre nom">
                            </div>
                            <div class="form-group">
                                <label for="prenom">Prénom</label>
                                <input type="text" name="prenom" class="form-control" id="prenom" placeholder="Entrez votre prénom">
                            </div>
                            <div class="form-group">
                                <label for="email">Adresse e-mail</label>
                                <input type="email" name="email" class="form-control" id="email" placeholder="Entrez votre adresse e-mail">
                            </div>
                            <div class="form-group">
                                <label for="telephone">Numéro de téléphone</label>
                                <input type="text" name="telephone" class="form-control" id="telephone" placeholder="Entrez votre numéro de téléphone">
                            </div>
                            <div class="form-group">
                                <label for="mdp">Mot de passe</label>
                                <input type="password" name="mdp" class="form-control" id="mdp" placeholder="Entrez votre mot de passe">
                            </div>
                            <div class="form-group">
                                <label for="mdp_confirmation">Confirmation du mot de passe</label>
                                <input type="password" name="mdp_confirmation" class="form-control" id="mdp_confirmation" placeholder="Confirmez votre mot de passe">
                            </div>
                            <div class="form-group">
                                <label for="date_naissance">Date de naissance</label>
                                <input type="date" name="date_naissance" class="form-control" id="date_naissance">
                            </div>
                            <div class="form-group">
                                <label for="date_permis">Date du permis de conduire</label>
                                <input type="date" name="date_permis" class="form-control" id="date_permis">
                            </div>
                            <button type="submit" class="btn btn-primary">S'inscrire</button>
                        </form>
                    </div>
                    <div class="card-footer">
                        <p class="mb-0">Déjà inscrit ? <a href="/views/connect.php">Connectez-vous</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
