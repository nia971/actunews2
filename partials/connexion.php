<?php
//inclusion de header.php sur la page.
require_once(__DIR__.'/partials/header.php');
?>


<div class="p-3 mx-auto text-center">
    <h1 class="display-4">Connexion</h1>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <form methode="POST" class="form-horizontal">
               <div class="form-group">
                    <input type="email" class="form-control"
                        placeholder="email.">                    
               </div>
               <div class="form-group">
                    <input type="passeword" class="form-control"
                        placeholder="Mot de passe.">                    
               </div>  
               <button class="btn btn-block btn-primary">
                    Connexion
               </button>
            </form>
        </div>    

    </div>
</div>

<?php

//inclusion de footer.php sur la page.
require_once(__DIR__.'/partials/footer.php');
?>
