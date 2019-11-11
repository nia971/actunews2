<?php
//inclusion de header.php sur la page.
require_once(__DIR__.'/partials/header.php');

/*
    Objectif: Mettre en place le formulaire permettant l'ajout d 'un article dans la base de donnée.
    
    CONSIGNE : 
        1. Mettre en place le formulaire html
        2. Valider le formulaire à l'aide de php
        3. Inserer l'article en BDD sans tenir compte del'image.
        4. BONUS : Gérer l'upload de l'image.
        5. BONUS : Après l'insertion, redirigez l'utilisateur sur l'article nouvellement créer.
*/
//je verifie si mon auteur est en ligne
$auteur = isOnline();
//si il est en lign je le redirige
if($auteur) {
    //il n'y a pas d'auteur connecté!
    //redirection sur la page d'accueil
    redirection ('connexion.php');
}

//--Recuperation des categories
$categories = getCategories();
$id_auteur = $auteur['id'];

$titre = $contenu = $image = null; 
if(!empty($_POST)){

//Récuperation de la saisie de l'utilisateur
    $titre          = $_POST['titre'];
    $contenu        = $_POST['contenu'];
    $image          = $FILES['image'];//!\\Je recuper un fichier avec la super global
    $id_categorie   = $_POST['id_categorie'];
    $id_auteur      =$auteur['id'];

    //traiment du upload (de l'image)
    var_dump($image);
        //Récupération des données e l'image à uploade.
        $fileTMP = $image['temp_name'];//Emplacment temporaire de l'image sur le serveur.

        //Récupération de l'extention de mon image
        //var_dum (pathinfo($image['name'])['extention]);
        //die();

        //Récupération de l'extension de mon image.
        $extention = pathinfo($image['name'])['extension'];
        //Je donne un nom à mon image
        $fileName = slugify($titre) . '.' . $extention;
        //var_dump($fileName);

        //ou on envoi notre image
        //Je definie la destination de mon fichier c'est à dire l'endroit ou stoker mon fichier 
        $destination = __DIR__ . '/assets/umg/article/' .$fileName;
        //Je déplace mon image du dossier temporaire vers mon dossier projet
        move_upload_file($fileTmp, $destination);

        //J'envoi dans ma BDD, le nom de l'image/!\
        $image=$fileName;

    //stopper l'application temporairement
       // die('arret du PHP');

    //Début des verifications
    $errors = [];
    if (empty($titre)) {
    $errors['titre'] = "Vous devez saisir un titre";
    }
    if (!empty($titre)&&strlen($titre)>100){
        $errors['titre'] = "Titre trop long. Pas plus de 100 Caractères";   
    }

    if (empty($titre)) {
    $errors['contenu'] = "Vous devez saisir un contenu";
     } 

     //Fin des vérifications des champs
     if(empty($errors)){

        //S'il n'y a pas d'erreur je continue mon process
        $idArticle = addArticle($id_auteur, $id_categorie, $titre, contenu, $image);
        if ($idArticle) {
            //Si $idArticle ne retoune pas false, alors l'article à bien ete ajouté en BDD. Je redirige l'utilisateur sur le nouvel article
            redirection('article.php?id_article' .$idArticle);
        }

     }
            //var_dump($errors);
}
?>

<div class="p-3 mx-auto text-center">
    <h1 class="display-4">créer un article</h1>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">

            <?php if(!empty($errors)){?>
                <div class="class alert-danger">
                    <strong>Attention, vous devez verifier vos champs</strong><br>
                    <?php foreach($errors as $error){?>
                         <?= $errors ?><br>
                    <?php } ?>
                </div><!--class alert-danger-->
            <?php }?>

            <form methode="POST" enctype="multipart/form-data" class="form-horizontal">
                <div class="form-group">
                    <input type="text"name="titre"class = "form-control" 
                    value="<?$titre ?>"
                    placeholder="titre de l'articlee." >              
                </div><!--form-group--> 
                <div class="form-group">
                    <select class="form-control" name="id_categorie">
                        <?php foreach ($categories as $categorie){ ?>
                            <option <?= ($categorie['id']==$id_categorie) ? 'selected' : ''?>
                                value="<?=$categorie['id'] ?>">
                                <?= $categorie['nom']?>
                            </option>
                        <?php } ?>
                    </select>>              
                </div><!--form-group-->
                <div class="form-group">
                    <textarea name="contenu"
                        placeholder="saisissez votre contenu"  
                        class="form-control"><?=$contenu ?></textarea>
                    <script>
                        CKEDITOR.replace( 'contenu' );
                    </script>
                </div><!--form-group-->

                <div class="form-group">
                            <input type="file" name="image"
                            class="forme-control-file">
                </div><!--form-group-->
                <button class="btn btn-block btn-dark">
                    Pulier mon Article
                </button>
            </form><!--"POST"class="form-horizontal-->

        </div><!--col-md-8 offset-md-2-->  
    </div><!--row-->
</div><!--container-->


<?php
//inclusion de footer.php sur la page.
require_once(__DIR__.'/partials/footer.php');
?>
