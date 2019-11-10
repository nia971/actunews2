<?php
// Inclusion de header.php sur la page.
require_once(__DIR__.'/partials/header.php');

$email = $password = null;

if(!empty($_POST)) {

    $email      = $_POST['email']; 
    $password   = $_POST['password']; 
    $errors = [];

    if(empty($email)) {
        $errors['email'] = 'Vous avez oublié votre email';
    }

    if(empty($password)) {
        $errors['password'] = 'Vous avez oublié votre mot de passe';
    }

    if(empty($errors)) {

        // -- Début du processus de connexion
        if(connexion($email, $password)) {

            // L'utilisateur est bien connecté.
            // La fonction connexion a retourné true.
            redirection('.');

        } else {

            // Problème avec l'authentification.
            // La fonction connexion a retourné false.
            $errors['email'] = "Email / Mot de passe incorrect.";

        }
    }
}

?>

<div class="p-3 mx-auto text-center">
    <h1 class="display-4">Connexion</h1>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">

            <?php if (isset($_GET['inscription'])) { ?>
                <div class="alert alert-success">
                    Félicitation, vous pouvez maintenant
                    vous connecter.
                </div>
            <?php } ?>
            <form method="POST" class="form-horizontal">
            <div class="form-group">
                    <input type="email" 
                        class="form-control <?= isset($errors['email']) ? 'is-invalid' : '' ?>"
                        name="email"
                        value="<?= $email ?? $_GET['email'] ?? '' ?>"
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
                <button class="btn btn-block btn-primary">
                    Connexion
                </button>
            </form>
        </div>
    </div>
</div>

<?php
// Inclusion de footer.php sur la page.
require_once(__DIR__.'/partials/footer.php');
?>