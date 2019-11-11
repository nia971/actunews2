<?php
  //Inclusion du fichier global.
  require_once(__DIR__ .'/../functions/global.php');

  //Inclusion du fichier database.
    require_once(__DIR__ .'/../config/database.php');

    //Inclusion de nos fonctions.
    require_once(__DIR__ .'/../functions/categorie.php');
    require_once(__DIR__ .'/../functions/article.php');
    require_once(__DIR__ .'/../functions/auteur.php');

    //Récuperation des catégories de la base de données
    //$categories = ['Politique', 'Economie', 'Culture', 'Sports'];

    //Récuperation des catégories de la base
      
    $categories = getCategories();
    //Si un auteur est essin, alors $auteur prendra comme valeur le 

    $auteurIsLogged = isOnline();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>ActuNews Premier site d'actualité en France</title>

    <!--BOOTSTRAP CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <!--Style personalisés-->
    <link rel="stylesheet" href="asset/css/style.css">
 
</head>
<body>

    <!--Menu du site-->

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">ActuNews</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
        <a class="nav-item nav-link active" href="index.php">Accueil <span class="sr-only">(current)</span>
        </a>
     <!--Les catégories du site-->
     <?php foreach($categories as $categorie) {?>
        <a class="nav-item nav-link active" 
            href="categorie.php? nom_categorie=<?= $categorie['nom'];?>&id_categorie=<?= $categorie['id']?>">
            <?= $categorie['nom']?>
        </a>
        
    <?php } //fin de foreach sur $categories ?>

          <?php if ($auteurIsLogged) { ?>

          <span class="navbar-tex mx-2">
            Bonjour <strong><?= $auteurIsLogged['prenom']; ?></strong>
          </span >

        <a class="nav-item btn btn-outline-primary mx-2 " href="deconnexion.php">
           Déconnnexion 
        </a>
            <?php} else{ ?>
        <a class="nav-item btn btn-outline-primary mx-2 " href="connexion.php">
           Connnexion 
        </a>
        <a class="nav-item btn btn-outline-primary mx-2" href="inscription.php">
           Inscription
        </a>
        <?php } ?>
    </div>
  </div>
</nav>
<!--Fin du Menu du site-->