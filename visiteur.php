<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

        include_once('index.php');

        $visiteur1 = new Visiteur;
        $visiteur2 = new Visiteur;

        $visiteur1->set_prenoms('Sie');
        $visiteur2->set_prenoms('Siriki');

        echo 'Bonjour'. $visiteur1->get_prenoms(). '<br/>';
        echo 'Bonjour'. $visiteur2->get_prenoms();

    ?>
</body>
</html>