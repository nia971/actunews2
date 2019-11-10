
<?php 
// Inclusion de headerr.php sur la page.
require_once(__DIR__.'/partials/header.php');
?>

<?php 

     // Récupération du nom de la catégorie dans l'URL.
     $id_categorie = (isset($_GET['id_categorie'])) ? $_GET['id_categorie'] : '';
?>
<?php
      //Récuperation du nom de la categorie dans l'URL.
      $nom_categorie = (isset($_GET['nom_categorie'])) ? $_GET
      ['nom_categorie'] : '';
?>
<?php
      // Récupération de l'ID de la catégorie dans l'URL.
      $id_categorie = (isset($_GET['id_categorie'])) ? $_GET
      ['id_categorie'] : 0;

      //Je récupère les articles de la categorie
      $articles = getArticlesByCategorieId($id_categorie);

?>



<div class="p-3 mx-auto text-center">
     <h1 class="display-4"><?php echo  $_GET['nom_categorie']; ?></h1>
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
                                <a href="#" class="btn btn-primary">
                                    Lire la suite
                                </a>
                               
                            </div><!--/.d-flex -->
                        </div><!--Card body-->
                    </div><!---Card-->
                </div><!--fin col-->
            <?php } //Fin du foreach $articles ?>
        </div><!--fin row-->
    </div><!--fin container-->
</div><!--fin bg-light-->

<?php 
// Inclusion de footer.php sur la page.
require_once(__DIR__.'/partials/footer.php');
?>