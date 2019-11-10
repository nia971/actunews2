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
 * Retourne les articles appartenant à l'ID de la categorie passée en parametre
 */

function getArticlesByCategorieId($categorie_id) {

    global $db;
     
    $sql = 'SELECT * FROM article, auteur WHERE article.auteur_id = auteur.id AND categorie_id = :id'; 

    $query=$db->prepare($sql);
    $query->bindValue(':id',$categorie_id);
    $query->execute();

    return $query->fetchAll();
}
