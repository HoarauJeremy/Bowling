<?php
session_start();
if ($_SESSION['CONNECTER']=="OK") {
    $titre = "Bowling du Front de Mer - Profil";
    $contenu = "<h1>BONJOUR</h1>";
    include "template.php";
} else {
    
}
?>