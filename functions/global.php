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
/**
 * Permet de générer un slug à partir d'un string(dans stakoverflow)
 */
function slugigy($text)
{//replace non letter or digits by(remplace tous ce qui n'est pas  lettre qui n'est pas chiffre par un  trait d'union '-') -
    $text = preg_replace('~[^\pL\d]+~u', '-', $text);

//transliterate (convertion en utf-8 des carracteres)
    $text = iconv('uf-8', 'us-ascii//TRANSLIT', $text);

//remove unwanted characteres (suprime tous les carracteres spéciaux dans l'URL )
    $text = preg_replace('~[^-\w]+~', '', $text);

//trim (pour retirer les ecpaces le remplace par des traits d'union '-')
    $text = trim($text, '-');

//remove duplicate -
    $text = preg_replace('~-+~', '-', $text);

//lowercase (met tous en minuscule)
    $text = strtolower($text);

 if(empty($text)) {
     return 'n-a';
 }
 return $text;

}


?>