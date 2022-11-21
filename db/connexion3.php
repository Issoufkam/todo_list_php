<?php

$host = "localhost";
$user = "root";
$pm = "";

try {
    $connect = new PDO("mysql:host=$host;dbname=aws1", $user, $pm);
    echo "Connexion reussi";
}

catch (PDOException $th) {
    echo "Echec de la connexion a la base de donnée" .$th->getMessage();
}

?>