<!-- caixa el meu compte _____________________________________________-->

<?php
//recuperar dades user session
//var_dump( $_SESSION['usuari'] );
?>

<!-- form el meu compte/user____________________________________________ -->
<div id = 'form_compte' class="container bg-secondary mb-2">
    <h2 class="p-2 bg-dark text-light">El Meu Compte</h2>

    <div class=" rounded mt-1 font-monospace bg-success bg-success">
        <?php echo ( $_SESSION['fu_ok'])??'' ?>
    </div>

    <div class=" rounded mt-1 font-monospace bg-danger bg-gradient">
        <?php echo ( $_SESSION['fu_error'])??'' ?>
    </div>

    <form method='post' action='user_edita.php' >
    
        <div class="form-group md-6 mt-3">
            <label >Nom</label>
            <input name='fu_nom' type="text" class="form-control"
                value = "<?php echo ( $_SESSION['usuari']['nom'] )??'' ?>">
            <div class=" rounded mt-1 font-monospace bg-danger bg-gradient">
                <?php echo ( $_SESSION['fu_errors']['nom'])??'' ?>
            </div>
        </div>

        <div class="form-group md-6 mt-3">
            <label >Cognoms</label>
            <input name='fu_cognoms' type="text" class="form-control"
                value = "<?php echo ( $_SESSION['usuari']['cognom'] )??'' ?>">
            <div class=" rounded mt-1 font-monospace bg-danger bg-gradient">
                <?php echo ( $_SESSION['fu_errors']['cognoms'])??'' ?>
            </div>
        </div>

        <div class="form-group md-6 mt-3">
            <label >Mail</label>
            <input name='fu_mail' type="email" class="form-control" 
                value = "<?php echo ( $_SESSION['usuari']['email'] )??'' ?>" >
            <div class=" rounded mt-1 font-monospace bg-danger bg-gradient">
                <?php echo ( $_SESSION['fu_errors']['mail'])??'' ?>
            </div>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Update!</button>
    
    </form>

</div>
