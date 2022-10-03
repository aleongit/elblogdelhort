<?php declare( strict_types = 1 );  //strict requirement  ?>
<?php session_start();              // inici sessió       ?>

<?php

define('ACCENTS', ['Š'=>'S', 'š'=>'s', 'Ž'=>'Z', 'ž'=>'z', 'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E',
    'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O', 'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U',
    'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss', 'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c',
    'è'=>'e', 'é'=>'e', 'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o', 'ô'=>'o', 'õ'=>'o',
    'ö'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'þ'=>'b', 'ÿ'=>'y'] );

define('NORMA_NOM', 'Obligatori, MAJ, MIN i espais');
define('NORMA_PASS', 'MIN 8, 1 MAJ, 1 MIN, 1 NUM i 1 (-/*+)');
define('NORMA_MAIL', 'Obligatori, cal format email');
define('NORMA_PRIVADESA', 'Cal acceptar RGPD ;)');
define('NORMA_CAT', 'NOMÉS lletres, NO accents/espais/nums/símbols');
define('NORMA_ENT', 'Obligatori');

define('SEL_CAT', '* FATAL ERROR * selecciona categoria');

define('OK_USER', 'ALTA USUARI OK! :) ');
define('OK_CAT', 'ALTA CATEGORIA OK! :) ');
define('OK_ENTRADA', 'ALTA ENTRADA OK! :) ');

define('UPDATE_USER', 'UPDATE USER OK! :) ');
define('UPDATE_ENTRADA', 'UPDATE ENTRADA OK! :) ');

define('ERROR_LOGIN', '* FATAL ERROR * Login incorrecte');
define('ERROR_CON', '* FATAL ERROR BD * system down :(');
define('ERROR_INSERT', '* FATAL ERROR BD * Insert ha fet figa');
define('ERROR_DUPLI', '* FATAL ERROR BD * Usuari existent!');
define('ERROR_UPDATE', '* FATAL ERROR BD * Update ha fet figa');
define('ERROR_0', '* FATAL ERROR * 0 entrades');

define('EXIST_CAT',"* FATAL ERROR * categoria existeix");
define('NOEXIST_CAT',"* FATAL ERROR * categoria inexistent");
define('NOEXIST_ENT',"* FATAL ERROR * entrada inexistent");

define('LIM_MIN', 3);
define('LIM_MAX', 99);

define('TIPUS_IMG', ['image/jpg', 'image/jpeg', 'image/bmp', 'image/gif','image/png']);
define('NORMA_IMG', 'format [jpg, jpeg, bmp, gif, png]');
define('OK_IMG', 'Imatge pujada OK :)');
define('DIR_IMG','assets/img/');
define('IMG_DEF','assets/img/NOIMG.png');

//funció neteja inputs (espais + barres + caràcters especials html)
function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        $data = str_replace("'", "´", $data); //canviar cometes simples
        return $data;
      }

//validació nom i cognom
//Nom: obligatori, lletres majúscules minúscules i espais
//preg_match ("/^\p{L}+$/ui",$nom) unicode

function valida_nom($nom) {
    $ok = False;
    //echo "<br>Validació nom:";
    //echo preg_match ("/^[a-zA-z-\s]*$/",$nom);

    if ( preg_match ("/^[a-zA-z-\s\p{L}]*$/ui",$nom) && !empty($nom) ) {
        $ok = True;
        }   
    return $ok;
    }

//validació pass
//Password: Obligatori, mida mínima 8, almenys una lletra majúscula, una minúscula, 
//una xifra i un caràcter especial (-/*+)
//https://www.coding.academy/blog/how-to-use-regular-expressions-to-check-password-strength
//https://docs.trifacta.com/display/DP/Supported+Special+Regular+Expression+Characters
// per barra '/' = \/\\

function valida_pass($pass) {
    $ok = False;
    $pattern = '/^(?=.*[*+-\/\\])(?=.*[0-9])(?=.*[A-Z]).{8,20}$/';
    //echo preg_match ($pattern,$pass);

    if ( preg_match ($pattern,$pass) && !empty($pass) ) {
        $ok = True;
        }
    return $ok;
    }

//validació mail
//Email obligatori, validar que sigui un email correcte
function valida_mail($mail) {
    $ok = False;
    //echo filter_var($mail, FILTER_VALIDATE_EMAIL);

    if( filter_var($mail, FILTER_VALIDATE_EMAIL) && !empty($mail) ) {
        $ok = True;
        }
    return $ok;
    }

