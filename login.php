<?php require_once 'includes/helpers.php'; ?>

<!-- enviament POST -->
<?php

neteja_form();
require_once 'includes/connecta.php';

//si error connexió, només missatge
if( ! isset($_SESSION['error_mysql']) ) {

       //var_dump($_POST);

       //netegem inputs
       $mail = test_input($_POST['fl_mail']);
       $pass = test_input($_POST['fl_pass']);

       echo "<br>";
       var_dump($mail, $pass);

       //si els dos no buits
       if ( !empty($mail) && !empty($pass) ) {

              //validació, comprova email
              //select * from usuaris where email = 'test@gmail.cat';
              $sql = "SELECT * FROM usuaris WHERE email='$mail'";

              $login = $con -> query ($sql);
              //var_dump($login);
              
              // hi ha email id
              if ( $login && ( $login -> num_rows == 1) ) {
              
                     //fetch associatiu usuari
                     $usuari = $login -> fetch_assoc();
                     //var_dump($usuari);

                     //verificar pass
                     $verifica = password_verify($pass, $usuari['password']);
                     //var_dump($verifica); //bool

                     //si pass ok
                     if ( $verifica ) {
              
                            //si ok, activem sessió
                            //$_SESSION['usuari'] = $mail;
                            $_SESSION['fl_ok'] = 'LOGGIN OK! :)';

                            //borro pass per seguretat
                            $usuari['password'] = "";

                            //session user
                            $_SESSION['usuari'] = $usuari;
                            //var_dump($_SESSION['usuari']);

                     } else {
                            echo ERROR_LOGIN;
                            $_SESSION['fl_error'] = ERROR_LOGIN;
                     }
              } else {
                     echo ERROR_LOGIN;
                     $_SESSION['fl_error'] = ERROR_LOGIN;
              }
       } else {
              //echo "* FATAL ERROR * camps buits";
              $_SESSION['fl_error'] = "* FATAL ERROR * camps buits";
       }
       $con->close();

} else {
       $_SESSION['fl_error'] = ERROR_CON;
}

//carregar posts usuari
header("Location:redirect.php?user=ok");

//header("Location:index.php");

?>
