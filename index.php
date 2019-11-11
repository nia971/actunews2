<?php
//inclusion de header.php sur la page.
require_once(__DIR__.'/partials/header.php');

//Récuperation des article de la base.
$articles = getArticles();
?>

<!-- Ici viendra le contenu de ma page-->
<div class="p-3 mx-auto text-center">
    <h1 class="display-4">ActuNews</h1>
</div>

<div class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <?php foreach ($articles as $article){ ?>
                <div class="col-md-4 mt-4">
                    <div class="card shadow-sm">
                        <img src="assets/img/article/<?= $article ['image'] ?>" 
                            class="card-img-top" alt="<?= $article['titre']?>">
                        <div class="card-body">
                            <h5 class="card-title">
                                <?= $article['titre']?>
                            </h5>
                            <p class="card-text">
                                <?= summarize($article['contenu']) ?>
                            </p>
                            <div class="d-flex justity-content-between align-items-center">
                                <a href="article.php?id_article=<?= $article['id'] ?>" class="btn btn-primary">
                                    Lire la suite
                                </a>
                                <small class="text-muted">
                                    <?= $article['prenom'] .' '. $article['nom']?>
                                </small>
                            </div><!--/.d-flex -->
                        </div><!--Card body-->
                    </div><!---Card-->
                </div><!--fin col-->
            <?php } //Fin du foreach $articles ?>
        </div><!--fin row-->
    </div><!--fin container-->
</div><!--fin bg-light-->

<?php
//inclusion de footer.php sur la page.
require_once(__DIR__.'/partials/footer.php');
?>
