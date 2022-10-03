<?php require_once 'includes/helpers.php'; ?>

<?php

//tan per CREAR com EDITAR entrada _____________________________________
//var_dump($_SESSION['edita']);
//var_dump($_SESSION['usuari']);

neteja_form();
//var_dump($_POST);

//definim
$_SESSION['fe_errors'] = [];
$_SESSION['fe_inputs'] = [];

//inicialitzem i netegem
$titol = test_input($_POST['fe_titol']);
$des = test_input($_POST['fe_des']);
$id_cat = test_input($_POST['fe_cat']);
$id_user = intval($_SESSION['usuari']['id']);

//guardem títol, descripció, categoria per facilitar a usuari en cas d'error
$_SESSION['fe_inputs']['fe_titol'] = $titol;
$_SESSION['fe_inputs']['fe_des'] = $des;
$_SESSION['fe_inputs']['fe_cat'] = $id_cat;

//validacions
if ( empty ($titol) ) {
    //echo "<br>* FATAL ERROR * titol";
    $_SESSION['fe_errors']['titol'] = NORMA_ENT;
}

if ( empty ($des) ) {
    //echo "<br>* FATAL ERROR * descripció";
    $_SESSION['fe_errors']['des'] = NORMA_ENT;
}

//categoria
if ( ! is_numeric($id_cat) ) { 
    //echo "<br>* FATAL ERROR * categoria";
    $_SESSION['fe_errors']['cat'] = SEL_CAT;
} else {
    //pas a num
    $id_cat = intval($id_cat);
}

//imatge_______________________________________________
//echo "<br>* info _FILES:<br>";
//var_dump($_FILES['fe_img']);
$img = $_FILES['fe_img'];

//var_dump( ! empty($img['name']) );
//en cas de seleccionar imatge, validació i puja imatge
if( ! empty( $img['name'] ) ) {

    //echo "<br>".$img['type'];
    //valida format
    if ( in_array($img['type'], TIPUS_IMG) ) {
        //echo "<br>* ok tipus *";

        //is_dir = si un fitxer és dir
        //si no existeix, es crea
        if ( !is_dir( DIR_IMG ) ) { mkdir( DIR_IMG, 0777 ); }

        //timestamp actual, objecte data
        $data = new DateTime();
        //echo $data->getTimestamp();
        $ts = $data->getTimestamp();

        //path final + nom imatge + ts
        $path_img = DIR_IMG.$ts.'_'.$img['name'];
        //var_dump($path_img);
       
        //moure imatge a dir
        //$fitxer['tmp_name'] !!!!
        move_uploaded_file( $img['tmp_name'], $path_img );

    }
    else {
         //echo "<br>*FATAL ERROR* format imatge";
         $_SESSION['fe_errors']['img'] = NORMA_IMG ;
    }

//si no es selecciona imatge
} else {
    //si edita, imatge que hi havia
    if ( isset ($_SESSION['edita']) ) {
        //echo "<br>* imatge que hi havia";
        $path_img = $_SESSION['sql_entrada'][0]['imatge'];
    
    //imatge per defecte
    } else {
        //echo "<br>* imatge per defecte";
        $path_img = IMG_DEF;
    }
}
//echo "<br>* imatge *<br>".$path_img;

//errors ?
//echo "<br>* errors *<br>";    
var_dump($_SESSION['fe_errors']);

//si no errors form, tirem endavant
if ( count($_SESSION['fe_errors']) == 0 ) {
    //echo "<br>* endavant amb l'insert/update *<br>";

    require 'includes/connecta.php';

    //editar
    if (isset ($_SESSION['edita'])) {
        //echo "<br>* editar *";

        $id_ent = intval($_SESSION['sql_entrada'][0]['id']);

        $consulta = "UPDATE entrades
        set categoria_id=$id_cat, titol='$titol', descripcio='$des', imatge='$path_img'
        where id=$id_ent and usuari_id=$id_user ";
    
    //crear
    } else {
        //echo "<br>* crear *";
        $consulta = "INSERT into entrades values 
        ( null, $id_user, $id_cat, '$titol', '$des', '$path_img', now() )";
    }
    
    //fer consulta sql i resposta ok
    if ($con->query($consulta) === TRUE) {
        
        if ( isset($_SESSION['edita']) ) {
            //echo "update ok";
            $_SESSION['fe_ok'] = UPDATE_ENTRADA;
        } else {
            //echo "New record created successfully";
            $_SESSION['fe_ok'] = OK_ENTRADA;
        }

    //error consulta sql
    } else {
        echo "Error: " . $consulta . "<br>" . $con->errno.$con->error;
        
        if ( isset($_SESSION['edita']) ) {
            //echo "update error";
            $_SESSION['fe_error'] = ERROR_UPDATE;
        } else {
            //echo "insert error";
            $_SESSION['fe_error'] = ERROR_INSERT;
        }
    }
    /* tancar connexió */
    $con->close();
}

//netegem si ok
if ( isset($_SESSION['fe_ok']) ) {
    unset($_SESSION['sql_entrada']);
    unset($_SESSION['fe_inputs']);
    unset($_SESSION['edita']);
}

$_SESSION['pag'] = 'entrades';

header('Location: index.php');

?>