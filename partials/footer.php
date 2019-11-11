<!-- Emmet : .container>footer.mt-4.pt-4.border-top>.row>.col-12.col-md+(.col-6.col-md)*2 -->

<div class="container">
    <footer class="mt-4 pt-4 border-top">
        <div class="row">
            <div class="col-12 col-md">
                <h5>ActuNews</h5>
                <small class="d-block text-muted">
                    &copy; <?= date('Y') ?>
                </small>
            </div>
            <div class="col-6 col-md">
                <h5>Catégories</h5>
                <ul class="list-unstyled">
                    <?php foreach($categories as $categorie) { ?>
                        <li>
                        <a class="nav-item nav-link active" 
                            href="categorie.php? nom_categorie=<?= $categorie['nom'];?>&id_categorie=<?= $categorie['id']?>">
                            <?= $categorie['nom']?>
                        </a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
            <div class="col-6 col-md">
                <h5>En Plus</h5>
                <ul class="list-unstyled">
                    <li><a href="#" class="text-muted">Mentions Légales</a></li>
                    <li><a href="#" class="text-muted">Confidentialité</a></li>
                    <li><a href="#" class="text-muted">Plan du Site</a></li>
                </ul>
            </div>
        </div>
    </footer>
</div>

<!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<!--CKEditor4 CDN-->
<script src="https://cdn.ckeditor.com/4.13.0/full/ckeditor.js"></script>

<!-- Fichier JS Personnalisé -->
<script src="assets/js/script.js"></script>

</body>
</html>