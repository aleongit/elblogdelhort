
<!-- caixa gestió categories _____________________________________________-->
    
<!-- form categoria _______________________________________________________ -->
<div id = 'form_categoria' class="container bg-secondary mb-2">
    <h2 class="p-2 bg-dark text-light">Crea Categoria</h2>

    <div class=" rounded mt-1 font-monospace bg-success bg-success">
        <?php echo ( $_SESSION['fc_ok'])??'' ?>
    </div>

    <div class=" rounded mt-1 font-monospace bg-danger bg-gradient">
        <?php echo ( $_SESSION['fc_error'])??'' ?>
    </div>

    <form method='post' action='categoria_crea.php'>
    
        <div class="form-group md-6 mt-3">
        <label >Nom Categoria</label>
        <input name='fc_nom' type="text" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary mt-3">Crea!</button>
    
    </form>

</div>

