<?php require_once 'includes/helpers.php'; ?>
<?php require 'includes/connecta.php'; ?>

<!-- contenidor principal _______________________________________________ -->
<div class="container-fluid p-4">
    
    <!-- contenidor row ____________________________________________________ -->
    <div class="row ">
    
        <!-- caixa principal ____________________________________________________ -->
        <div class="col-md-8 ">
        
            <!-- contingut dinàmic caixa + posts _____________________________________ -->
            <div class="container p-2 mb-2 border bg-secondary ">
                         
            <?php
            //var_dump($_SESSION['pag']);
            //var_dump($_SESSION['sql_entrades']);

            //si no hi ha pag, posiciona
            if ( !isset ($_SESSION['pag']) ) $_SESSION['pag']='show_entrades';

            if( !isset($_SESSION['error_mysql']) ) {

                //caixa gestió categories ________________________________________
                if ( $_SESSION['pag'] == 'categories'  ) {
                    require_once 'includes/main_categoria.php';

                //caixa crea entrades __________________________________________
                } elseif ( $_SESSION['pag'] == 'entrades' )  {
                    require_once 'includes/main_entrada.php';
        
                //caixa el meu compte user
                } elseif ( $_SESSION['pag'] == 'compte' )  {
                    require_once 'includes/main_compte.php';

                } 
                elseif ( $_SESSION['pag'] == 'show_entrada' ) {

                    //control errors
                    if ( ! isset($_SESSION['entrades_error']) ) {
                    
                        //show entrada individual_________________________________
                        if ( isset($_SESSION['sql_entrada']) ) {

                            //var_dump( $_SESSION['sql_entrada'] );
                            // 'Post' individual
                            mostraEntrada($_SESSION['sql_entrada']); 
                        }

                    } else {  
                        //echo $_SESSION['entrades_error'];
                        alert($_SESSION['entrades_error']);
                    }
                }
                elseif ( $_SESSION['pag'] == 'show_entrades' ) {

                //control errors
                    if ( ! isset($_SESSION['entrades_error']) ) {

                        //decidim entrades
                        if ( isset($_SESSION['sql_entrades']) ) {
                            //var_dump( $_SESSION['sql_entrades'] );
                            $entrades = $_SESSION['sql_entrades'];

                        } else {
                            //llegir entrades per defecte amb LÍMIT
                            //echo "* llegir entrades defecte<br>";
                            $entrades = llegirEntrades($con, LIM_MIN);
                        }
                        
                        //mostra entrades
                        if ( ! empty($entrades) ) {
                                // llista 'Post preview' amb limit
                                mostraEntrades($entrades); 
                        } else {
                                //echo "* FATAL ERROR * 0 entrades";
                                alert(ERROR_0);
                        } 
                    } else {  
                        //echo $_SESSION['entrades_error'];
                        alert($_SESSION['entrades_error']);
                    }
                }
            } else {
                //echo $_SESSION['error_mysql'] ;
                alert($_SESSION['error_mysql']);
            }
                ?>
                
        <!-- fi col _______________________________________________-->
        </div>
    <!-- fi row ___________________________________________________-->
    </div>

<!-- div contenidor principal es tanca a un altre fitxer -->