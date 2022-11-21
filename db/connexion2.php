<?php

$host = "localhost";
//$db = "aws";
$user = "root";
$mp = "";

try {
    $connexion = new PDO("mysql:host=$host;dbname=aws1", $user, $mp);
    // $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // creation de table visiteur dans la base de donnée aws1 avec php 
    $connexion->exec("
    CREATE TABLE user(
        id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        nom VARCHAR(50),
        prenoms VARCHAR(100),
        mail VARCHAR(50)
        )"
    );
    // $connexion->exec($codesqle);
    echo 'la visiteurs a été créée dans la base de donnée aws1 avec succès';

} catch (PDOException $e) {
    echo 'Echec de la connexion : ' .$e->getMessage();
}

?>