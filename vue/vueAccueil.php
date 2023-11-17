<?php

    $titre = "Accueil";

    $contenu = "
        <div class='w-full h-full'>
            <div class='h-96 flex items-center justify-center bg-gray-200'>
                <h1 class='text-center text-4xl font-semibold break-all'>Le Bowling du Front de Mer</h1>
            </div>

            <div class='w-full py-2'>
                <h2 class='text-2xl font-bold font-Roboto text-center my-4'>Réservez votre propre piste!</h2>
                <div class='py-4 bg-primary mx-auto rounded-md w-11/12 md:w-3/12 my-8'>
                    <a href='index.php?action=reserver' class='w-full flex justify-center items-center text-2xl text-white font-bold font-Roboto md:text-xl'>Réserver</a>
                </div>
            </div>
        </div>
    ";
    
    
    include "template.php";

?>