function valida_cat($cat) {
    $ok = False;
    //echo "<br>Validació nom:";
    //echo preg_match ("/^[a-zA-z-\s]*$/",$nom);

    if ( preg_match ("/^[a-zA-z]*$/",$cat) && !empty($cat) ) {
        $ok = True;
        }   
    return $ok;
    }

function llegirCategories($con) {
        //var_dump($con);
        $categories = [];
        //select * from categories order by id asc;
        $consulta = "SELECT * FROM categories ORDER BY id ASC";

        if ($resultat = $con->query($consulta)) {
            /* obtenir un array associatiu */
            while ($fila = $resultat->fetch_assoc()) {
                //printf ("%s (%s)\n", $fila['id'], $fila['nom']);
                //afegim element al array
                array_push($categories, $fila );
            }
            /* lliberar resultats */
            $resultat->free();
        }
        /* tancar connexió */
        $con->close();

        return $categories;
}

Function mostraCategories($cat) {
    /*
    <li class="nav-item">
        <a class="nav-link" href="#">Categoria 1</a>
    </li>
    */
    for ($i = 0; $i < count($cat); $i++) {
        echo "
        <li class='nav-item'>
         <a class='nav-link' href='redirect.php?cat=".$cat[$i]['nom']."'>". $cat[$i]['nom'] ."</a>
        </li>";
    }
}

//llegir entrades
Function llegirEntrades($con, $limit=99, $cat='%', $user='%', $cerca='%') {
    $entrades = [];
    //var_dump($cat);

    //select * from entrades where usuari_id = 1 order by data desc;
    //select * from entrades order by data desc;

    $consulta = "SELECT entrades.id, titol, descripcio, imatge, entrades.data, 
    usuaris.nom as usuari, categories.nom as cat
    from entrades,usuaris,categories
    where categories.nom like '$cat' and entrades.usuari_id like '$user'
    and ( titol like '$cerca' or descripcio like '$cerca' )
    and entrades.usuari_id = usuaris.id and entrades.categoria_id = categories.id
    order by data desc limit $limit";

    if ($resultat = $con->query($consulta)) {
        /* obtenir un array associatiu */
        while ($fila = $resultat->fetch_assoc()) {  
            //afegim element al array
            array_push($entrades, $fila );
        }
        /* lliberar resultats */
        $resultat->free();
    }
    /* tancar connexió */
    $con->close();

    //var_dump($entrades);

    return $entrades;
}

//entrada amb limitació caràcters
Function mostraEntrades($entrades) {
    
    /* <!-- Post preview--> */
    $n = 60; //tall caràcters descripció

    for ($i = 0; $i < count($entrades); $i++) {

        //si cerca__________________________________________________
        if ( isset($_SESSION['cerca']) ){
            //var_dump($_SESSION['cerca']);

            //tota la descripció
            $n = strlen($entrades[$i]['descripcio']);

            //buscar sense accents i MAJ/MIN
            $cerca = strtolower(strtr( $_SESSION['cerca'], ACCENTS ));
            $tit = strtolower(strtr( $entrades[$i]['titol'], ACCENTS ));
            $des = strtolower(strtr( $entrades[$i]['descripcio'], ACCENTS ));

            //echo "<br>".$cerca;
            //echo "<br>".$text;

            //marquem títol i descripció, afegint <mark>
            $entrades[$i]['titol'] = str_replace($cerca,"<mark>".$cerca."</mark>", $tit);
            $entrades[$i]['descripcio'] = str_replace($cerca,"<mark>".$cerca."</mark>",$des);
        }
        //echo $entrades[$i]['titol'];

        echo "
        <div class = 'bg-white post-preview p-3'>
        <a href='redirect.php?id=".$entrades[$i]['id']."'>
            <h2 class='post-title'>".$entrades[$i]['titol']."</h2>
            <h3 class='post-subtitle'>".substr($entrades[$i]['descripcio'],0,$n)." ...</h3>
        </a>
        <img src='".$entrades[$i]['imatge']."' class='w-25 p-3' alt='...'>

        <p class='post-meta'>
            Posted by <b>".$entrades[$i]['usuari']."</b> on <b>".$entrades[$i]['data']."</b>
            | CAT -> <b>".$entrades[$i]['cat']."</b>
        </p>

        </div>
        <!-- Divider-->
        <hr class='my-4' />
        ";
    }

    echo "
    <!-- Pager-->
    <div class='d-flex justify-content-end mb-4'>
        <a class='btn btn-primary mt-3' 
        href='redirect.php?cat=tots'>Tots els posts →</a>
    </div>";
}

