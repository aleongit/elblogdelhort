<!doctype html>
<html lang="ca"> <!-- meta idioma -->

<head>
    <meta charset="utf-8"><!--meta joc de caràcters -->
    <meta name="viewport" content="width=device-width, initial-scale=1"><!-- etiqueta per HTML responsive -->
    <meta name="description" content="">
    <meta name="author" content="Aleix Leon amb Bootstrap">

    <title>El Blog de l'Hort - Aleon</title><!-- títol de la web -->

    <link rel="icon" href="assets/img/TOMATO.png" type="image/gif" sizes="16x16"><!-- favicon -->

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">

    <!-- CSS interns -->
    <style> </style>

    <!-- estils personalitzats Aleix Leon -->
    <link href="assets/css/hort.css" rel="stylesheet">

</head>

<body>

<header>

<!-- menú superior_________________________________________________________________________ -->
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">El blog de l'hort</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">

          <li class="nav-item">
            <a class="nav-link" href="#contacte">Contacte</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#quefem">Què fem ?</a>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">
              <!--icona amb vector -->
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cone-striped" viewBox="0 0 16 16">
                <path d="M9.97 4.88l.953 3.811C10.158 8.878 9.14 9 8 9c-1.14 0-2.159-.122-2.923-.309L6.03 4.88C6.635 4.957 7.3 5 8 5s1.365-.043 1.97-.12zm-.245-.978L8.97.88C8.718-.13 7.282-.13 7.03.88L6.274 3.9C6.8 3.965 7.382 4 8 4c.618 0 1.2-.036 1.725-.098zm4.396 8.613a.5.5 0 0 1 .037.96l-6 2a.5.5 0 0 1-.316 0l-6-2a.5.5 0 0 1 .037-.96l2.391-.598.565-2.257c.862.212 1.964.339 3.165.339s2.303-.127 3.165-.339l.565 2.257 2.391.598z"/>
              </svg> Botiga Online</a>
          </li>

        </ul>
        <span class="navbar-text text-white">V 1.0 DES21</span>
      </div>
    </div>
  </nav>

</header>

<main>

<!-- banner-headers, si user o no -->
<?php if ( isset( $_SESSION['usuari'] ) ) {
  require_once 'includes/header_user.php';
} else {
  require_once 'includes/header_home.php';
} ?>

<!-- menú categories -->
<?php require_once 'includes/header_categories.php';?>
