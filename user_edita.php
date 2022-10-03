<?php require_once 'includes/helpers.php'; ?>

<?php
//sessió user ?
//var_dump($_SESSION['usuari']);

neteja_form();

//var_dump($_POST);
       
//definim
$_SESSION['fu_errors'] = [];
        
//inicialitzem i netegem
$nom = test_input($_POST['fu_nom']);
$cognoms = test_input($_POST['fu_cognoms']);
$mail = test_input($_POST['fu_mail']);

$id_user = intval($_SESSION['usuari']['id']);

//validacions
if ( !valida_nom($nom) ) {
    //echo "<br>* FATAL ERROR * Nom";
    $_SESSION['fu_errors']['nom'] = NORMA_NOM;
}

if ( !valida_nom($cognoms) ) {
    //echo "<br>* FATAL ERROR * Cognoms";
    $_SESSION['fu_errors']['cognoms'] = NORMA_NOM;
}

if ( !valida_mail($mail) ) {
    //echo "<br>* FATAL ERROR * Mail";
    $_SESSION['fu_errors']['mail'] = NORMA_MAIL;
}

//errors ?  
//var_dump($_SESSION['fu_errors']);
//echo count($_SESSION['fu_errors']);

//si no errors form, tirem endavant
if ( count($_SESSION['fu_errors']) == 0 ) {

    //echo "<br>* endavant amb l'update *<br>";
                
    require 'includes/connecta.php';

    $consulta = "UPDATE usuaris
    set nom = '$nom', cognom = '$cognoms', email = '$mail'
    where id = $id_user";

    if ($con->query($consulta) === TRUE) {
        //echo "New record updated successfully";
        $_SESSION['fu_ok'] = UPDATE_USER;
        //unset($_SESSION['fr_inputs']);

        //update _SESSION USER
        $_SESSION['usuari']['nom'] = $nom;
        $_SESSION['usuari']['cognom'] = $cognoms;
        $_SESSION['usuari']['email'] = $mail;

    } else {
        echo "Error: " . $sql . "<br>" . $con->errno.$con->error;

        //error 1062 mail duplicat
        if ( $con->errno == 1062) {
            $_SESSION['fu_error'] = ERROR_DUPLI;
        } else {
            $_SESSION['fu_error'] = ERROR_INSERT;
        }
    }
    /* tancar connexió */
    $con->close();
}

$_SESSION['pag'] = 'compte';

header('Location: index.php');

?>