Function llegirEntrada($con,$id_post) {
    $entrada = [];

    $consulta = "SELECT entrades.id, usuari_id, categoria_id, titol, descripcio,
    imatge, entrades.data, usuaris.nom as usuari, categories.nom as cat
    from entrades,usuaris,categories
    where entrades.id = $id_post and entrades.usuari_id = usuaris.id and entrades.categoria_id = categories.id
    order by data desc";

    if ($resultat = $con->query($consulta)) {
        /* obtenir un array associatiu */
        while ($fila = $resultat->fetch_assoc()) {  
            //afegim element a array
            array_push( $entrada, $fila );
        }
        /* lliberar resultats */
        $resultat->free();
    }
    /* tancar connexió */
    $con->close();

    return $entrada;

}

//entrada individual
Function mostraEntrada($entrada) {

    $i = 0;

    //+botons usuari de l'entrada
    //si usuari sessió = usuari entrada (usuari_id)
    if ( isset($_SESSION['usuari']) ) {

        if ( $_SESSION['usuari']['id'] == $entrada[$i]['usuari_id']) {

            echo "
            <div class='d-flex justify-content-start mb-4'>
                <a class='btn btn-primary m-2 px-4' 
                href='redirect.php?pag=entrades_edita'>Edita</a>";                            

            //html bootstrap modal per eliminar
            require_once 'includes/modal_esborra.php';
            
            echo "</div>";
        }
    }

    //entrada
    echo "
    <div class = 'bg-white post-preview p-3'>
        <h2 class='post-title'>".$entrada[$i]['titol']."</h2>

        <p class='post-meta'>
        Posted by <b>".$entrada[$i]['usuari']."</b> on <b>".$entrada[$i]['data']."</b>
        | CAT -> <b>".$entrada[$i]['cat']."</b>
        </p>

        <p>".$entrada[$i]['descripcio']."</p>
    <img src='".$entrada[$i]['imatge']."' class='w-50 p-3' alt='...'>

    </div>
    <!-- Divider-->
    <hr class='my-4' />
    ";

    echo "
    <!-- Pager-->
    <div class='d-flex justify-content-end mb-4'>
        <a class='btn btn-primary mt-3' 
        href='redirect.php?cat=tots'>Tots els posts →</a>
    </div>";

}

function llegir_ids_entrades($con) {
    //var_dump($con);
    $ids = [];
    //select * from categories order by id asc;
    $consulta = "SELECT id from entrades order by id;";

    if ($resultat = $con->query($consulta)) {
        /* obtenir un array associatiu */
        while ($fila = $resultat->fetch_assoc()) {
            //printf ("%s (%s)\n", $fila['id'], $fila['nom']);
            //afegim element al array
            array_push($ids, $fila['id'] );
        }
        /* lliberar resultats */
        $resultat->free();
    }
    /* tancar connexió */
    $con->close();

    return $ids;
}

Function alert($missatge) {

    echo "
    <div class='alert alert-danger' role='alert'>
    $missatge
    </div>";
}


Function neteja_form() {

    $_SESSION['pag'] = 'show_entrades';
        
    unset($_SESSION['fr_errors']);
    unset($_SESSION['fr_inputs']);
    unset($_SESSION['fr_ok']);
    unset($_SESSION['fr_error']);
    
    unset($_SESSION['error_mysql']);

    unset($_SESSION['fl_error']);
    unset($_SESSION['fl_ok']);

    //unset($_SESSION['sql_entrada']);
    //unset($_SESSION['edita']);
    unset($_SESSION['sql_entrades']);
    unset($_SESSION['entrades_error']);
    unset($_SESSION['cerca']);

    unset($_SESSION['fc_error']);
    unset($_SESSION['fc_ok']);

    unset($_SESSION['fe_errors']);
    unset($_SESSION['fe_inputs']);
    unset($_SESSION['fe_error']);
    unset($_SESSION['fe_ok']);

    unset($_SESSION['fu_errors']);
    unset($_SESSION['fu_error']);
    unset($_SESSION['fu_ok']);

    //session_destroy();
    
}


?>