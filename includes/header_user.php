<!-- carousel __________________________________________________________________________________________ -->
  <div id="myCarousel" class="carousel slide bg-dark" data-bs-ride="carousel">

    <div class="carousel-inner ">
      <div class="carousel-item active">
        <!--<svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#777"/></svg>-->
        <div class="container ">
          <div class="carousel-caption text-start text-light" >
            <h1 class="display-1"><?php echo'Hola '.$_SESSION['usuari']['nom']. " :)"; ?></h1>
            <h2 class ="display-6">Bentornat/da a la teva àrea personal</h2>
          </div>
        </div>
      </div>

      <div class="carousel-item">
        <!--<svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#777"/></svg>-->
        <div class="container">
          <div class="carousel-caption">
            <h1 class="display-1">Escampa posts als 4 vents!</h1>
            <h2 class ="display-6">Comparteix les news del teu hort</h2>
            <!--<p><a class="btn btn-lg btn-primary" href="#" role="button">Learn more</a></p>-->
          </div>
        </div>
      </div>

      <div class="carousel-item">
        <!--<svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#777"/></svg>-->
        <div class="container">
          <div class="carousel-caption text-end">
            <h1 class="display-1">Tranquil/la! es pot arreglar</h1>
            <h2 class ="display-6">Modifica i/o elimina les teves bestieses</h2>
          </div>
        </div>
      </div>
    </div>

    <a class="carousel-control-prev" href="#myCarousel" role="button" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </a>
    
    <a class="carousel-control-next" href="#myCarousel" role="button" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </a>
  </div>