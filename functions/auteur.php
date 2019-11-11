<?php

/*
    Dans ce fichier nous allons définir quelques fonctions qui seront utiles pour gérer nos auteurs (membres)

    - Vérifier l'existance d'un membre dans la base
    - Inscrire un Membre
    - Connecter un membre
    - Deconnexion
*/
/**
 * Permet l'inscription d'un auteur / membre dans la BDD
 * retourne true ou  (oui) si l'insertion à été faite correstement
 * Retourne false ou  (non) si un erreur est survenue
 */
    function inscription($prenom, $nom, $email, $password){
        global $db;

        $query = $db->prepare('
            INSERT INTO auteur(prenom, nom, email, password)
                VALUE (:prenom, :nom, :email, :password)
        ');

        $query->bindValue(':prenom', $prenom, PDO::PARAM_STR);
        $query->bindValue(':nom', $nom, PDO::PARAM_STR);
        $query->bindValue(':email', $email, PDO::PARAM_STR);
        $query->bindValue(':password',password_hash($password, PASSWORD_DEFAULT), PDO::PARAM_STR);

        return $query->execute();

    }
    /**
     * Permet la connexion d' un utilisateur.
     * Le stockage de ses informations en session !
     * retourne true ou  (oui) si l'insertion à été faite correstement
     * Retourne false ou  (non) si un erreur est survenue
     */

    function connexion($email, $password){

        global $db;
        $sql = 'SELECT * FROM auteur WHERE email = :email';
        $query = $db->prepare($sql);
        $query->bindValue('email', $email, PDO::PARAM_STR);
        $query->execute();

        //Récuperation de l'auteur dans la base
        $auteur = $query->fetch();
        //On veerifie si un auteur à bien été trouver et que dans le meme temp, le mot de pass" saisie par l'utilisateur dans le formulaire correspond au mot de passe de l'auteur trouvé dans BDD.
        if ($auteur && password_verify($password, $auteur['password'])){

            //Mettre en session les infromation de l'auteur
            $_SESSION['auteur'] = $auteur; // je stock dans ma session PHP à la clé auteur,mon tableau associatif $auteur.

            return true;
        }

        return false;

    }

?>