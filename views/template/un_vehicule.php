
<body class="bg-principal c-principal">

    <main class="mb-5 container-fluid">
        <section>
            <div class="container-fluid p-0">
                <div class="row">
                    <div class="col-12 col-md-6">
                      <div class="content p-5 m-2 lead fs-2 text-center">  <h3 class="text-center pt-2"><?= $voiture['nom'] ?></h3>
                        <p class="p-2 m-2 lead fs-2" >Nombre de places: <?= $voiture['nbr_place'] ?></p>
                        <p class="p-2 m-2 lead fs-2">Puissance: <?= $voiture['puissance'] ?></p>
                        <p class="p-2 m-2 lead fs-2">Transmission: <?= $voiture['transmission'] ?></p>
                        <p class="p-2 m-2 lead fs-2">Vitesse maximale: <?= $voiture['vitesse_max'] ?> km/h</p>
                        <p class="p-2 m-2 lead fs-2">Ville: <?= $voiture['nom_ville'] ?></p>
                      </div>
                         <!-- Ajoutez ici un bouton ou un formulaire pour l'action de location -->
                <p class="text-center"><a href="louer.php?id_voiture=<?= $voiture['id_voiture'] ?>&nom=<?= $voiture['nom'] ?>" class="btn btn-primary">Louer cette voiture</a></p>
              </div>
                    <div class="col-12 col-md-6 grid px-0">
                        <?php var_dump($images); ?>
                        <?php foreach ($images as $image){ 
                            //  /*var_dump($image);*
                            foreach ($image as $item) {
                                var_dump($item);
                                $voitures[] = $item;
                            }
                        } ?>
                        <div class="un">
                            <img src="../../assets/img/voitures/<?= $voitures[0] ?>" alt="<?= $voiture['nom'] ?>" alt="photo d'une voiture" class="h-100 w-100">
                        </div>
                        <div class="deux">
                        <img src="../../assets/img/voitures/<?php if(isset($voitures[1])) : echo $voitures[1]; endif; ?>" alt="<?= $voiture['nom'] ?>" alt="photo d'une voiture" class="h-100 w-100">
                        </div>
                        <div class="trois">
                        <img src="../../assets/img/voitures/<?php if(isset($voitures[2])) : echo $voitures[2]; endif; ?>" alt="photo d'une voiture" class="h-100 w-100">
                        </div>
                        <div class="quatre">
                        <img src="../../assets/img/voitures/<?php if(isset($voitures[3])) : echo $voitures[3]; endif; ?>" alt="photo d'une voiture" class="h-100 w-100">
                        </div>
                        
                    </div>
                </div>
            </div>
        </section>
    </main>
    <div class="text-center">
        <a class="btn btn-primary" href="voitures.php">Retour au formulaire</a>
    </div>
</body>
