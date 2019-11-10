<?php
//inclusion de header.php sur la page.
require_once(__DIR__.'/partials/header.php');

//si mon paramètre id_article n'existe pas dans la route. j'affecte la valeur 0. Ainsi, ma requète ne retournera aucun résultat.
//$id_artcile = (isset($_GET['id_article'])) ? $_GET['id_categorie']: 0;
//$artcile = getArticleById($_GET['id_article']??0);

//Ou plus simplement :
$article = getArticleById($_GET['id_article'] ?? 0);

//article.php?idarticle=1
//var_dump($article);
?>


<!-- Ici viendra la contenu de ma page-->

<div class="p-3 mx-auto text-center">
    <h1 class="display-4"><?= $article['titre'] ?></h1>
</div>

<div class="py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img class="img-fluid" src="assets/img/article/<?= $article [ 'image' ] ?>" alt ="<?= $article['titre'] ?>" >
                </div><!--class col-md-6-->
                <div class="col-md-6">
                    <? $article['contenu'] ?>
                </div><!--class col-md-6-->
            </div><!--row-->
        </div><!--container-->
    </div><!--bg-light-->


<?php

//inclusion de footer.php sur la page.
require_once(__DIR__.'/partials/footer.php');
?>
