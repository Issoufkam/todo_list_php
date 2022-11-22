<?php

$host = "localhost";
//$db = "aws";
$user = "id19889089_kam";
$mp = "YM4b0ldBLwIf[-aO";

try {
    $connexion = new PDO("mysql:host=$host;dbname=aws", $user, $mp);
    // $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // creation de la base de donnée avec php 
   // $connexion->exec("SET NAMES utf8");
   // echo 'la base de donnée a été créée avec succès';

} catch (PDOException $e) {
    echo 'Echec de la connexion : ' .$e->getMessage();
}

?>