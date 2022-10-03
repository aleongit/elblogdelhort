<!-- caixa lateral ____________________________________________________ -->
<div class="col-md-4">

<!-- si login, 'caixa user' -->
<?php //echo isset( $_SESSION['usuari'] )? 'BENVINGUT '.$_SESSION['usuari']['nom']:''; ?>

<?php if ( isset( $_SESSION['usuari'] ) ) {
  require_once 'includes/sidebar_user.php';
} else {
  require_once 'includes/sidebar_home.php';
} ?>

<!-- fi contenidor lateral-->
</div>

<!-- tanca alguna cosa que no està aquí-->
</div>

<!-- per refresc navegador -->
<?php neteja_form(); ?>