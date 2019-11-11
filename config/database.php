
<?php
try {
    $db = new PDO(
        'mysql:host=localhost;dbname=actunews', 
        'root', 
        '', 
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]
    );
} catch(Exception $erreur) {
    echo 'Echec de connexion : ' . $erreur->getMessage();
    exit; // Arrêt du script en cas d'erreur de connexion à la BDD.
}