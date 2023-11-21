<?php
    if ($_SESSION['CONNECTER']=="OK") 
    {
        $titre = "Bowling du Front de Mer - Profil";
        $contenu = "<h1 class='font-Roboto text-4xl text-center'>Bienvenue <strong>$username</strong> !</h1>";
    } else {
        include("vue/vueAcceuil");
    }
    
    include "template.php";
    ?>