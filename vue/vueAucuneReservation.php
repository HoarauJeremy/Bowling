<?php
    $titre = "Vos réservations - Bowling du Front de Mer"; 
    $contenu = "<div class='flex flex-col items-center text-center'>";
        $contenu .= "<h1 class='font-Roboto font-extrabold text-2xl'>Vous n'avez effectué aucune réservation à ce jour.</h1>";
        $contenu .= "<img src='media/images/LogoNoReservation.png' alt='Your Logo' width='350' height='350' class=''>";
        $contenu .= "<button class='font-Roboto font-extrabold text-2xl bg-red-800 text-white my-3.5 px-10 h-16 w-auto border-none cursor-pointer rounded-full hover:bg-red-900 hover:border-solid hover:border-spacing-0.5'><a href='index.php'>Retour</a></button>";
    $contenu .= "</div>";

    include "template.php";
?>  