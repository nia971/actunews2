<?php
// Inclusion de header.php sur la page.
require_once(__DIR__.'/partials/header.php');

$prenom = $nom = $email = $password = $cfPassword = null;

if(!empty($_POST)) {

    $prenom     = $_POST['prenom']; 
    $nom        = $_POST['nom']; 
    $email      = $_POST['email']; 
    $password   = $_POST['password']; 
    $cfPassword = $_POST['cf-password']; 

    $errors = [];

    if(empty($prenom)) {
        $errors['prenom'] = 'Vous avez oublié votre prénom';
    }

    if(empty($nom)) {
        $errors['nom'] = 'Vous avez oublié votre nom';
    }

    if(empty($email)) {
        $errors['email'] = 'Vous avez oublié votre email';
    }

    if(!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Vérifiez le format de votre email';
    }

    if(empty($password)) {
        $errors['password'] = 'Vous avez oublié votre mot de passe';
    }

    if($password !== $cfPassword) {
        $errors['password'] = 'Les mots de passe ne correspondent pas';
    }

    if(empty($errors)) {
        
        // -- Je procède à l'inscription en base.
        if(inscription($prenom, $nom, $email, $password)) {
            // -- Puis redirection sur la page de connexion.
            redirection('connexion.php?inscription=success&email=' . $email);
        }
    }
}

?>

<div class="p-3 mx-auto text-center">
    <h1 class="display-4">Inscription</h1>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <form method="POST" class="form-horizontal">
                <div class="form-group">
                    <input type="text" 
                        class="form-control <?= isset($errors['prenom']) ? 'is-invalid' : '' ?>"
                        name="prenom"
                        value="<?= $prenom ?>"
                        placeholder="Prénom.">
                        <div class="invalid-feedback">
                            <?= isset($errors['prenom']) ? $errors['prenom'] : '' ?>
                        </div>
                </div>
                <div class="form-group">
                    <input type="text" 
                        class="form-control <?= isset($errors['nom']) ? 'is-invalid' : '' ?>"
                        name="nom"
                        value="<?= $nom ?>"
                        placeholder="Nom.">
                        <div class="invalid-feedback">
                            <?= isset($errors['nom']) ? $errors['nom'] : '' ?>
                        </div>
                </div>
                <div class="form-group">
                    <input type="email" 
                        class="form-control <?= isset($errors['email']) ? 'is-invalid' : '' ?>"
                        name="email"
                        value="<?= $email ?>"
                        placeholder="Email.">
                        <div class="invalid-feedback">
                            <?= isset($errors['email']) ? $errors['email'] : '' ?>
                        </div>
                </div>
                <div class="form-group">
                    <input type="password" 
                        class="form-control <?= isset($errors['password']) ? 'is-invalid' : '' ?>"
                        name="password"
                        placeholder="Mot de passe.">
                        <div class="invalid-feedback">
                            <?= isset($errors['password']) ? $errors['password'] : '' ?>
                        </div>
                </div>
                <div class="form-group">
                    <input type="password" 
                        class="form-control <?= isset($errors['password']) ? 'is-invalid' : '' ?>"
                        name="cf-password"
                        placeholder="Confirmer le Mot de passe.">
                </div>
                <button class="btn btn-block btn-primary">
                    M'inscrire !
                </button>
            </form>
        </div>
    </div>
</div>

<?php
// Inclusion de footer.php sur la page.
require_once(__DIR__.'/partials/footer.php');
?>