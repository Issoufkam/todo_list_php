<?php

if(isset($_POST['submit']))
{
    if(isset($_POST['nom']) AND isset($_POST['prenoms']) AND isset($_POST['mail']))
    {
        if(!empty($_POST['nom']) AND !empty($_POST['prenoms']) AND !empty($_POST['mail']))
        {
            $nom=htmlspecialchars($_POST['nom']);
            $prenoms=htmlspecialchars($_POST['prenoms']);
            $mail=htmlspecialchars($_POST['mail']);

            echo "Bonjour $nom nous votre compte vient d'etre créer avec succèes";
        }
    }
}

?>