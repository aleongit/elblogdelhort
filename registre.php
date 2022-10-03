<?php require_once 'includes/helpers.php'; ?>

<!-- enviament POST -->
<?php

neteja_form();
require_once 'includes/connecta.php';

//si error connexió, només missatge
if( isset($_SESSION['error_mysql']) ) {
       $_SESSION['fr_error'] = ERROR_CON;

} else {

       //definim
       $_SESSION['fr_errors'] = [];
       $_SESSION['fr_inputs'] = [];

       //var_dump($_POST);
               
       //netegem inputs
       $nom = test_input($_POST['fr_nom']);
       $cognoms = test_input($_POST['fr_cognoms']);
       $mail = test_input($_POST['fr_mail']);
       $pass = test_input($_POST['fr_pass']);
       $privadesa = $_POST['fr_privadesa'] ? test_input($_POST['fr_privadesa']) : Null;

       //guardem nom, cognoms i mail per facilitar al usuari en cas d'errors
       $_SESSION['fr_inputs']['fr_nom'] = $nom;
       $_SESSION['fr_inputs']['fr_cognoms'] = $cognoms;
       $_SESSION['fr_inputs']['fr_mail'] = $mail;

       //var_dump($nom, $cognoms, $mail, $pass, $privadesa);

       if ( !valida_nom($nom) ) {
              //echo "<br>* FATAL ERROR * Nom";
              $_SESSION['fr_errors']['nom'] = NORMA_NOM;
       }

       if ( !valida_nom($cognoms) ) {
              //echo "<br>* FATAL ERROR * Cognoms";
              $_SESSION['fr_errors']['cognoms'] = NORMA_NOM;
       }

       if ( !valida_mail($mail) ) {
              //echo "<br>* FATAL ERROR * Mail";
              $_SESSION['fr_errors']['mail'] = NORMA_MAIL;
       }

       if ( !valida_pass($pass) ) {
              //echo "<br>* FATAL ERROR * Pass";
              $_SESSION['fr_errors']['pass'] = NORMA_PASS;
       }

       if ( $privadesa == Null) {
              //echo "<br>* FATAL ERROR * Privadesa";
              $_SESSION['fr_errors']['privadesa'] = NORMA_PRIVADESA;
       }

       //errors ?   
       //var_dump($_SESSION['fr_errors']);
       //echo count($_SESSION['fr_errors']);

       //si no errors form, tirem endavant
       if ( count($_SESSION['fr_errors']) == 0 ) {

              //preparar valors per insert
                           
              //encriptar pass hash
              //https://www.php.net/manual/en/function.password-hash.php
              $passencrip = password_hash($pass, PASSWORD_BCRYPT, ['cost' => 4]);

              //var_dump($passencrip);
              //var_dump(password_verify($pass,$passencrip));

              //insert usuari
              $sql = "INSERT INTO usuaris VALUES ( id, '$nom', '$cognoms', '$mail', '$passencrip', current_date())";

              if ($con->query($sql) === TRUE) {
                     //echo "New record created successfully";
                     $_SESSION['fr_ok'] = OK_USER;
                     unset($_SESSION['fr_inputs']);

              } else {
                     echo "Error: " . $sql . "<br>" . $con->errno.$con->error;

                     //error 1062 mail duplicat
                     if ( $con->errno == 1062) {
                            $_SESSION['fr_error'] = ERROR_DUPLI;
                     } else {
                            $_SESSION['fr_error'] = ERROR_INSERT;
                     }
              }
              
              $con->close();
       }
}

header("Location:index.php#form_registre");

?>
