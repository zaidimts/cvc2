<?php 
if(session_status() == PHP_SESSION_NONE){
session_start();

}?>

<body>
<?php /*require_once('header.php')*/ ?>
<body class="bg-principal c-principal w-100">
    <main class="mb-5 container-fluid px-0">
      <section class="pb-2 position-relative">
        <!-- Carousel -->
        <div id="demo" class="carousel slide" data-bs-ride="carousel">
          <!-- Indicators/dots -->
          <div class="carousel-indicators">
            <button
              type="button"
              data-bs-target="#demo"
              data-bs-slide-to="0"
              class="active"
            ></button>
            <button
              type="button"
              data-bs-target="#demo"
              data-bs-slide-to="1"
            ></button>
            <button
              type="button"
              data-bs-target="#demo"
              data-bs-slide-to="2"
            ></button>
          </div>

          <!-- The slideshow/carousel -->
          <div class="carousel-inner">
          <a href="/views/voitures.php"><div class="carousel-item active">
              <img
                src="/assets/img/Accueil/accueil1.png"
                alt="Los Angeles"
                class="d-block w-100"
              />
              <div class="carousel-caption bg-transparant">
               <h3>LES DERNIERES SORTIES</h3>
                <p class="d-none d-md-block">
                  Regardez les dernieres sorties de voitures
                </p>
              </div></a>
            </div>
            <div class="carousel-item">
              <img
                src="/assets/img/Accueil/accueil2.png"
                alt="Chicago"
                class="d-block w-100"
              />
              <div class="carousel-caption bg-transparant">
                <h3>MA COLLECTION</h3>
                <p class="d-none d-md-block">Toutes mes voitures préféré</p>
              </div>
            </div>
            <div class="carousel-item">
              <img
                src="/assets/img/Accueil/accueil3.png"
                alt="New York"
                class="d-block w-100"
              />
              <div class="carousel-caption bg-transparant">
                <h3>VOITURES DE SPORT ECOLO</h3>
                <p class="d-none d-md-block">
                  L’avenir proche des voitures sportive
                </p>
              </div>
            </div>
          </div>

          <!-- Left and right controls/icons -->
          <button
            class="carousel-control-prev"
            type="button"
            data-bs-target="#demo"
            data-bs-slide="prev"
          >
            <span class="carousel-control-prev-icon"></span>
          </button>
          <button
            class="carousel-control-next"
            type="button"
            data-bs-target="#demo"
            data-bs-slide="next"
          >
            <span class="carousel-control-next-icon"></span>
          </button>
        </div>
      </section>

      <section class="section-accueil my-5">
        <div class="container">
          <div class="row gy-5 gy-md-0 bg-light">
            <div class="col-12 col-md-6 p-0">
              <p
                class="h-100 d-flex justify-content-center align-items-center c-secondaire"
              >
                Les dérnieres technologie<br />
                des plus récentes sportives
              </p>
            </div>
            <div class="col-12 col-md-6 p-0">
              <img
                src="/assets/img/Accueil/int.png"
                alt="photo d'une voiture"
                class="h-100 w-100"
              />
            </div>
          </div>
        </div>
      </section>

      <section class="position-relative">
        <p
          class="c-principal lead border border-secondary p-1 p-md-5 text-center w-50 bg-transparant position-absolute"
          style="bottom: 40%; right: 25%"
        >
          LES VOITURES DE VOS REVES
        </p>
        <div class="container">
          <div class="row">
            <div class="col p-0">
              <img
                src="/assets/img/Accueil/mustang.png"
                alt="photo d'une voiture"
                class="h-100 w-100"
              />
            </div>
            <div class="col p-0">
              <img
                src="/assets/img/Accueil/lambo.png"
                alt="photo d'une voiture"
                class="h-100 w-100"
              />
            </div>
          </div>
          <div class="row">
            <div class="col p-0">
              <img
                src="/assets/img/Accueil/audi.png"
                alt="photo d'une voiture"
                class="h-100 w-100"
              />
            </div>
            <div class="col p-0">
              <img
                src="/assets/img/Accueil/gate.png"
                alt="photo d'une voiture"
                class="h-100 w-100"
              />
            </div>
          </div>
        </div>
      </section>
    </main>
</body>

    <?php require_once('footer.php') ?>
