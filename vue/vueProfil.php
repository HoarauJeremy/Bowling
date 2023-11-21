<?php
    if ($_SESSION['CONNECTER']=="OK") 
    {
        $titre = "Bowling du Front de Mer - Profil";
        $contenu = "<h1 class='font-Roboto text-4xl text-center mb-5'>Bienvenue <strong>$username</strong> !</h1>";
        $contenu .=  "<div class='h-auto flex items-center bg-gray-200'>
                        <div class='h-auto items-center bg-gray-300 rounded-lg ml-10 my-10 text-center'>
                            <button class='font-Roboto font-bold first-letter:text-2xl bg-red-800 text-white mt-6 mb-3 px-10 h-16 w-auto border-none cursor-pointer rounded-md hover:bg-red-900 hover:border-solid hover:border-spacing-0.5 mx-10'>Voir mes Réservations</button>
                            <br>
                            <button class='font-Roboto font-bold first-letter:text-2xl bg-red-800 text-white mb-6 mt-3 px-10 h-16 w-auto border-none cursor-pointer rounded-md hover:bg-red-900 hover:border-solid hover:border-spacing-0.5 mx-10'>Changer mes informations</button>
                        </div>
                    </div>";
    } else {
        include("vue/vueAcceuil");
    }
    
    include "template.php";
    ?>