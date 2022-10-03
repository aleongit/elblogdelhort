<!-- formulari contacte __________________________________________________________ -->
<div class="container-fluid ps-4 ">
    <div class="container-fluid bg-secondary p-2 mb-2 border">
      <h2 id="contacte" class="p-2 bg-dark text-light">Contacte</h2>
    
      <form>
        <div class="form-group col-md-4">
      <label class="pt-3">Motiu</label>
      
      <select id="inputMotiu" class="form-control">
        <option selected>Suport tècnic</option>
        <option>Consulta</option>
        <option>Crítica constructiva</option>
        <option>Crística destructiva</option>
      </select>
    
    </div>
      <div class="form-row">
    
        <div class="form-group col-md-4 mt-3">
          <label>Nom</label>
          <input type="text" class="form-control">
          <!--<small class="form-text text-muted">* MISSATGE ERROR NOM *</small>-->
        </div>
      
      </div>
      <div class="form-group col-md-6 mt-3">
         <label>Mail</label>
         <input type="email" class="form-control">
         <!--<small class="form-text text-muted">* MISSATGE ERROR MAIL *</small>-->
       </div>
    
      <div class="form-group col-md-6 mt-3">
        <label>El teu missatge :)</label>
        <textarea class="form-control" rows="5"></textarea>
        <!--<small class="form-text text-muted">* MISSATGE ERROR TEXTAREA *</small>-->
      </div>
    
      <div class="form-group mt-3">
        <div class="form-check">
          <input class="form-check-input" type="checkbox">
          <label class="form-check-label">
            Accepto les Condicions de Privadesa
          </label>
        </div>
        <!--<small class="form-text text-muted">* MISSATGE ERROR PRIVADESA *</small>-->
      </div>
      
      <!--<button type="submit" class="btn btn-primary mt-3">Envia!</button>-->

      <?php
      //html bootstrap modal per contactar
      require_once 'includes/modal_contacte.php';
      ?>

    </form>
    
    </div>
    </div>
    
    <!-- què fem ? ________________________________________________________ -->
    <div class="container-fluid ps-4">
    <div class="container-fluid bg-white p-2 mb-2 border">
    
      <h2 id = "quefem" class="p-2 bg-dark text-light">Què fem ?</h2>
      <img src="assets/img/NIDEA.jpg" alt="" class="img-thumbnail p-3">
      
      <p class="fw-bold pt-3">Fem un blog amb php</p>
        <ul>
          <li class = "text-decoration-line-through">Fer un registre en el side-bar</li>
          <li class = "text-decoration-line-through">Fer login d'usuaris en el side-bar</li>
          <li class = "text-decoration-line-through">Fer una pàgina d'edició de les dades dels usuaris</li>
          <li class = "text-decoration-line-through">Fer una secció de creació d'entrades per a usuaris identificats</li>
          <li class = "text-decoration-line-through">Llistar les entrades en la pàgina d'inici</li>
          <li class = "text-decoration-line-through">Cal una pàgina d'edició d'entrades per als usuaris autentificats</li>
          <li class = "text-decoration-line-through">Esborrar les entrades</li>
          <li class = "text-decoration-line-through">Afegir un cercador d'entrades a la web</li>
        </ul>
    
        <!-- Divider--> <hr class="my-4" />     
    
        <p class="fw-bold pt-3">01-Afegir Usuaris</p> 
        <ul>
          <li class = "text-decoration-line-through">Realitza la maquetació HTML i CSS del blog</li>
          <li class = "text-decoration-line-through">Fes els includes</li>
          <li class = "text-decoration-line-through">Fes el formulari de registre</li>
          <li class = "text-decoration-line-through">Valida el formulari de registre</li>
          <li class = "text-decoration-line-through">Afegeix usuaris a la BD amb pw amb hash</li>
          <li class = "text-decoration-line-through">Informa dels errors en cas que n'hi hagi</li>
          <li class = "text-decoration-line-through">Comprova les altes la taula usuaris de base de dades </li>
        </ul>

        <!-- Divider--> <hr class="my-4" />     
    
        <p class="fw-bold pt-3">02-Login, Logout i llistar categories</p> 
        <ul>
          <li class = "text-decoration-line-through">Login</li>
          <li class = "text-decoration-line-through">Logout</li>
          <li class = "text-decoration-line-through">Llistar Categories al menú</li>
        </ul>

        <!-- Divider--> <hr class="my-4" />     
    
        <p class="fw-bold pt-3">03-Crear Entrades i Categories</p> 
        <ul>
          <li class = "text-decoration-line-through" >Llistar Entrades</li>
          <li class = "text-decoration-line-through">Crear Categories</li>
          <li class = "text-decoration-line-through">Crear Entrades</li>
          <li class = "text-decoration-line-through">Controlar els errors en la creació de categories/entrades</li>
        </ul>

        <!-- Divider--> <hr class="my-4" />     
    
        <p class="fw-bold pt-3">04-Lliurament Final</p> 
        <ul>
          <li class = "text-decoration-line-through">Edita les dades de l'usuari</li>
          <li class = "text-decoration-line-through">Botó llistar totes les entrades</li>
          <li class = "text-decoration-line-through">Llista les entrades per categories</li>
          <li class = "text-decoration-line-through">Elimina entrada</li>
          <li class = "text-decoration-line-through">Edita entrada</li>
          <li class = "text-decoration-line-through">Fer un formulari de cerca dels títols de les entrades</li>
          <li class = "text-decoration-line-through">Opcional : formulari de contacte i enviament per email</li>
          <li class = "text-decoration-line-through">Comentar el codi</li>
          <li class = "">Fer un vídeo màxim 10' que mostri el funcionament del blog i mostri les parts del codi més interessants</li>
        </ul>
       
    </div>
    </div>
    
    <!-- FOOTER -->
      <footer class="py-4 bg-dark text-white-50 p-3">
        <h5 class="float-end"><a class="btn btn-primary" href="#" role="button">Puja</a></h5>
        <h5>&copy; 2021-22 Aleix Leon - El Blog de l'hort - <a class="link-light" href="mailto:hola@elblogdelhort.com"> hola@elblogdelhort.com </a> &middot; <a class="link-light" href="#">Privacitat</a> &middot; <a class="link-light" href="#">Termes i Condicions</a></h5>
      </footer>
    
    </main>
    
    <!--javascript bootstrap -->
    <script src="assets/js/bootstrap.bundle.js"></script>
    
    </body>
    </html>
    