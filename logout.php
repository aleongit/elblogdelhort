<?php require_once 'includes/helpers.php'; ?>

<?php
//comprovem si existeix sessió
if ( isset( $_SESSION['usuari'] ) ) {

    //var_dump( $_SESSION['usuari'] );

    //tanquem sessió usuari
    unset($_SESSION['usuari']);

    //netegem
    neteja_form();
 }
 
header('Location: index.php');

?>