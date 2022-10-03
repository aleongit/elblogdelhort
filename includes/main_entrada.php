<!-- caixa gestió entrada _____________________________________________-->

<!-- crear / editar si session 'edit_______________________________-->
<?php 
//echo ( $_SESSION['edita'])??;'' 
//var_dump ( $_SESSION['sql_entrada'])??'';
//echo "<br>".$_SESSION['sql_entrada'][0]['titol'];
?>

<!-- form entrada _______________________________________________________ -->
<div id = 'form_entrada' class="container bg-secondary mb-2">
    <h2 class="p-2 bg-dark text-light">
    <?php echo isset($_SESSION['edita'])?'Edita':'Crea' ?>
        Entrada</h2>

    <div class=" rounded mt-1 font-monospace bg-success bg-success">
        <?php echo ( $_SESSION['fe_ok'])??'' ?>
    </div>

    <div class=" rounded mt-1 font-monospace bg-danger bg-gradient">
        <?php echo ( $_SESSION['fe_error'])??'' ?>
    </div>

    <form method='post' action='entrada.php' enctype="multipart/form-data">
    
        <div class="form-group md-6 mt-3">
            <label >Títol</label>
            <input name='fe_titol' type="text" class="form-control"
                value = 
                    "<?php
                    if ( isset ($_SESSION['fe_inputs']) ) {
                        echo ( $_SESSION['fe_inputs']['fe_titol'] );
                    } else {
                        echo ( $_SESSION['sql_entrada'][0]['titol'] )??'';
                    }
                    ?>">
            <div class=" rounded mt-1 font-monospace bg-danger bg-gradient">
                <?php echo ( $_SESSION['fe_errors']['titol'])??'' ?>
            </div>
        </div>

        <div class="form-group md-6 mt-3">
            <label >Descripció</label>
            <textarea name='fe_des' class="form-control" 
                id="exampleFormControlTextarea1" rows="3" minlength="25"><?php
                    if ( isset ($_SESSION['fe_inputs']) ) {
                        echo ( $_SESSION['fe_inputs']['fe_des'] );
                    } else {
                        echo ( $_SESSION['sql_entrada'][0]['descripcio'] )??'';
                    }
                ?></textarea>
            <div class=" rounded mt-1 font-monospace bg-danger bg-gradient">
                <?php echo ( $_SESSION['fe_errors']['des'])??'' ?>
            </div>
        </div>

        <div class="form-group md-6 mt-3">
            <label >Imatge</label>
        
            <div class ="m-1">
                <img id= "pre" src="
                <?php echo ( $_SESSION['sql_entrada'][0]['imatge'] )??IMG_DEF?>
                " class ="img_petita" >
            </div>

            <script type="text/javascript">
            //per preview al seleccionar imatge
            function preview() {pre.src=URL.createObjectURL(event.target.files[0]);}
            </script>

            <input name='fe_img' type="file" class="form-control" onchange="preview()">
            <div class=" rounded mt-1 font-monospace bg-danger bg-gradient">
                <?php echo ( $_SESSION['fe_errors']['img'])??'' ?>
            </div>
        </div>

        <div class="form-group md-6 mt-3">
            <label >Categoria</label>
            <select name = 'fe_cat' class="form-select form-select-lg mb-3"  aria-label="Default select example">
                <option selected>* Selecciona Categoria *</option>

                <?php
                //llegir categories i llistar-les
                require 'includes/connecta.php';
                $cat = llegirCategories($con);
                var_dump($categories);
                
                for ($i = 0; $i < count($cat); $i++) {

                    //si editar
                    if ( $_SESSION['sql_entrada'][0]['categoria_id'] == $cat[$i]['id']) {
                        echo "<option selected value='".$cat[$i]['id']."'>".$cat[$i]['nom']."</option>";
                    
                      //si errors validació
                    } elseif ( $_SESSION['fe_inputs']['fe_cat'] == $cat[$i]['id'] ) {
                        echo "<option selected value='".$cat[$i]['id']."'>".$cat[$i]['nom']."</option>";
                    
                    }else {
                        echo "<option value='".$cat[$i]['id']."'>".$cat[$i]['nom']."</option>";
                    }
                }
                ?>

            </select>
            <div class=" rounded mt-1 font-monospace bg-danger bg-gradient">
                <?php echo ( $_SESSION['fe_errors']['cat'])??'' ?>
            </div>
        </div>

        <button type="submit" class="btn btn-primary mt-3">
        <?php echo isset($_SESSION['edita'])?'Edita!':'Crea!' ?>
        </button>
    
    </form>

</div>
