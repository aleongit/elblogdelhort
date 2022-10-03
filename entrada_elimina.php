<?php require_once 'includes/helpers.php'; ?>

<?php

//var_dump($_SESSION['sql_entrada'][0]);

//ini
$id_user = intval($_SESSION['usuari']['id']);
$id_ent = intval($_SESSION['sql_entrada'][0]['id']);

require 'includes/connecta.php';

$consulta = "DELETE from entrades where id=$id_ent and usuari_id=$id_user;";

if ($con->query($consulta) === TRUE) {
    //echo "Delete ok";

} else {
    echo "Error: " . $sql . "<br>" . $con->errno.$con->error;
    //echo "Delete error";

}
/* tancar connexió */
$con->close();
    
neteja_form();

$_SESSION['pag'] = 'show_entrades';

header("Location:redirect.php?user=ok");

//header('Location: index.php');

?>