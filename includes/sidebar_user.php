
<!-- caixa user ______________________________________________________________ -->
<div class="caixa_user container bg-secondary p-2 mb-2 border">

    <h2 class="p-2 bg-dark text-light">
        <?php echo'Benvingut/da '.$_SESSION['usuari']['nom']. " :)"; ?>
    </h2>
        
    <ul class="nav flex-column ">
        <li class="nav-item">
        <a class="nav-link" href="redirect.php?pag=compte">El meu Compte</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="redirect.php?pag=categories">+ Categoria</a>
        </li>
        <li class="nav-item">
        <a class="nav-link " href="redirect.php?pag=entrades">+ Entrada</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a>
        </li>
    </ul>

</div>

<!-- tanca divs altres php anteriors -->
</div>
</div>