<?php

//connexió mysql, si error guarda a session 

$servername = "localhost";
$username = "elblogdelhort";
$password = "delhort";
$db = "elblogdelhort";

@$con = new mysqli($servername, $username, $password, $db);

// Check connection
if ($con->connect_error) {
    //die(ERROR_CON . $con->connect_error);
    $_SESSION['error_mysql'] = ERROR_CON;

  } else {
    //echo "<br> CONNEXIÓ MYSQL OK :) <br>";
  }

?>