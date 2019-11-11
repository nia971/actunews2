<?php
/*
    CONSIGNE : Créer 3 fonctions
    1.getArticle() Permet de retourner tous les articles de la base. 
    2.getArticleById : Permet de récuperer un article grâce à son ID. 
    3.getArticlesByCategorieId() : Permet de récuperer les articles d'une catégorie, grace à ID de la catégorie

*/

/**
 * Retourne les article de la base e donnée (BDD)
 */

function getArticles(){
    global $db;

    $query = $db->query('SELECT * FROM article, auteur WHERE article.auteur_id = auteur.id ORDER BY article.id DESC'); 
    
    return $query ->fetchAll();
}
/**
 * Retourne l'article de la base ayant l'id passé en paramètre.
 */
function getArticleById($article_id) {

    global $db;

    $sql = 'SELECT * FROM article WHERE id = :id';
    $query = $db->prepare($sql);
    $query->bindValue(':id', $article_id);
    $query->execute();

    return $query->fetch();
}
/**
 * Retourne les articles appartenant à l'ID de la categorie passée en parametre */

function getArticlesByCategorieId($categorie_id) {

    global $db;
     
    $sql = 'SELECT * FROM article, auteur WHERE article.auteur_id = auteur.id AND categorie_id = :id'; 

    $query=$db->prepare($sql);
    $query->bindValue(':id',$categorie_id);
    $query->execute();

    return $query->fetchAll();
}

/**
 * Permet l'insertion un nouvel article dans la base de données
 */
function AddArticle ($auteur_id,$categorie_id, $titre, $contenu, $image) {
    global $db;
    $query = $db->prepare('
        INSERT INTO article (titre, contenu, image, auteur_id, categorie_id)
        VALUES (:titre, :contenu, :image, :auteur_id,: categorie_id)
    ');

    $query->bindValue(':titre', $titre, PDO::PARAM_STR);
    $query->bindValue(':contenu', $contenu, PDO::PARAM_STR);
    $query->bindValue(':image', $image, PDO::PARAM_STR);

    $query->bindValue(':auteur_id', $auteur_id, PDO::PARAM_INT);
    $query->bindValue(':categorie_id', $categorie_id, PDO::PARAM_INT);

    //Si mon article à bien été inséré dans la BDD. Alors je retourne l'ID de l'article. Sinon je retourne faux... 
    return $query->execute() ? $db->lastInsertId() : false;


}
