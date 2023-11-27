<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/style.css" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM"
      crossorigin="anonymous"
    />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>CVC</title>
</head>
<style>
#menu {
  position: fixed;
  top: 0;
  right: -250px; /* pour cacher le menu initialement */
  width: 250px;
  height: 100%;
  background-color: #001d66;
  transition: left 0.3s ease;
  z-index: 999; /* Z-index plus élevé pour afficher le menu au-dessus des autres éléments */
}
.hidden {
  display: none;
}

#menu2 {
  position: fixed;
  top: 0;
  right: -250px; /* pour cacher le menu initialement */
  width: 250px;
  height: 100%;
  background-color: #001d66;
  transition: left 0.3s ease;
  z-index: 999; /* Z-index plus élevé pour afficher le menu au-dessus des autres éléments */
}

#menu ul li {
  margin-top: 30px;
  padding: 20px;
  list-style-type: none;
}

.closeButton {
    position: absolute;
    top: 10px;
    right: 10px;
    cursor: pointer;
    font-size: 20px;
}

/* Pour donner un aspect visuel */
.closeButton:hover {
    color: red; /* Tu peux choisir une autre couleur si tu préfères */
}

</style>
<header class="bg-secondaire">
 <nav class="navbar navbar-expand-lg bg-secondaire c-principal py-4">
       <a class="navbar-brand px-5" href="/index.php"
          ><img src="/assets/img/logo_1.png" height="70px" alt="logo du site"
        /></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <?php /*var_dump($_SESSION);*/ ?>
        <div class="collapse navbar-collapse" id="navbarNav">
         <ul class="navbar-nav m-0">
                <li class="nav-item px-5 active">
                    <a id="menuButton" class="nav-link" href="#">MODELE</a>
                </li>
                <li class="nav-item px-5">
                    <a class="nav-link" href="/views/voitures.php">NOS VOITURES</a>
                </li>
                <li class="nav-item px-5">
                    <a class="nav-link" href="#">CONTACT</a>
                </li>
                <?php if(!empty($_SESSION)) : ?>
                <li class="nav-item px-5">
                    <a class="nav-link" href="/views/deconnexion.php">DECONNEXION</a>
                </li>
                <?php else : ?>
                <li class="nav-item px-5">
                    <a class="nav-link" href="/views/connect.php">CONNEXION</a>
                </li>
                <?php endif; ?>
                    <?php if(isset($_SESSION['id_utilisateur'])&&($_SESSION['nom'] == "Azerty")) :?>
                    <li class="nav-item">
                    <a class="nav-link" href="/views/display_car.php">Administartion</a>
                    </li>
                <?php endif; ?>
            </ul>
            <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2 rounded" type="search" placeholder="Search" aria-label="Search">
    </form>
        </div>
    </nav>
 </header>
 <div id="menu" class="hidden">
    <!-- Contenu de votre premier menu -->
    <ul>
        <?php foreach($afficherArray as $index => $afficher) { ?>
            <li><a href="#" class="menuButton2" data-menuid="<?= $afficher['id_marque']; ?>"><?= $afficher['nom']; ?></a></li>
        <?php } ?> 
    </ul>
        <!-- Croix pour fermer le menu -->
        <div class="closeButton" id="closeMenu">X</div>
</div>

<!-- ICI AFFICHER TOUTES LES VOITURES -->
<div id="menu2" class="hidden">
    <!-- Contenu de votre deuxième menu -->
    <ul>
        
            <li><a href="#" class="menuButton2">MENU 2</a></li>
        
    </ul>
    <div class="closeButton" id="closeMenu2">X</div>
</div>

<script>
    // Récupérer le bouton du premier menu et le premier menu
    const menuButton = document.getElementById("menuButton");
    const menu = document.getElementById("menu");

    // Ajouter un événement de clic au premier bouton
    menuButton.addEventListener("click", () => {
        const isHidden = menu.classList.contains("hidden");

        if (isHidden) {
            menu.classList.remove("hidden");
            menu.style.right = "0";
        } else {
            menu.classList.add("hidden");
            menu.style.right = "-250px";
        }
    });

    // Récupérer tous les boutons du deuxième menu
    const menuButtons2 = document.querySelectorAll(".menuButton2");
    const menu2 = document.getElementById("menu2");

    // Ajouter un événement de clic à chaque bouton du deuxième menu
    menuButtons2.forEach(button => {
        button.addEventListener("click", () => {
            const isHidden = menu2.classList.contains("hidden");

            if (isHidden) {
                menu2.classList.remove("hidden");
                menu2.style.right = "0";
            } else {
                menu2.classList.add("hidden");
                menu2.style.right = "-250px";
            }
        });
    });

        // Pour le premier menu
          const closeMenu = document.getElementById("closeMenu");
          closeMenu.addEventListener("click", () => {
              menu.classList.add("hidden");
              menu.style.right = "-250px";
    });

    // Pour le deuxième menu
        const closeMenu2 = document.getElementById("closeMenu2");
        closeMenu2.addEventListener("click", () => {
            menu2.classList.add("hidden");
            menu2.style.right = "-250px";
    });
</script>



<?php if(isset($_SESSION['flash'])): ?>

      <?php   foreach($_SESSION['flash'] as $type => $message) : 
        
        echo $message;
        
      endforeach;
    endif;


    if(isset($errors)) :
        foreach($errors as $error) :
            echo $error;
        endforeach;
    endif;
        ?>
