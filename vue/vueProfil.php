<?php
    if ($_SESSION['CONNECTER']=="OK") 
    {
        $titre = "Bowling du Front de Mer - Profil";
        $contenu = "<h1>BONJOUR</h1>";
    } else {
        include("vue/vueAcceuil");
    }
    
    include "template.php";
    ?>