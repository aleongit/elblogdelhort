
<!-- si no login 'caixa home' -->

<!-- form login _______________________________________________________ -->
<div id = 'form_login' class="container bg-secondary p-2 mb-2 border">
    <h2 class="p-2 bg-dark text-light">Identifica't</h2>
    <div class=" rounded mt-1 font-monospace bg-success bg-success">
        <?php echo ( $_SESSION['fl_ok'])??'' ?>
    </div>
    <div class=" rounded mt-1 font-monospace bg-danger bg-gradient">
        <?php echo ( $_SESSION['fl_error'])??'' ?>
    </div>

    <form method='post' action='login.php'>
    
        <div class="form-group md-6 mt-3">
        <label >Mail</label>
        <input name='fl_mail' type="email" class="form-control">
        </div>

        <div class="form-group md-4 mt-3">
        <label>Contrasenya</label>
        <input name='fl_pass' type="password" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary mt-3">Login!</button>
    
    </form>

</div>

<!-- form registre____________________________________________________ -->
<div id ='form_registre' class="container bg-secondary p-2 mb-2 border">
    <h2 class="p-2 bg-dark text-light">Registra't</h2>
    <div class=" rounded mt-1 font-monospace bg-success bg-success">
        <?php echo ( $_SESSION['fr_ok'])??'' ?>
    </div>
    <div class=" rounded mt-1 font-monospace bg-danger bg-gradient">
        <?php echo ( $_SESSION['fr_error'])??'' ?>
    </div>

        <form method='post' action='registre.php'>
    
            <div class="form-row">
                <div class="form-group md-4 mt-3">
                    <label>Nom</label>
                    <input name='fr_nom' type="text" class="form-control"
                        value = "<?php echo ( $_SESSION['fr_inputs']['fr_nom'] )??'' ?>" >
                    <div class=" rounded mt-1 font-monospace bg-danger bg-gradient">
                    <?php echo ( $_SESSION['fr_errors']['nom'])??'' ?>
                    </div>
                </div>

                <div class="form-group md-4 mt-3">
                    <label>Cognoms</label>
                    <input name='fr_cognoms' type="text" class="form-control"
                        value = "<?php echo ( $_SESSION['fr_inputs']['fr_cognoms'] )??'' ?>" >
                    <div class=" rounded mt-1 font-monospace bg-danger bg-gradient">
                    <?php echo ( $_SESSION['fr_errors']['cognoms'])??'' ?>
                    </div>
                </div>
            </div>

            <div class="form-group md-6 mt-3">
                <label >Mail</label>
                <input name='fr_mail' type="text" class="form-control" 
                    value = "<?php echo ( $_SESSION['fr_inputs']['fr_mail'] )??'' ?>" >
                <div class=" rounded mt-1 font-monospace bg-danger bg-gradient">
                    <?php echo ( $_SESSION['fr_errors']['mail'])??'' ?>
                </div>
            </div>

            <div class="form-group md-4 mt-3">
                <label>Contrasenya</label>
                <input name='fr_pass' type="password" class="form-control">
                <div class=" rounded mt-1 font-monospace bg-danger bg-gradient">
                    <?php echo ( $_SESSION['fr_errors']['pass'])??'' ?>
                </div>
            </div>

            <div class="form-group mt-3">
                <div class="form-check">
                    <input name='fr_privadesa' class="form-check-input" type="checkbox">
                    <label class="form-check-label" >
                    Accepto les Condicions de Privadesa
                    </label>
                </div>
                <div class=" rounded mt-1 font-monospace bg-danger bg-gradient ">
                    <?php echo ( $_SESSION['fr_errors']['privadesa'])??'' ?>
                </div>
            </div>
            
            <button type="submit" class="btn btn-primary mt-3">Registre!</button>
    </form>

</div>

<!-- tanca divs altres php anteriors -->
</div>
</div>