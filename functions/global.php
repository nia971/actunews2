<?php

/*
Nous pouvons definir ici toutes les fonctions utiles à notre 
projet et utilisable sur toute les pages.
*/

//Démarrage de la session PHP
session_start();

/**
 * Permet de rediriger un utilisateur 
 *sur une nouvelle page.
 */
function redirection($page){
    header ('Location:' .$page);
}
/**
 * Permet de verifier si un auteur est connecté en session.
 * Retourne oui si utilisateur est connecté non si ce n 'est pas le cas
 */
function isOnline(){
    return isset ($_SESSION['auteur']) ?$_SESSION['auteur']: false;
}


/**
 * Permet de générer un accroche
 */

function summarize($text) {
    //Suppression des balises HTML 
    $string = strip_tags($text);

    //Si mon string est superieur à 150, je continue
    if (strlen($string) > 150){

        //Je coupe ma chauine à 150
        $stringCut = substr($string, 0, 150);

        //Je m'assure de ne pas couper un mot.
        //en cherchant la position du dernier espace.
        $string = substr($stringCut, 0, strrpos ($stringCut, ''));      

    }
    return $string .'...';
}


?>