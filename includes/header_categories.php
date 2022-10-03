<?php require_once 'includes/helpers.php'; ?>
<?php require 'includes/connecta.php'; ?>

<!-- html dins header ___________________________________________________ -->
<!-- menú categories ____________________________________________________ -->
<div class="container-fluid">

  <nav class="navbar navbar-expand-lg navbar-light bg-light rounded border" aria-label="Eleventh navbar example">
    
    <div class="container-fluid">

      <a class="navbar-brand fw-bold" href="redirect.php?user=ok">
      <?php echo isset($_SESSION['usuari']['nom'])?'Les entrades de '.$_SESSION['usuari']['nom']:'Categories'?>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample09" aria-controls="navbarsExample09" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExample09" >
        
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">

        <!-- tots -->
        <li class="nav-item fw-bold">
            <a class="nav-link" href="redirect.php?cat=tots">Totes</a>
        </li>
          
        <!--
          <li class="nav-item">
            <a class="nav-link" href="#">Categoria 1</a>
          </li>
        -->

        <?php
        //llegeix i mostra categories 
        if( ! isset($_SESSION['error_mysql']) ) {
          
          //var_dump($con);
          $categories = llegirCategories($con);
          mostraCategories($categories); 

        } else {
          echo  $_SESSION['error_mysql'] ;
        }
        ?>

        </ul>
        
        <form class="d-flex" action="redirect.php" method="get" >
          <input name='cerca' class="form-control me-2" type="text" placeholder="Cerca" aria-label="Search">
          <button type="submit" class="btn btn-outline-success ">Cerca!</button>
        </form>
      
      </div>
    
    </div>
  
  </nav>
 
</div>