<?php require_once 'includes/helpers.php'; ?>

<?php

neteja_form();
//var_dump($_POST);

//inicialitzem i netegem
$cat = test_input($_POST['fc_nom']);

//passem a min
$cat = strtolower($cat);

//validació
if ( !valida_cat($cat) ) {
    echo "<br>* FATAL ERROR * cat";
    $_SESSION['fc_error'] = NORMA_CAT;
}

//errors ?   
var_dump($_SESSION['fc_error']);

//si no errors form, tirem endavant
if ( ! isset($_SESSION['fc_error']) )  {

    //llegir categories
    require 'includes/connecta.php';
    $categories = llegirCategories($con);
    //var_dump($categories);

    //noms categories
    $cat_noms = [];
    foreach ($categories as $fila) {
    array_push($cat_noms, $fila['nom'] );
    }

    //control ids existents, si cat nova no està a categories
    if ( ! in_array ($cat, $cat_noms) ) {

        require 'includes/connecta.php';
        $consulta = "INSERT into categories values ( null , '$cat' );";

        if ($con->query($consulta) === TRUE) {
            //echo "New record created successfully";
            $_SESSION['fc_ok'] = OK_CAT;
            //unset($_SESSION['fr_inputs']);

        } else {
            echo "Error: " . $sql . "<br>" . $con->errno.$con->error;
            $_SESSION['fc_error'] = ERROR_INSERT;
        }

        /* tancar connexió */
        $con->close();

    } else {
        echo "* FATAL ERROR * cat existent";
        $_SESSION['fc_error'] = EXIST_CAT;
    }
}
$_SESSION['pag'] = 'categories';

header('Location: index.php');

?>