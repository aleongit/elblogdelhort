<?php require_once 'includes/helpers.php'; ?>
<?php require 'includes/connecta.php'; ?>

<?php

//redirigeix a pàgina i/o funció, segons GET

//error connexió ?
if( ! isset($_SESSION['error_mysql']) ) {

    //sessió user ?
    if ( isset( $_SESSION['usuari'] ) ) {

        //var_dump( $_SESSION['usuari'] );
        //var_dump($_GET);

        //si GET pàgina________________________________________
        if ( isset($_GET['pag']) ) {

            //netegem
            $pag = test_input($_GET['pag']);

            //variables SESSIÓ segons pag GET
            switch ($pag) {
                case 'categories':
                    $_SESSION['pag'] = 'categories';
                    break;
                //crea entrades
                case 'entrades':
                    $_SESSION['pag'] = 'entrades';
                    unset($_SESSION['sql_entrada']);
                    unset($_SESSION['edita']);
                    break;
                case 'entrades_edita':
                    $_SESSION['pag'] = 'entrades';
                    $_SESSION['edita'] = True;
                    break;
                case 'compte':
                    $_SESSION['pag'] = 'compte';
                    break;
                default:
                    $_SESSION['pag'] = 'show_entrades';
            }
        }

    } 
    //si no és user, només show entrades
    else {
        $_SESSION['pag'] = 'show_entrades';
    }

    //si GET categoria______________________________________
    if ( isset($_GET['cat']) ) {

        //netegem inputs
        $cat = test_input($_GET['cat']);

        //llegir categories
        //require 'includes/connecta.php';
        $categories = llegirCategories($con);
        //var_dump($categories);

        //noms categories
        $cat_noms = [];
        foreach ($categories as $fila) {
            array_push($cat_noms, $fila['nom'] );
        }
        //var_dump($cat_noms);

        //control categories existents
        if ( in_array ($cat,$cat_noms) || $cat == 'tots' ) {

            require 'includes/connecta.php';
            //crida funció 'llegir entrades' i guardar a session
            if ( $cat == 'tots') {    
                $_SESSION['sql_entrades'] = llegirEntrades($con);
            } else {
                $_SESSION['sql_entrades'] = llegirEntrades($con, LIM_MAX, $cat);
            }
        } else {
            //echo "* FATAL ERROR * categoria inexistent";
            $_SESSION['entrades_error'] = NOEXIST_CAT;
        }

        //posiciona pag
        $_SESSION['pag'] = 'show_entrades';
    }

    //si GET user, entrades d'usuari____________________________________
    else if ( isset($_GET['user']) ) {

        if ( isset ($_SESSION['usuari']) ) {
            
            //paràmetres consulta
            $cat = '%';
            $id_user = intval($_SESSION['usuari']['id']);
            
            //require 'includes/connecta.php';
            $_SESSION['sql_entrades'] = llegirEntrades($con, LIM_MAX, $cat, $id_user);
        }

        //posiciona pag
        $_SESSION['pag'] = 'show_entrades';
    }

    //si GET cerca, entrades amb cerca títol o descripció ____________________________
    else if ( isset($_GET['cerca']) ) {

        if ( !empty($_GET['cerca']) ) {

            //netegem inputs
            $cerca = test_input($_GET['cerca']);

            //paràmetres consulta
            $cat = '%';
            $id_user = '%';
            $cerca = '%'.$cerca.'%';
            //var_dump($cerca);
            
            //require 'includes/connecta.php';
            $_SESSION['sql_entrades'] = llegirEntrades($con, LIM_MAX, $cat, $id_user, $cerca);
            //var_dump($_SESSION['sql_entrades']);

            //guardem a session i eliminem '%' de principi i final
            $_SESSION['cerca'] = substr($cerca,1,-1); 
        }

        $_SESSION['pag'] = 'show_entrades';
    }

    //si get id entrada individual______________________________________
    else if ( isset($_GET['id']) ) {

        //inicialitzem i netegem
        $id_post = test_input($_GET['id']);

        //llegir ids entrades
        //require 'includes/connecta.php';
        $ids = llegir_ids_entrades($con);
        var_dump($ids);

        //control ids existents
        if ( in_array ($id_post,$ids) ) {
            require 'includes/connecta.php';
            $_SESSION['sql_entrada'] = llegirEntrada($con,$id_post);
        } else {
            echo "* FATAL ERROR * entrada inexistent";
            $_SESSION['entrades_error'] = NOEXIST_ENT;
        }

        //posiciona pag
        $_SESSION['pag'] = 'show_entrada';
    }
}

header('Location: index.php');

?>