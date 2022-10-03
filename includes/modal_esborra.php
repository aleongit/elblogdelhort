
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary m-2 px-4" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Eliminar
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Eliminar Entrada ?</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Segur que eliminem entrada ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">És de sabis rectificar</button>
        <!--<button type="button" class="btn btn-primary">Elimina</button>-->
        <a class='btn btn-primary m-2 px-4' 
                href='entrada_elimina.php'>Elimina</a>
      </div>
    </div>
  </div>
</div>